<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ServiceType;

class ServiceTypeController extends Controller
{
    public function index()
    {
    	$title = "Service Type Setup";

    	$serviceTypes = ServiceType::orderBy('name','asc')->get();

    	return view('admin.serviceType.index')->with(compact('title','serviceTypes'));
    }

    public function add()
    {
    	$title = "Add Service Type";
    	$formLink = "serviceType.save";
    	$buttonName = "Save";

    	return view('admin.serviceType.add')->with(compact('title','formLink','buttonName'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        ServiceType::create([
            'name' => $request->name,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('serviceType.index'))->with('msg','Service Type Added Successfully');
    }

    public function edit($deliveryTypeId)
    {
    	$title = "Edit Service Type";
    	$formLink = "serviceType.update";
    	$buttonName = "Update";

    	$serviceType = ServiceType::where('id',$deliveryTypeId)->first();

    	return view('admin.serviceType.edit')->with(compact('title','formLink','buttonName','serviceType'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$serviceType = ServiceType::find($request->serviceTypeId);

        $serviceType->update([
            'name' => $request->name,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('serviceType.index'))->with('msg','Service Type Updated Successfully');
    }

    public function delete(Request $request)
    {
    	ServiceType::where('id',$request->serviceTypeId)->delete();
    }

    public function status(Request $request)
    {
        $serviceType = ServiceType::find($request->serviceTypeId);

        if ($serviceType->status == 1)
        {
            $serviceType->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $serviceType->update( [               
                'status' => 1                
            ]);
        }
    }
}
