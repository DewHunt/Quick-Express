<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DeliveryType;

class DeliveryTypeController extends Controller
{
    public function index()
    {
    	$title = "Delivery Type Setup";

    	$deliveryTypes = DeliveryType::orderBy('name','asc')->get();

    	return view('admin.deliveryType.index')->with(compact('title','deliveryTypes'));
    }

    public function add()
    {
    	$title = "Add Delivery Type";
    	$formLink = "deliveryType.save";
    	$buttonName = "Save";

    	return view('admin.deliveryType.add')->with(compact('title','formLink','buttonName'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        DeliveryType::create([
            'name' => $request->name,
            'charge' => $request->charge,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('deliveryType.index'))->with('msg','Delivery Type Added Successfully');
    }

    public function edit($deliveryTypeId)
    {
    	$title = "Edit Delivery Type";
    	$formLink = "deliveryType.update";
    	$buttonName = "Update";

    	$deliveryType = DeliveryType::where('id',$deliveryTypeId)->first();

    	return view('admin.deliveryType.edit')->with(compact('title','formLink','buttonName','deliveryType'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$deliveryType = DeliveryType::find($request->deliveryTypeId);

        $deliveryType->update([
            'name' => $request->name,
            'charge' => $request->charge,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('deliveryType.index'))->with('msg','Delievery Type Updated Successfully');
    }

    public function delete(Request $request)
    {
    	DeliveryType::where('id',$request->deliveryTypeId)->delete();
    }

    public function status(Request $request)
    {
        $deliveryType = DeliveryType::find($request->deliveryTypeId);

        if ($deliveryType->status == 1)
        {
            $deliveryType->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $deliveryType->update( [               
                'status' => 1                
            ]);
        }
    }
}
