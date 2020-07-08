<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Marchant;
use App\Admin;
use App\UserRoles;

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

    	return view('admin.marchant.add')->with(compact('title','formLink','buttonName','userRoles'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        $user = Admin::create( [           
            'role' => $request->role,     
            'name' => $request->name,           
            'username' => $request->username,          
            'email' => $request->email,           
            'password' => bcrypt($request->password),                      
        ]);

        Marchant::create([
            'user_id' => $user->id ,
            'user_role_id' => $request->role,
            'name' => $request->name,
            'contact_person_name' => $request->contactPerson,
            'contact_person_phone' => $request->phone,
            'contact_person_email' => $request->email,/*
            'trade_licence_no' => $request->trade_licence_no,*/
            'address' => $request->address,
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

    	$marchant = Marchant::where('id',$marchantId)->first();
        $user = Admin::where('id',$marchant->user_id)->first();

    	return view('admin.marchant.edit')->with(compact('title','formLink','buttonName','marchant','userRoles','user'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$marchant = Marchant::find($request->marchantId);
        $user = Admin::find($request->userId);

        $user->update([           
            'role' => $request->role,     
            'name' => $request->name,           
            'username' => $request->username,          
            'email' => $request->email,                     
        ]);

        $marchant->update([
            'user_id' => $user->id ,
            'user_role_id' => $request->role,
            'name' => $request->name,
            'contact_person_name' => $request->contactPerson,
            'contact_person_phone' => $request->phone,
            'contact_person_email' => $request->email,/*
            'trade_licence_no' => $request->trade_licence_no,*/
            'address' => $request->address,
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
