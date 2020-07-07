<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\DeliveryMan;

class BikerController extends Controller
{  
    public function dashboard(){
        $title = "Dashboard";
        return view('frontend.biker.dashboard')->with(compact('title'));
    }

    public function profile(){
    	$title = "View Profile";
    	$profile = DeliveryMan::find(\Auth::guard('biker')->user()->id);
        
    	return view('frontend.biker.profile.index')->with(compact('title','profile'));
    }

    public function editProfile(){
    	$title = "Edit Profile";
    	$profile = DeliveryMan::find(\Auth::guard('biker')->user()->id);
    	if(count(request()->all()) > 0){
            request()->birth_date = date('Y-m-d',strtotime(request()->birth_date));
    		$profile->update([
                'name' => request()->name,
                'phone' => request()->phone,
                'email' => request()->email,
                'nid' => request()->nid,
                'address' => request()->address,
                'birth_date' => request()->birth_date,
            ]);

            return redirect(route('biker.profile'))->with('message','Your Profile Updated');
    	}
    	return view('frontend.biker.profile.edit')->with(compact('title','profile'));
    }
}
