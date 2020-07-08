<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\DeliveryMan;
use App\AreaSetup;

class BikerController extends Controller
{  
    public function dashboard(){
        $title = "Dashboard";
        return view('frontend.biker.dashboard')->with(compact('title'));
    }

    public function profile(){
    	$title = "View Biker Profile";
    	$profile = DeliveryMan::find(\Auth::guard('biker')->user()->id);
        
    	return view('frontend.biker.profile.index')->with(compact('title','profile'));
    }

    public function editProfile(){
    	$title = "Edit Biker Profile";
    	$profile = DeliveryMan::find(\Auth::guard('biker')->user()->id);
        $area_list = AreaSetup::where('status',1)->orderBy('order_by','asc')->get();
    	if(count(request()->all()) > 0){
            request()->birth_date = date('Y-m-d',strtotime(request()->birth_date));
            if(request()->area_id){
               request()->area_id = implode(',', request()->area_id); 
            }
    		$profile->update([
                'name' => request()->name,
                'phone' => request()->phone,
                'email' => request()->email,
                'nid' => request()->nid,
                'address' => request()->address,
                'driving_licence' => request()->driving_licence,
                'bike_registration_no' => request()->bike_registration_no,
                'area_id' => request()->area_id,
            ]);

            return redirect(route('biker.profile'))->with('message','Your Profile Updated');
    	}
    	return view('frontend.biker.profile.edit')->with(compact('title','profile','area_list'));
    }
}
