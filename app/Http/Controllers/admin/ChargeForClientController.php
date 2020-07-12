<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ChargeForClient;
use App\ServiceType;
use App\Service;

class ChargeForClientController extends Controller
{
    public function index()
    {
    	$title = "Client's Charge Setup";

    	$clientCharges = ChargeForClient::orderBy('name','asc')->get();

    	return view('admin.chargeForClient.index')->with(compact('title','clientCharges'));
    }

    public function add()
    {
    	$title = "Add Client's Charge";
    	$formLink = "chargeForClient.save";
    	$buttonName = "Save";

    	$services = Service::orderBy('name','asc')->get();
    	$serviceTypes = ServiceType::orderBy('name','asc')->get();

    	return view('admin.chargeForClient.add')->with(compact('title','formLink','buttonName','services','serviceTypes'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        ChargeForClient::create([
            'service_type_id' => $request->serviceTypeId,
            'service_id' => $request->serviceId,
            'name' => $request->chargeName,
            'charge' => $request->charge,
            'created_by' => $this->userId,
        ]);

        return redirect(route('chargeForClient.index'))->with('msg',"Client's Charge Added Successfully");
    }

    public function edit($chargeId)
    {
    	$title = "Edit Client's Charge";
    	$formLink = "chargeForClient.update";
    	$buttonName = "Update";

    	$services = Service::orderBy('name','asc')->get();
    	$serviceTypes = ServiceType::orderBy('name','asc')->get();

    	$charge = ChargeForClient::where('id',$chargeId)->first();

    	return view('admin.chargeForClient.edit')->with(compact('title','formLink','buttonName','services','serviceTypes','charge'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$charge = ChargeForClient::find($request->chargeId);

        $charge->update([
            'service_type_id' => $request->serviceTypeId,
            'service_id' => $request->serviceId,
            'name' => $request->chargeName,
            'charge' => $request->charge,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('chargeForClient.index'))->with('msg',"Client's Charge Updated Successfully");
    }

    public function delete(Request $request)
    {
    	ChargeForClient::where('id',$request->chargeId)->delete();
    }

    public function status(Request $request)
    {
        $charge = ChargeForClient::find($request->chargeId);

        if ($charge->status == 1)
        {
            $charge->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $charge->update( [               
                'status' => 1                
            ]);
        }
    }
}
