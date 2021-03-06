<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DeliveryMan;
use App\Admin;
use App\UserRoles;
use App\AreaSetup;

class DeliveryManController extends Controller
{
    public function index()
    {
    	$title = "Delivery Man Setup";

    	$deliveryMen = DeliveryMan::orderBy('name','asc')->get();

    	return view('admin.deliveryMan.index')->with(compact('title','deliveryMen'));
    }

    public function add()
    {
    	$title = "Add Delivery Man";
    	$formLink = "deliveryMan.save";
    	$buttonName = "Save";

        $currentRole = UserRoles::where('id',$this->userRole)->first();
        $userRoles = UserRoles::where('level','>=',$currentRole->level)->orderBy('level','ASC')->get();
        $area_list = AreaSetup::where('status',1)->orderBy('name','asc')->get();

    	return view('admin.deliveryMan.add')->with(compact('title','formLink','buttonName','userRoles','area_list'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        $user = Admin::create( [           
            'role' => '14',     
            'name' => $request->name,
            'phone' => $request->phone,
            'username' => $request->username,          
            'email' => $request->email,           
            'password' => bcrypt($request->password),                      
        ]);

    	$this->validate(request(), [
    		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    	]);

    	if($request->image)
    	{
    		$width = $request->width;
    		$height = $request->height;
    		$image = \App\HelperClass::UploadImage($request->image,'tbl_delivery_men','public/uploads/profile_image/delivery_man/',@$width,@$height);
    	}

        if($request->area)
        {
            $area = implode(',', $request->area);
        }
        else
        {
            $area = '';
        }

        DeliveryMan::create([
            'user_id' => $user->id ,
            'user_role_id' => '14',
            'name' => $request->name,
            'image' => @$image,
            'width' => @$width,
            'height' => @$height,
            'phone' => $request->phone,
            'email' => $request->email,
            'nid' => $request->nid,
            'area_id' => $area,
            'address' => $request->address,
            'created_by' => $this->userId,
        ]);

        return redirect(route('deliveryMan.index'))->with('msg','Delivery Man Added Successfully');
    }

    public function edit($deliveryManId)
    {
    	$title = "Edit Delivery Man";
    	$formLink = "deliveryMan.update";
    	$buttonName = "Update";

        $currentRole = UserRoles::where('id',$this->userRole)->first();
        $userRoles = UserRoles::where('level','>=',$currentRole->level)->orderBy('level','ASC')->get();
        $area_list = AreaSetup::where('status',1)->orderBy('name','asc')->get();

    	$deliveryMan = DeliveryMan::where('id',$deliveryManId)->first();
        $user = Admin::where('id',$deliveryMan->user_id)->first();

    	return view('admin.deliveryMan.edit')->with(compact('title','formLink','buttonName','deliveryMan','userRoles','user','area_list'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$deliveryMan = DeliveryMan::find($request->deliveryManId);
        $user = Admin::find($request->userId);

        $user->update([           
            'role' => '14',     
            'name' => $request->name,
            'phone' => $request->phone,
            'username' => $request->username,          
            'email' => $request->email,                     
        ]);

    	$this->validate(request(), [
    		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    	]);

    	if($request->image)
    	{
    		$width = $request->width;
    		$height = $request->height;
    		$image = \App\HelperClass::UploadImage($request->image,'tbl_delivery_men','public/uploads/profile_image/delivery_man/',@$width,@$height);
    	}
    	else
    	{
    		$image = $request->previousImage;
            $width = $request->previousWidth;
            $height = $request->previousHeight;
    	}

        if($request->area)
        {
            $area = implode(',', $request->area);
        }
        else
        {
            $area = '';
        }

        $deliveryMan->update([
            'user_id' => $user->id ,
            'user_role_id' => '14',
            'name' => $request->name,
            'image' => @$image,
            'width' => @$width,
            'height' => @$height,
            'phone' => $request->phone,
            'email' => $request->email,
            'nid' => $request->nid,
            'area_id' => $area,
            'address' => $request->address,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('deliveryMan.index'))->with('msg','Delivery Man Updated Successfully');
    }

    public function delete(Request $request)
    {
        $deliveryMan = DeliveryMan::find($request->deliveryManId);

        Admin::where('id',$deliveryMan->user_id)->delete();

    	DeliveryMan::where('id',$request->deliveryManId)->delete();
    }

    public function status(Request $request)
    {
        $deliveryMan = DeliveryMan::find($request->deliveryManId);

        if ($deliveryMan->status == 1)
        {
            $deliveryMan->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $deliveryMan->update( [               
                'status' => 1                
            ]);
        }
    }
}
