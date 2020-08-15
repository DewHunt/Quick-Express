<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\HubSetup;

class HubSetupController extends Controller
{
    public function index()
    {
    	$title = "Hub Setup";

    	$hubs = HubSetup::orderBy('name')->get();

    	return view('admin.hubSetup.index')->with(compact('title','hubs'));
    }

    public function add()
    {
    	$title = "Add Hub";
    	$formLink = "hubSetup.save";
    	$buttonName = "Save";

    	return view('admin.hubSetup.add')->with(compact('title','formLink','buttonName'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        HubSetup::create([
            'name' => $request->name,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('hubSetup.index'))->with('msg','Hub Added Successfully');
    }

    public function edit($hubId)
    {
    	$title = "Edit Hub Setup";
    	$formLink = "hubSetup.update";
    	$buttonName = "Update";

    	$hub = HubSetup::where('id',$hubId)->first();

    	return view('admin.hubSetup.edit')->with(compact('title','formLink','buttonName','hub'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$hub = HubSetup::find($request->hubId);

        $hub->update([
            'name' => $request->name,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('hubSetup.index'))->with('msg','Hub Updated Successfully');
    }

    public function delete(Request $request)
    {
    	HubSetup::where('id',$request->hubId)->delete();
    }

    public function status(Request $request)
    {
        $hub = HubSetup::find($request->hubId);

        if ($hub->status == 1)
        {
            $hub->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $hub->update( [               
                'status' => 1                
            ]);
        }
    }
}
