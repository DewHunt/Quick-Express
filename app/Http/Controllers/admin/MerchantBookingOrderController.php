<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BookingOrder;
use App\Agent;
use App\Subagent;
use App\Warehouse;
use App\Service;
use App\ServiceType;
use App\Client;
use App\Marchant;
use App\Admin;
use App\UserRoles;
use App\ChargeForClient;
use App\ChargeForMerchant;
use App\DeliveryType;
use App\AreaSetup;

use DB;

class MerchantBookingOrderController extends Controller
{
    public function index()
    {
    	$title = "Booking Your Order";

    	$bookingOrders = BookingOrder::select('tbl_booking_orders.*','tbl_service_types.name as serviceTypeName','tbl_marchants.user_id')
            ->join('tbl_marchants','tbl_booking_orders.sender_id','=','tbl_marchants.id')
    		->leftJoin('tbl_service_types','tbl_service_types.id','=','tbl_booking_orders.delivery_type_id')
            ->Where('tbl_marchants.user_id',$this->userId)
            ->Where('booked_type','Merchant')
    		->orderBy('id','desc')
    		->get();

    	return view('admin.merchantBookingOrder.index')->with(compact('title','bookingOrders'));
    }

    public function add()
    {
    	$title = "Create Your Booking";
    	$formLink = "merchantBookingOrder.save";
    	$buttonName = "Save";

        // $merchant_info = Marchant::where('user_id',$this->userId)->first();

        $merchant_info = Marchant::select('tbl_marchants.*','tbl_agents.id as agentId')
            ->leftJoin('tbl_area','tbl_area.id','=','tbl_marchants.area')
            ->leftJoin('tbl_agents','tbl_agents.hub_id','=','tbl_area.hub_id')
            ->where('tbl_marchants.user_id',$this->userId)
            ->first();

        $services = Service::orderBy('name','asc')->get();
        $serviceTypes = ServiceType::orderBy('name','asc')->get();
        $deliveryTypes = DeliveryType::orderBy('name','asc')->get();
        $areas = AreaSetup::orderBy('name','asc')->get();

    	$zones = DB::table('view_zones')->select('view_zones.*')->orderBy('view_zones.zone_type')->get();

        $toDayDate = date("Y-m-d");
        $orderPrefix = "co-".date('ymd')."-";

        $maxOrderNo = BookingOrder::where('date',$toDayDate)->where('booked_type','Client')->max('order_no');

        if ($maxOrderNo)
        {
            $maxOrderNo = substr($maxOrderNo, strlen($orderPrefix));
            $orderNo = $orderPrefix.str_pad($maxOrderNo + 1, 5, '0', STR_PAD_LEFT);
        }
        else
        {
            $orderNo = $orderPrefix."00001";
        }

        // echo $orderNo; exit();

    	return view('admin.merchantBookingOrder.add')->with(compact('title','formLink','buttonName','merchant_info','services','serviceTypes','zones','orderNo','deliveryTypes','areas'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        if ($request->bookingDate)
        {
            $bookingDate = date('Y-m-d',strtotime($request->bookingDate));
        }
        else
        {
            $bookingDate = "";
        }      

        BookingOrder::create([
            'order_no' => $request->orderNo,
            'date' => $bookingDate,
            'booked_type' => 'Merchant',
            'sender_id' => $request->senderId,
            'sender_area_id' => $request->senderArea,
            'sender_name' => $request->senderName,
            'sender_phone' => $request->senderPhoneNumber,
            'sender_zone_type' => $request->senderZoneType,
            'sender_zone_id' => $request->senderZoneId,
            'sender_address' => $request->senderAddress,
            'receiver_area_id' => $request->receiverArea,
            'receiver_name' => $request->receiverName,
            'receiver_phone' => $request->receiverPhoneNumber,
            'receiver_zone_type' => $request->receiverZoneType,
            'receiver_zone_id' => $request->receiverZoneId,
            'receiver_address' => $request->receiverAddress,
            'remarks' => $request->remarks,
            'courier_type_id' => $request->courierType,
            'delivery_type_id' => $request->deliveryTypeId,
            'charge_name' => $request->chargeName,
            'delivery_charge_unit' => $request->deliveryChargeUnit,
            'uom' => $request->uom,
            'delivery_charge' => $request->deliveryCharge,
            'cod' => $request->cod,
            'cod_amount' => $request->codAmount,
            'delivery_duration_id' => $request->deliveryTypeId,
            'created_by' => $this->userId,
        ]);

        return redirect(route('merchantBookingOrder.index'))->with('msg','Order Created Successfully');
    }

    public function edit($bookedOrderId)
    {
    	$title = "Edit Booked Order";
    	$formLink = "merchantBookingOrder.update";
    	$buttonName = "Update";

        $services = Service::orderBy('name','asc')->get();
        $serviceTypes = ServiceType::orderBy('name','asc')->get();
        $deliveryTypes = DeliveryType::orderBy('name','asc')->get();
        $areas = AreaSetup::orderBy('name','asc')->get();

        $zones = DB::table('view_zones')->select('view_zones.*')->orderBy('view_zones.zone_type')->get();

        $toDayDate = date("Y-m-d");
        $orderPrefix = "co-".date('ymd')."-";

        $maxOrderNo = BookingOrder::where('date',$toDayDate)->where('booked_type','Merchant')->max('order_no');

        if ($maxOrderNo)
        {
            $maxOrderNo = substr($maxOrderNo, strlen($orderPrefix));
            $orderNo = $orderPrefix.str_pad($maxOrderNo + 1, 5, '0', STR_PAD_LEFT);
        }
        else
        {
            $orderNo = $orderPrefix."00001";
        }

        $bookedOrder = BookingOrder::where('id',$bookedOrderId)->first();

    	return view('admin.merchantBookingOrder.edit')->with(compact('title','formLink','buttonName','bookedOrder','services','serviceTypes','zones','orderNo','deliveryTypes','areas'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

        if ($request->deliveryDate)
        {
            $deliveryDate = date('Y-m-d',strtotime($request->deliveryDate));
        }
        else
        {
            $deliveryDate = "";
        }

        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        $bookedOrder->update([
            'order_no' => $request->orderNo,
            'date' => $deliveryDate,
            'sender_area_id' => $request->senderArea,
            'sender_name' => $request->senderName,
            'sender_phone' => $request->senderPhoneNumber,
            'sender_zone_type' => $request->senderZoneType,
            'sender_zone_id' => $request->senderZoneId,
            'sender_address' => $request->senderAddress,
            'receiver_area_id' => $request->receiverArea,
            'receiver_name' => $request->receiverName,
            'receiver_phone' => $request->receiverPhoneNumber,
            'receiver_zone_type' => $request->receiverZoneType,
            'receiver_zone_id' => $request->receiverZoneId,
            'receiver_address' => $request->receiverAddress,
            'remarks' => $request->remarks,
            'courier_type_id' => $request->courierType,
            'delivery_type_id' => $request->deliveryTypeId,
            'charge_name' => $request->chargeName,
            'delivery_charge_unit' => $request->deliveryChargeUnit,
            'uom' => $request->uom,
            'delivery_charge' => $request->deliveryCharge,
            'cod' => $request->cod,
            'cod_amount' => $request->codAmount,
            'delivery_duration_id' => $request->deliveryTypeId,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('merchantBookingOrder.index'))->with('msg','Your Booking Updated Successfully');
    }

    public function view($bookedOrderId)
    {
    	$title = "View Booked Order";

        $bookedOrder = BookingOrder::select('tbl_booking_orders.*','tbl_services.name as serviceName','tbl_service_types.name as serviceTypeName','tbl_delivery_types.name as deliveryTypeName')
            ->leftJoin('tbl_services','tbl_services.id','=','tbl_booking_orders.courier_type_id')
            ->leftJoin('tbl_service_types','tbl_service_types.id','=','tbl_booking_orders.delivery_type_id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_duration_id')
            ->where('tbl_booking_orders.id',$bookedOrderId)
            ->orderBy('id','desc')
            ->first();

    	$senderInfo = DB::table('view_zones')
    		->select('view_zones.*')
    		->where('zone_type',$bookedOrder->sender_zone_type)
    		->where('zone_id',$bookedOrder->sender_zone_id)
    		->first();

    	$receiverInfo = DB::table('view_zones')
    		->select('view_zones.*')
    		->where('zone_type',$bookedOrder->receiver_zone_type)
    		->where('zone_id',$bookedOrder->receiver_zone_id)
    		->first();

    	// dd($receiverInfo);

    	return view('admin.merchantBookingOrder.view')->with(compact('title','bookedOrder','senderInfo','receiverInfo'));
    }

    public function getReceiverInfo(Request $request)
    {
        $receiverInfo = BookingOrder::select('tbl_booking_orders.*')
            ->where('tbl_booking_orders.receiver_phone',$request->receiverPhoneNumber)
            ->orderBy('tbl_booking_orders.id','desc')
            ->first();

        if ($receiverInfo)
        {
            $receiverName = $receiverInfo->receiver_name;
            $receiverAddress = $receiverInfo->receiver_address;
            $receiverAreaId = $receiverInfo->receiver_area_id;
        }
        else
        {
            $receiverName = "";
            $receiverAddress = "";
            $receiverAreaId = "";
        }
        
        if($request->ajax())
        {
            return response()->json([
                'receiverName' => $receiverName,
                'receiverAddress'=> $receiverAddress,
                'receiverAreaId' =>$receiverAreaId
            ]);
        }
    }

    public function getChargeInfo(Request $request)
    {
        $merchant = Marchant::where('user_id',$this->userId)->first();

        $charge = ChargeForMerchant::where('merchant_id',$merchant->id)
            ->where('service_type_id',$request->serviceTypeId)
            ->where('service_id',$request->serviceId)
            ->first();

        if ($charge)
        {
            $chargeName = $charge->name;
            $charge = $charge->charge;
        }
        else
        {
            $chargeName = "";
            $charge = "";
        }
        
        
        if($request->ajax())
        {
            return response()->json([
                'chargeName'=>$chargeName,
                'charge'=>$charge,
            ]);
        }
    }

    public function delete(Request $request)
    {
    	BookingOrder::where('id',$request->merchantBookingOrderId)->delete();
    }

    public function status(Request $request)
    {
        $BookingOrder = BookingOrder::find($request->merchantBookingOrderId);

        if ($BookingOrder->status == 1)
        {
            $BookingOrder->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $BookingOrder->update( [               
                'status' => 1                
            ]);
        }
    }
}
