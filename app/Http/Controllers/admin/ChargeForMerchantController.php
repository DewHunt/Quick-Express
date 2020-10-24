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

        $countCharges = count($request->serviceTypeId);

        if($request->serviceTypeId)
        {
            $postData = [];
            for ($i=0; $i <$countCharges ; $i++) { 
                $postData[] = [
                    'service_type_id' => $request->serviceTypeId[$i],
                    'service_id' => $request->serviceId[$i],
                    'merchant_id' => $request->merchant,
                    'name' => $request->chargeName[$i],
                    'charge' => $request->charge[$i],
                    'charge_per_uom' => $request->chargePerKg[$i],
                    'created_by' => $this->userId,
                ];
            }                
            ChargeForMerchant::insert($postData);
        }

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
            'charge_per_uom' => $request->chargePerKg,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('chargeForMerchant.index'))->with('msg',"Merchant's Charge Updated Successfully");
    }

    public function getServiceInfo(Request $request)
    {
        $serviceType = '';
        $serviceName = '';
        $total = $request->total;

        $serviceTypes = ServiceType::orderBy('name','asc')->get();
        $services = Service::orderBy('name','asc')->get();

        if ($serviceTypes)
        {
            $serviceType .= '<select class="form-control select2 serviceType" id="serviceType_'.$total.'" name="serviceTypeId[]" onchange="getChargeName('.$total.')" required>';
            $serviceType .= '<option value="">Select A Service Type</option>';
                foreach ($serviceTypes as $serviceTypeInfo)
                {
                    $serviceType .= '<option value="'.$serviceTypeInfo->id.'">'.$serviceTypeInfo->name.'</option>';
                }
            $serviceType .= '</select>';
        }
        else
        {
            $serviceType .= '<select class="form-control select2 serviceType" id="serviceType_'.$total.'" name="serviceTypeId[]" onchange="getChargeName('.$total.')" required>';
                $serviceType .= '<option value="">Select A Service Type</option>';
            $serviceType .= '</select>';
        }
        

        if ($services)
        {
            $serviceName .= '<select class="form-control select2 service" id="service_'.$total.'" name="serviceId[]" onchange="getChargeName('.$total.')" required>';
            $serviceName .= '<option value="">Select A Service Name</option>';
                foreach ($services as $service)
                {
                    $serviceName .= '<option value="'.$service->id.'">'.$service->name.'</option>';
                }
            $serviceName .= '</select>';
        }
        else
        {
            $serviceName .= '<select class="form-control select2 service" id="service_'.$total.'" name="serviceId[]" onchange="getChargeName('.$total.')" required>';
                $serviceName .= '<option value="">Select A Service Name</option>';
            $serviceName .= '</select>';
        }

        // echo $output;
        
        if($request->ajax())
        {
            return response()->json([
                'serviceType' => $serviceType,
                'serviceName' => $serviceName
            ]);
        }
        
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
