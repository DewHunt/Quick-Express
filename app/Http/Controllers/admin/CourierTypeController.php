<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\CourierType;

class CourierTypeController extends Controller
{
    public function index()
    {
    	$title = "Courier Type Setup";

    	$courierTypes = CourierType::orderBy('name','asc')->get();

    	return view('admin.courierType.index')->with(compact('title','courierTypes'));
    }

    public function add()
    {
    	$title = "Add Courier Type";
    	$formLink = "courierType.save";
    	$buttonName = "Save";

    	return view('admin.courierType.add')->with(compact('title','formLink','buttonName'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        CourierType::create([
            'name' => $request->name,
            'charge' => $request->charge,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('courierType.index'))->with('msg','Courier Type Added Successfully');
    }

    public function edit($courierTypeId)
    {
    	$title = "Edit Courier Type";
    	$formLink = "courierType.update";
    	$buttonName = "Update";

    	$courierType = CourierType::where('id',$courierTypeId)->first();

    	return view('admin.courierType.edit')->with(compact('title','formLink','buttonName','courierType'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$courierType = CourierType::find($request->courierTypeId);

        $courierType->update([
            'name' => $request->name,
            'charge' => $request->charge,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('courierType.index'))->with('msg','Courier Type Updated Successfully');
    }

    public function delete(Request $request)
    {
    	CourierType::where('id',$request->courierTypeId)->delete();
    }

    public function status(Request $request)
    {
        $courierType = CourierType::find($request->courierTypeId);

        if ($courierType->status == 1)
        {
            $courierType->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $courierType->update( [               
                'status' => 1                
            ]);
        }
    }
}
