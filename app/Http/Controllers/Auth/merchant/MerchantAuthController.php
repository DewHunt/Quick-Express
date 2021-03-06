<?php

namespace App\Http\Controllers\Auth\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;

use App\Admin;
use App\Marchant;
use App\WebsiteInformation;
use App\AreaSetup;

class MerchantAuthController extends Controller
{   public function __construct()
    {
        $this->middleware('guest:merchant')->except('logout');
    }

    public function registration(){
        // dd(request()->all());
        $title = 'Create Merchant Account';

        $area_list = AreaSetup::where('status',1)->orderBy('name','asc')->get();

        if(count(request()->all()) > 0){
            $this->validate(request(), [
                'name' => ['required', 'string', 'max:255'],

                'contact_person_name' => ['required', 'string', 'max:255'],

                'contact_person_phone' => ['required','numeric', 'unique:tbl_marchants'],

                'contact_person_email' => ['nullable', 'string', 'email', 'max:255', 'unique:tbl_marchants'],

                // 'trade_licence_no' => ['required', 'string', 'max:255', 'unique:tbl_marchants'],

                'password' => ['required', 'string', 'min:6', 'same:confirm_password'],

                'confirm_password' => ['required', 'string', 'min:6'],
            ]);

            if(request()->contact_person_email != ''){
                $random_code = rand(10000000000000,99999999999999);
                $verification_code = $random_code.base64_encode(request()->contact_person_email);
                $username = str_replace(' ', '_', request()->name);
                $existAdmin = Admin::where('email',request()->contact_person_email)
                    ->orWhere('phone',request()->contact_person_phone)
                    ->first();
                // dd($existAdmin);
                if(!@$existAdmin){
                    $admin = Admin::create( [           
                        'role' => '12',     
                        'name' => request()->contact_person_name,               
                        'email' => request()->contact_person_email,           
                        'phone' => request()->contact_person_phone,           
                        'username' => $username,           
                        'password' => bcrypt(request()->password),                      
                    ]);
                }else{
                    $admin = $existAdmin;
                }

                $merchant = Marchant::create([
                    'user_id' => $admin->id ,
                    'user_role_id' => $admin->role,
                    'area' => request()->area,
                    'name' => request()->name,
                    'contact_person_name' => request()->contact_person_name,
                    'contact_person_phone' => request()->contact_person_phone,
                    'contact_person_email' => request()->contact_person_email,
                    'trade_licence_no' => request()->trade_licence_no,
                    'address' => request()->address,        
                    'password' => bcrypt(request()->password),
                    'token'=> request()->_token,
                    'verification_code'=> $verification_code, 
                    'status'=>'0'
                ]);
                
                $to = request()->contact_person_email;
                $subject = "Email Verification";
                $verification_link = route('merchant.verificationLink',['token'=>request()->_token,'email'=>request()->contact_person_email,'code'=>$verification_code,'pwd'=>base64_encode(request()->password)]);
                $message_body = $this->verifyEmailBodyTemplate(request()->name,$verification_link);
                
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                
                // More headers
                $headers .= 'From:Quick Express <support@technoparkbd.com>' . "\r\n";
                $headers .= 'Cc: support@technoparkbd.com' . "\r\n";
                
                if(@$merchant){
                    mail($to, $subject, $message_body, $headers);
                    return redirect(route('merchant.registration'))->with('message','Your registation complete, Check your email inbox/spam for confimation. It may be take some time');
                }
            }else{
                $existAdmin = Admin::where('phone',request()->contact_person_phone)->first();
                if(!@$existAdmin){
                     $username = str_replace(' ', '_', request()->name);
                    $admin = Admin::create( [           
                        'role' => '12',     
                        'name' => request()->contact_person_name, 
                        'username' => $username,               
                        'phone' => request()->contact_person_phone,           
                        'password' => bcrypt(request()->password),                       
                    ]);
                }else{
                    $admin = $existAdmin;
                }

                $merchant = Marchant::create([
                    'user_id' => $admin->id ,
                    'user_role_id' => $admin->role,
                    'name' => request()->name,
                    'contact_person_name' => request()->contact_person_name,
                    'contact_person_phone' => request()->contact_person_phone,
                    'trade_licence_no' => request()->trade_licence_no,
                    'address' => request()->address,        
                    'password' => bcrypt(request()->password),
                    'status'=>'0'
                ]);

                if(@$merchant){
                    return redirect(route('merchant.registration'))->with('message','Your registation complete');
                }
            }
        }
       return view('frontend.merchant.auth.registration')->with(compact('title','area_list')); 
    }

    public function completeRegistration(){
        $title = 'Complete Your Registration';
        $password = base64_decode(request()->pwd);

        if(Auth::guard('merchant')->attempt(['email'=> request()->contact_person_email,'password'=>$password,'token'=>request()->token,'verification_code'=>request()->code]))
        {   
            $merchant = Marchant::find(Auth::guard('merchant')->user()->id);
            $merchant->update([
                'verification_code'=>'',
                'status'=>'1'
            ]);
            return redirect()->intended(url('/'));
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
                $field = 'contact_person_phone';
                $admin_filed = 'phone';
            } elseif (filter_var(request()->email, FILTER_VALIDATE_EMAIL)) {
                $field = 'contact_person_email';
                $admin_filed = 'email';
            }else{
                return redirect(route('merchant.login'))->withErrors([
                    'error' => 'These credentials do not match our records.',
                ])->withInput();
            }

            $merchant = Marchant::where($field,request()->email)->first();
            $admin = Admin::where($admin_filed,request()->email)->first();

            if(@$merchant && $merchant->status == 0){
                return redirect(route('merchant.login'))->withErrors([
                    'error' => 'You are not active member',
                ])->withInput();

            }elseif(@$admin && $admin->status == 0){
                return redirect(route('merchant.login'))->withErrors([
                    'error' => 'You are not active member',
                ])->withInput();

            }elseif(Auth::guard('admin')->attempt([$admin_filed => request()->email, 'password'=> request()->password]))
            {
                return redirect()->intended(route('admin.index'));
            }else{
                return redirect(route('merchant.login'))->withErrors([
                    'error' => 'These credentials do not match our records.',
                ])->withInput();
            }
        }

        return view('frontend.merchant.auth.login')->with(compact('title'));
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
        Auth::logout('merchant');

        return redirect(url('/'));
    }
}
