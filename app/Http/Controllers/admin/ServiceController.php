<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Service;

class ServiceController extends Controller
{
    public function index()
    {
    	$title = "Service Setup";

    	$services = Service::orderBy('order_by','asc')->get();

    	return view('admin.service.index')->with(compact('title','services'));
    }

    public function add()
    {
    	$title = "Add Service";
    	$formLink = "service.save";
    	$buttonName = "Save";

    	return view('admin.service.add')->with(compact('title','formLink','buttonName'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'weighing_scale' => $request->weighingScale,
            'upto' => $request->upto,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('service.index'))->with('msg','Service Added Successfully');
    }

    public function edit($serviceId)
    {
    	$title = "Edit Service Type";
    	$formLink = "service.update";
    	$buttonName = "Update";

    	$service = Service::where('id',$serviceId)->first();

    	return view('admin.service.edit')->with(compact('title','formLink','buttonName','service'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$service = Service::find($request->serviceId);

        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'weighing_scale' => $request->weighingScale,
            'upto' => $request->upto,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('service.index'))->with('msg','Service Updated Successfully');
    }

    public function delete(Request $request)
    {
    	Service::where('id',$request->serviceId)->delete();
    }

    public function status(Request $request)
    {
        $service = Service::find($request->serviceId);

        if ($service->status == 1)
        {
            $service->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $service->update( [               
                'status' => 1                
            ]);
        }
    }
}
