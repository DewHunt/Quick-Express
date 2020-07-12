<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ChargeForDeliveryMen;
use App\Service;

class ChargeForDeliveryMenController extends Controller
{
    public function index()
    {
    	$title = "Delivery Men Charge Setup";

    	$deliveryMenCharges = ChargeForDeliveryMen::orderBy('name','asc')->get();

    	return view('admin.chargeForDeliveryMen.index')->with(compact('title','deliveryMenCharges'));
    }

    public function add()
    {
    	$title = "Add Delivery Man Charge";
    	$formLink = "chargeForDeliveryMen.save";
    	$buttonName = "Save";

    	$services = Service::orderBy('name','asc')->get();

    	return view('admin.chargeForDeliveryMen.add')->with(compact('title','formLink','buttonName','services'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        ChargeForDeliveryMen::create([
            'service_id' => $request->serviceId,
            'service_type_name' => $request->serviceTypeName,
            'name' => $request->chargeName,
            'charge' => $request->charge,
            'created_by' => $this->userId,
        ]);

        return redirect(route('chargeForDeliveryMen.index'))->with('msg',"Delivery Man Charge Added Successfully");
    }

    public function edit($chargeId)
    {
    	$title = "Edit Delivery Man Charge";
    	$formLink = "chargeForDeliveryMen.update";
    	$buttonName = "Update";

    	$services = Service::orderBy('name','asc')->get();

    	$charge = ChargeForDeliveryMen::where('id',$chargeId)->first();

    	return view('admin.chargeForDeliveryMen.edit')->with(compact('title','formLink','buttonName','services','charge'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$charge = ChargeForDeliveryMen::find($request->chargeId);

        $charge->update([
            'service_id' => $request->serviceId,
            'service_type_name' => $request->serviceTypeName,
            'name' => $request->chargeName,
            'charge' => $request->charge,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('chargeForDeliveryMen.index'))->with('msg',"Delivery Man Charge Updated Successfully");
    }

    public function delete(Request $request)
    {
    	ChargeForDeliveryMen::where('id',$request->chargeId)->delete();
    }

    public function status(Request $request)
    {
        $charge = ChargeForDeliveryMen::find($request->chargeId);

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
