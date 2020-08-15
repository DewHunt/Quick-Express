<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
use App\ChargeForDeliveryMen;
use App\DeliveryType;
use App\DeliveryMan;
use App\AreaSetup;

use DB;

class BookingController extends Controller
{  
    public function index(){
        $title = "Booking Order";
        $bookingOrders = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName')
    		->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
    		->where('sender_id',\Auth::guard('customer')->user()->id)
    		->orderBy('id','desc')
    		->get();
        return view('frontend.customer.booking.index')->with(compact('title','bookingOrders'));
    }

    public function create()
    {
    	$title = "Create New Booking";
    	$formLink = "user.bookingCreate";
    	$buttonName = "Save";

        $services = Service::orderBy('name','asc')->get();
        $serviceTypes = ServiceType::orderBy('name','asc')->get();
        $deliveryTypes = DeliveryType::orderBy('name','asc')->get();
        $areas = AreaSetup::orderBy('name','asc')->get();

    	// $zones = DB::table('view_zones')->select('view_zones.*')->orderBy('view_zones.zone_type')->get();

        $toDayDate = date("Y-m-d");
        $orderPrefix = "co-".date('ymd')."-";

        $maxOrderNo = BookingOrder::where('date',$toDayDate)->max('order_no');

        if ($maxOrderNo)
        {
            $maxOrderNo = substr($maxOrderNo, strlen($orderPrefix));
            $orderNo = $orderPrefix.str_pad($maxOrderNo + 1, 5, '0', STR_PAD_LEFT);
        }
        else
        {
            $orderNo = $orderPrefix."00001";
        }

        if(count(request()->all()) > 0)
        {
            // dd(request()->all());

        	if (request()->bookingDate)
	        {
	            $bookingDate = date('Y-m-d',strtotime(request()->bookingDate));
	        }
	        else
	        {
	            $bookingDate = "";
	        }

	        BookingOrder::create([
                'order_no' => request()->orderNo,
                'date' => $bookingDate,
                'booked_type' => 'Client',
                'sender_id' => request()->clientId,
                'sender_area_id' => request()->senderArea,
                'sender_name' => request()->senderName,
                'sender_phone' => request()->senderPhoneNumber,
                'sender_zone_type' => request()->senderZoneType,
                'sender_zone_id' => request()->senderZoneId,
                'sender_address' => request()->senderAddress,
                'receiver_area_id' => request()->receiverArea,
                'receiver_name' => request()->receiverName,
                'receiver_phone' => request()->receiverPhoneNumber,
                'receiver_zone_type' => request()->receiverZoneType,
                'receiver_zone_id' => request()->receiverZoneId,
                'receiver_address' => request()->receiverAddress,
                'remarks' => request()->remarks,
                'courier_type_id' => request()->serviceId,
                'delivery_type_id' => request()->serviceTypeId,
                'charge_name' => request()->chargeName,
                'delivery_charge_unit' => request()->deliveryChargeUnit,
                'uom' => request()->uom,
                'delivery_charge' => request()->deliveryCharge,
                'cod' => request()->cod,
                'cod_amount' => request()->codAmount,
                'delivery_duration_id' => request()->deliveryTypeId,
                'collection_payment' => request()->collectionPayment,
                'delivery_payment' => request()->deliveryPayment,
                'status' => '0',
                'created_by' => $this->userId,
	        ]);
        	return redirect(route('user.booking'))->with('message','Your Booking Created Successfully');
        }
    	return view('frontend.customer.booking.create')->with(compact('title','formLink','buttonName','services','serviceTypes','deliveryTypes','areas','orderNo'));
    }

    public function view($id)
    {
        $title = "View Your Booking";
        $bookedOrder = BookingOrder::where('id',$id)->where('sender_id',\Auth::guard('customer')->user()->id)->first();
        $deliveryMan = DeliveryMan::find($bookedOrder->delivery_man_id);
        $courierType = CourierType::find($bookedOrder->courier_type_id);
        $deliveryTypes = DeliveryType::orderBy('name','asc')->get();
        $sender_zone = DB::table('view_zones')->where('zone_id',$bookedOrder->sender_zone_id)->first();
        $receiver_zone = DB::table('view_zones')->where('zone_id',$bookedOrder->receiver_zone_id)->first();

        return view('frontend.customer.booking.view')->with(compact('title','bookedOrder','deliveryMan','courierType','serviceTypes','deliveryTypes','sender_zone','receiver_zone'));
    }


    public function edit($id)
    {
    	$title = "Edit Your Booking";
        $formLink = "user.bookingEdit,".$id;
    	$buttonName = "Update";

        $bookedOrder = BookingOrder::find($id);

        if (request()->bookingDate)
        {
            $bookingDate = date('Y-m-d',strtotime(request()->bookingDate));
        }
        else
        {
            $bookingDate = "";
        }

        if (request()->cod == "Yes")
        {
            $codAmount = request()->codAmount;
        }
        else
        {
            $codAmount = 0;
        }

        $services = Service::orderBy('name','asc')->get();
        $serviceTypes = ServiceType::orderBy('name','asc')->get();
        $deliveryTypes = DeliveryType::orderBy('name','asc')->get();
        $areas = AreaSetup::orderBy('name','asc')->get();

        $zones = DB::table('view_zones')->select('view_zones.*')->orderBy('view_zones.zone_type')->get();

        if(count(request()->all()) > 0)
        {
            // dd(request()->all());
        	if (request()->deliveryDate)
            {
                $deliveryDate = date('Y-m-d',strtotime(request()->deliveryDate));
            }
            else
            {
                $deliveryDate = "";
            }

            $bookedOrder->update([
                'order_no' => request()->orderNo,
                'date' => $bookingDate,
                'booked_type' => 'Client',
                'sender_id' => request()->clientId,
                'sender_area_id' => request()->senderArea,
                'sender_name' => request()->senderName,
                'sender_phone' => request()->senderPhoneNumber,
                'sender_zone_type' => request()->senderZoneType,
                'sender_zone_id' => request()->senderZoneId,
                'sender_address' => request()->senderAddress,
                'receiver_area_id' => request()->receiverArea,
                'receiver_name' => request()->receiverName,
                'receiver_phone' => request()->receiverPhoneNumber,
                'receiver_zone_type' => request()->receiverZoneType,
                'receiver_zone_id' => request()->receiverZoneId,
                'receiver_address' => request()->receiverAddress,
                'remarks' => request()->remarks,
                'courier_type_id' => request()->serviceId,
                'delivery_type_id' => request()->serviceTypeId,
                'charge_name' => request()->chargeName,
                'delivery_charge_unit' => request()->deliveryChargeUnit,
                'uom' => request()->uom,
                'delivery_charge' => request()->deliveryCharge,
                'cod' => request()->cod,
                'cod_amount' => request()->codAmount,
                'delivery_duration_id' => request()->deliveryTypeId,
                'collection_payment' => request()->collectionPayment,
                'delivery_payment' => request()->deliveryPayment,
                'status' => '0',
                'updated_by' => $this->userId,
            ]);

        	return redirect(route('user.booking'))->with('message','Your Booking Updated Successfully');
        }
    	return view('frontend.customer.booking.edit')->with(compact('title','formLink','buttonName','bookedOrder','services','serviceTypes','deliveryTypes','areas'));
    }

    public function orderTrack()
    {
        $title = "Track Your Booking Order";
        $order_no = request()->order_track;
        $bookedOrder = BookingOrder::where('order_no',$order_no)->first();
        
        $collectionMan = DeliveryMan::find(@$bookedOrder->collection_man_id);
        $deliveryMan = DeliveryMan::find(@$bookedOrder->delivery_man_id);
        $deliveryTypes = DeliveryType::orderBy('name','asc')->get();

        $sender_zone = DB::table('view_zones')->where('zone_id',@$bookedOrder->sender_zone_id)->first();
        $receiver_zone = DB::table('view_zones')->where('zone_id',@$bookedOrder->receiver_zone_id)->first();

        $host_ware_house = Warehouse::find(@$bookedOrder->host_warehouse_id);
        $delivery_ware_house = Warehouse::find(@$bookedOrder->destination_warehouse_id);
        return view('frontend.customer.booking.order_track')->with(compact('title','bookedOrder','collectionMan','deliveryMan','deliveryTypes','sender_zone','receiver_zone','order_no','host_ware_house','delivery_ware_house'));
    }

    public function getAgentInfo(Request $request)
    {
        $area = AreaSetup::where('id',$request->areaId)->first();

        $agent = Agent::where('hub_id',$area->hub_id)->first();

        // $agent = Agent::whereRaw('FIND_IN_SET(?,area)',[$areaId])->first();

        if ($agent)
        {
            $zoneId = $agent->id;
            $zoneType = "Agent";
        }
        else
        {
            $zoneId = "";
            $zoneType = "";
        }
        
        if($request->ajax())
        {
            return response()->json([
                'zoneId' => $zoneId,
                'zoneType'=> $zoneType,
            ]);
        }
    }

    public function getReceiverInfo(Request $request)
    {
        $receiverInfo = BookingOrder::select('tbl_booking_orders.*','tbl_agents.id as receiverAgentId')
            ->leftJoin('tbl_area','tbl_area.id','=','tbl_booking_orders.receiver_area_id')
            ->leftJoin('tbl_agents','tbl_agents.hub_id','=','tbl_area.hub_id')
            ->where('tbl_booking_orders.receiver_phone',$request->receiverPhoneNumber)
            ->orderBy('tbl_booking_orders.id','desc')
            ->first();

        if ($receiverInfo)
        {
            $receiverName = $receiverInfo->receiver_name;
            $receiverAddress = $receiverInfo->receiver_address;
            $receiverAreaId = $receiverInfo->receiver_area_id;
            $receiverAgentId = $receiverInfo->receiverAgentId;
        }
        else
        {
            $receiverName = "";
            $receiverAddress = "";
            $receiverAreaId = "";
            $receiverAgentId = "";
        }
        
        if($request->ajax())
        {
            return response()->json([
                'receiverName' => $receiverName,
                'receiverAddress'=> $receiverAddress,
                'receiverAreaId' =>$receiverAreaId,
                'receiverAgentId' =>$receiverAgentId
            ]);
        }
    }

    public function getChargeInfo(Request $request)
    {
        if ($request->senderType == 'Merchant' && $request->clientId != '')
        {
            $charge = ChargeForMerchant::where('merchant_id',$request->clientId)
                ->where('service_type_id',$request->serviceTypeId)
                ->where('service_id',$request->serviceId)
                ->first();
        }
        else
        {
            $charge = ChargeForClient::where('service_type_id',$request->serviceTypeId)
                ->where('service_id',$request->serviceId)
                ->first();
        }

        if ($request->serviceId)
        {
            $paymentForCollection = ChargeForDeliveryMen::where('service_type_name','Collect')->where('service_id',$request->serviceId)->first();
            $paymentForDelivery = ChargeForDeliveryMen::where('service_type_name','Delivery')->where('service_id',$request->serviceId)->first();

            // dd($paymentForDelivery);

            if ($paymentForCollection)
            {
                $collectionPayment = $paymentForCollection->charge;
            }
            else
            {
                $collectionPayment = 0;
            }

            if ($paymentForDelivery)
            {
                $deliveryPayment = $paymentForDelivery->charge;
            }
            else
            {
                $deliveryPayment = 0;
            }
        }
        else
        {
            $collectionPayment = 0;
            $deliveryPayment = 0;
        }

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
                'collectionPayment'=>$collectionPayment,
                'deliveryPayment'=>$deliveryPayment,
            ]);
        }
    }
}
