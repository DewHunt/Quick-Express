<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Warehouse;
use App\Admin;
use App\UserRoles;
use App\HelperClass;

class WarehouseController extends Controller
{
    public function index()
    {
    	$title = "Warehouse Setup";

    	$warehouses = Warehouse::orderBy('name','asc')->get();

    	return view('admin.warehouse.index')->with(compact('title','warehouses'));
    }

    public function add()
    {
    	$title = "Add Warehouse";
    	$formLink = "warehouse.save";
    	$buttonName = "Save";

        $currentRole = UserRoles::where('id',$this->userRole)->first();
        $userRoles = UserRoles::where('level','>=',$currentRole->level)->orderBy('level','ASC')->get();

    	return view('admin.warehouse.add')->with(compact('title','formLink','buttonName','userRoles'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        $isEmailExists = HelperClass::checkEmail('admins','email',null,$request->email);

        if ($isEmailExists == null)
        {
            $user = Admin::create( [           
                'role' => '11',     
                'name' => $request->name,
                'phone' => $request->phone,
                'username' => $request->username,          
                'email' => $request->email,           
                'password' => bcrypt($request->password),                      
            ]);

            Warehouse::create([
                'user_id' => $user->id ,
                'user_role_id' => '11',
                'name' => $request->name,
                'contact_person' => $request->contactPerson,
                'email' => $request->email,
                'address' => $request->address,
                'created_by' => $this->userId,
            ]);

            return redirect(route('warehouse.index'))->with('msg','Warehouse Added Successfully');
        }
        else
        {
            return redirect(route('warehouse.add'))->with('error','This Email "'.$request->email.'" Already Exists');
        }
    }

    public function edit($warehouseId)
    {
    	$title = "Edit Warehouse";
    	$formLink = "warehouse.update";
    	$buttonName = "Update";

        $currentRole = UserRoles::where('id',$this->userRole)->first();
        $userRoles = UserRoles::where('level','>=',$currentRole->level)->orderBy('level','ASC')->get();

    	$warehouse = Warehouse::where('id',$warehouseId)->first();
        $user = Admin::where('id',$warehouse->user_id)->first();

    	return view('admin.warehouse.edit')->with(compact('title','formLink','buttonName','warehouse','userRoles','user'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$warehouse = Warehouse::find($request->warehouseId);
        $user = Admin::find($request->userId);

        $isEmailExists = HelperClass::checkEmail('admins','email',$request->userId,$request->email);

        if ($isEmailExists == null)
        {
            $user->update([           
                'role' => '11',     
                'name' => $request->name,
                'phone' => $request->phone,
                'username' => $request->username,          
                'email' => $request->email,                     
            ]);

            $warehouse->update([
                'user_id' => $user->id ,
                'user_role_id' => '11',
                'name' => $request->name,
                'contact_person' => $request->contactPerson,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'created_by' => $this->userId,
            ]);

            return redirect(route('warehouse.index'))->with('msg','Agent Updated Successfully');
        }
        else
        {
            return redirect(route('warehouse.edit',$request->warehouseId))->with('error','This Email "'.$request->email.'" Already Exists');
        }
    }

    public function delete(Request $request)
    {
        $warehouse = Warehouse::find($request->warehouseId);

        Admin::where('id',$warehouse->user_id)->delete();

    	Warehouse::where('id',$request->warehouseId)->delete();
    }

    public function status(Request $request)
    {
        $warehouse = Warehouse::find($request->warehouseId);

        if ($warehouse->status == 1)
        {
            $warehouse->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $warehouse->update( [               
                'status' => 1                
            ]);
        }
    }
}
