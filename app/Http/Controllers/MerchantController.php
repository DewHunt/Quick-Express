<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Marchant;

class MerchantController extends Controller
{  
    public function dashboard(){
        $title = "Merchant Dashboard";
        return view('frontend.merchant.dashboard')->with(compact('title'));
    }

    public function profile(){
    	$title = "View Merchant Profile";
    	$profile = Marchant::find(\Auth::guard('merchant')->user()->id);
        
    	return view('frontend.merchant.profile.index')->with(compact('title','profile'));
    }

    public function editProfile(){
    	$title = "Edit Merchant Profile";
    	$profile = Marchant::find(\Auth::guard('merchant')->user()->id);
    	if(count(request()->all()) > 0){
            $this->validate(request(), [
                'name' => ['required', 'string', 'max:255'],

                'contact_person_name' => ['required', 'string', 'max:255'],

                'contact_person_phone' => ['required','numeric']
            ]);

            request()->birth_date = date('Y-m-d',strtotime(request()->birth_date));
    		$profile->update([
                'name' => request()->name,
                'contact_person_name' => request()->contact_person_name,
                'contact_person_phone' => request()->contact_person_phone,
                'contact_person_email' => request()->contact_person_email,
                'trade_licence_no' => request()->trade_licence_no,
                'address' => request()->address,        
            ]);

            return redirect(route('merchant.profile'))->with('message','Your Profile Updated');
    	}
    	return view('frontend.merchant.profile.edit')->with(compact('title','profile'));
    }
}
