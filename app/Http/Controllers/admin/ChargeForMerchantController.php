<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ChargeForMerchant;
use App\ServiceType;
use App\Service;
use App\Marchant;

class ChargeForMerchantController extends Controller
{
    public function index()
    {
    	$title = "Merchant's Charge Setup";

    	$merchantCharges = ChargeForMerchant::select('tbl_charge_for_merchants.*','tbl_marchants.name as merchantName')
    		->leftJoin('tbl_marchants','tbl_marchants.id','=','tbl_charge_for_merchants.merchant_id')
    		->orderBy('merchantName','asc')
    		->get();

    	return view('admin.chargeForMerchant.index')->with(compact('title','merchantCharges'));
    }

    public function add()
    {
    	$title = "Add Merchant's Charge";
    	$formLink = "chargeForMerchant.save";
    	$buttonName = "Save";

    	$services = Service::orderBy('name','asc')->get();
    	$serviceTypes = ServiceType::orderBy('name','asc')->get();
    	$merchants = Marchant::orderBy('name','asc')->get();

    	return view('admin.chargeForMerchant.add')->with(compact('title','formLink','buttonName','services','serviceTypes','merchants'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        ChargeForMerchant::create([
            'service_type_id' => $request->serviceTypeId,
            'service_id' => $request->serviceId,
            'merchant_id' => $request->merchant,
            'name' => $request->chargeName,
            'charge' => $request->charge,
            'created_by' => $this->userId,
        ]);

        return redirect(route('chargeForMerchant.index'))->with('msg',"Merchant's Charge Added Successfully");
    }

    public function edit($chargeId)
    {
    	$title = "Edit Client's Charge";
    	$formLink = "chargeForMerchant.update";
    	$buttonName = "Update";

    	$services = Service::orderBy('name','asc')->get();
    	$serviceTypes = ServiceType::orderBy('name','asc')->get();
    	$merchants = Marchant::orderBy('name','asc')->get();

    	$charge = ChargeForMerchant::where('id',$chargeId)->first();

    	return view('admin.chargeForMerchant.edit')->with(compact('title','formLink','buttonName','services','serviceTypes','merchants','charge'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$merchant = ChargeForMerchant::find($request->merchantId);

        $merchant->update([
            'service_type_id' => $request->serviceTypeId,
            'service_id' => $request->serviceId,
            'merchant_id' => $request->merchant,
            'name' => $request->chargeName,
            'charge' => $request->charge,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('chargeForMerchant.index'))->with('msg',"Merchant's Charge Updated Successfully");
    }

    public function delete(Request $request)
    {
    	ChargeForMerchant::where('id',$request->chargeId)->delete();
    }

    public function status(Request $request)
    {
        $charge = ChargeForMerchant::find($request->chargeId);

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
