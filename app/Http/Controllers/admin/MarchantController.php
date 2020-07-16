<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Marchant;
use App\Admin;
use App\UserRoles;
use App\AreaSetup;

class MarchantController extends Controller
{
    public function index()
    {
    	$title = "Marchant Setup";

    	$marchants = Marchant::orderBy('name','asc')->get();

    	return view('admin.marchant.index')->with(compact('title','marchants'));
    }

    public function add()
    {
    	$title = "Add Marchant";
    	$formLink = "marchant.save";
    	$buttonName = "Save";

        $currentRole = UserRoles::where('id',$this->userRole)->first();
        $userRoles = UserRoles::where('level','>=',$currentRole->level)->orderBy('level','ASC')->get();
        $area_list = AreaSetup::where('status',1)->orderBy('name','asc')->get();

    	return view('admin.marchant.add')->with(compact('title','formLink','buttonName','userRoles','area_list'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        $user = Admin::create( [           
            'role' => '12',     
            'name' => $request->name,           
            'username' => $request->username,          
            'email' => $request->email,           
            'password' => bcrypt($request->password),                      
        ]);

        Marchant::create([
            'user_id' => $user->id ,
            'user_role_id' => '12',
            'name' => $request->name,
            'contact_person_name' => $request->contactPerson,
            'contact_person_phone' => $request->phone,
            'contact_person_email' => $request->email,
            'trade_licence_no' => $request->tradeLicenseNo,
            'address' => $request->address,
            'area' => $request->area,
            'created_by' => $this->userId,
        ]);

        return redirect(route('marchant.index'))->with('msg','Marchant Added Successfully');
    }

    public function edit($marchantId)
    {
    	$title = "Edit Marchant";
    	$formLink = "marchant.update";
    	$buttonName = "Update";

        $currentRole = UserRoles::where('id',$this->userRole)->first();
        $userRoles = UserRoles::where('level','>=',$currentRole->level)->orderBy('level','ASC')->get();
        $area_list = AreaSetup::where('status',1)->orderBy('name','asc')->get();

    	$marchant = Marchant::where('id',$marchantId)->first();
        $user = Admin::where('id',$marchant->user_id)->first();

    	return view('admin.marchant.edit')->with(compact('title','formLink','buttonName','marchant','userRoles','user','area_list'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$marchant = Marchant::find($request->marchantId);
        $user = Admin::find($request->userId);

        $user->update([           
            'role' => '12',     
            'name' => $request->name,           
            'username' => $request->username,          
            'email' => $request->email,                     
        ]);

        $marchant->update([
            'user_id' => $user->id ,
            'user_role_id' => '12',
            'name' => $request->name,
            'contact_person_name' => $request->contactPerson,
            'contact_person_phone' => $request->phone,
            'contact_person_email' => $request->email,
            'trade_licence_no' => $request->tradeLicenseNo,
            'address' => $request->address,
            'area' => $request->area,
            'created_by' => $this->userId,
        ]);

        return redirect(route('marchant.index'))->with('msg','Marchant Updated Successfully');
    }

    public function delete(Request $request)
    {
    	Marchant::where('id',$request->marchantId)->delete();
    }

    public function status(Request $request)
    {
        $marchant = Marchant::find($request->marchantId);

        if ($marchant->status == 1)
        {
            $marchant->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $marchant->update( [               
                'status' => 1                
            ]);
        }
    }
}
