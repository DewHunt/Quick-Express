<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

use App\Client;
use App\Admin;
use App\WebsiteInformation;

class CustomerAuthController extends Controller
{   public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function registration(Request $request){
        $title = 'Create User Account';

        if(count($request->all()) > 0){
            $this->validate(request(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['nullable', 'string', 'email', 'max:255', 'unique:tbl_clients'],
                'phone' => ['required','numeric', 'unique:tbl_clients'],
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'password' => ['required', 'string', 'min:6', 'same:confirm_password'],
                'confirm_password' => ['required', 'string', 'min:6'],
            ]);

            if(request()->image)
            {
                $width = '600';
                $height = '600';
                $image = \App\HelperClass::UploadImage(request()->image,'tbl_clients','public/uploads/profile_image/client/',@$width,@$height);
            }

            if($request->email != ''){
                $random_code = rand(10000000000000,99999999999999);
                $verification_code = $random_code.base64_encode($request->email);
                $user = Client::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'image' => @$image,          
                    'password' => bcrypt($request->password),
                    'token'=>$request->_token,
                    'verification_code'=>$verification_code,
                    'status'=>'0'
                ]);
                
                $to = $request->email;
                $subject = "Email Verification";
                $verification_link = route('user.verificationLink',['token'=>$request->_token,'email'=>$request->email,'code'=>$verification_code,'pwd'=>base64_encode($request->password)]);
                $message_body = $this->verifyEmailBodyTemplate($request->name,$verification_link);
                
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                
                // More headers
                $headers .= 'From:Quick Express <support@technoparkbd.com>' . "\r\n";
                $headers .= 'Cc: support@technoparkbd.com' . "\r\n";
                if(@$user){
                    mail($to, $subject, $message_body, $headers);
                    return redirect(route('user.registration'))->with('message','Your registation complete, Check your email for confimation');
                }
            }else{
                $user = Client::create([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'image' => @$image,          
                    'password' => bcrypt($request->password),
                    'token'=>$request->_token,
                    'verification_code'=>'',
                    'status'=>'1'
                ]);

                if(@$admin && @$user){
                    return redirect(route('user.registration'))->with('message','Your registation complete, Check your email inbox/spam for confimation. It may be take some time');
                }
            }
        }
       return view('frontend.customer.auth.registration')->with(compact('title')); 
    }

    public function completeRegistration(){
        $title = 'Complete Your Registration';
        $password = base64_decode(request()->pwd);

        if(Auth::guard('customer')->attempt(['email'=> request()->email,'password'=>$password,'token'=>request()->token,'verification_code'=>request()->code]))
        {   
            $customer = Client::find(Auth::guard('customer')->user()->id);
            $customer->update([
                'verification_code'=>'',
                'status'=>'1'
            ]);
            return redirect()->intended(route('user.dashboard'));
        }
        else
        {   
            return redirect(url('/'));
        }

    }

    public function login(){
        $title = 'Login Your Account';

        if(count(request()->all()) > 0){
            if (is_numeric(request()->email)) {
                $field = 'phone';
            } elseif (filter_var(request()->email, FILTER_VALIDATE_EMAIL)) {
                $field = 'email';
            }else{
                return redirect(route('user.login'))->withErrors([
                    'error' => 'These credentials do not match our records.',
                ])->withInput();
            }

            $customer = Client::where($field,request()->email)->first();
            if(@$customer && $customer->status == 0){
                return redirect(route('user.login'))->withErrors([
                    'error' => 'You are not active member',
                ])->withInput();
            }elseif(Auth::guard('customer')->attempt([$field => request()->email, 'password'=> request()->password]))
            {
                return redirect()->intended(route('user.dashboard'));
            }else{
                return redirect(route('user.login'))->withErrors([
                    'error' => 'These credentials do not match our records.',
                ])->withInput();
            }
        }

        return view('frontend.customer.auth.login')->with(compact('title'));
    }

    public function verifyEmailBodyTemplate($name,$verification_link){
        $website_information = WebsiteInformation::where('id',1)->first();
        $message_body = 
            '
                <html>
                    <head>
                        <title>Email Verification</title>
                    </head>
                    <body>
                        <div>
                            <table border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto; background-color: #fff; border: 1px solid #ddd;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0" width="650">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div style="padding: 20px;">
                                                                <h3><b>Dear '.$name.'</b></h3>
                                                                <p>
                                                                    Thank you for your registration. Your registration will be complete when you confimr your email. Please click on the given link and verify your email.
                                                                </p>
                
                                                                <div style="text-align: center;margin-top: 30px;text-transform: uppercase;">
                                                                    <a href="'.$verification_link.'" style="text-decoration: none;background: #0f887c;color: #fff;padding: 10px;">Click here to verify</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="background-color: #0e4168;" height="40">
                                            <p style="padding: 0; margin: 0; color: #fff; font-size: 15px; line-height: 22px; font-weight: 700; text-align: center;">'.$website_information->website_name.'</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </body>
                </html>
            ';

            return $message_body;
    }

    public function logout()
    {
        Auth::logout('customer');

        return redirect(url('/'));
    }
}
