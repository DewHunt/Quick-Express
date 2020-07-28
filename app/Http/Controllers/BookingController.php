<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\BookingOrder;
use App\Agent;
use App\Subagent;
use App\Warehouse;
use App\DeliveryType;
use App\DeliveryMan;

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

    public function create(){
    	$title = "Create New Booking";
    	$formLink = "user.bookingCreate";
    	$buttonName = "Save";

    	$courierTypes = CourierType::orderBy('name','asc')->get();
    	$deliveryTypes = DeliveryType::orderBy('name','asc')->get();

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

        if(count(request()->all()) > 0){

        	if (request()->bookingDate)
	        {
	            $bookingDate = date('Y-m-d',strtotime(request()->bookingDate));
	        }
	        else
	        {
	            $bookingDate = "";
	        }

	        $senderZone = explode(',',request()->senderZone);
	        $senderZoneId = $senderZone[0];
	        $senderZoneType = $senderZone[1];

	        $receiverZone = explode(',',request()->receiverZone);
	        $receiverZoneId = $receiverZone[0];
	        $receiverZoneType = $receiverZone[1];

	        BookingOrder::create([
	            'sender_id' => \Auth::guard('customer')->user()->id,
	            'order_no' => request()->orderNo,
	            'date' => $bookingDate,
	            'booked_type' => 'Client',
	            'sender_name' => request()->senderName,
	            'sender_phone' => request()->senderPhoneNumber,
	            'sender_zone_type' => $senderZoneType,
	            'sender_zone_id' => $senderZoneId,
	            'sender_address' => request()->senderAddress,
	            'receiver_name' => request()->receiverName,
	            'receiver_phone' => request()->receiverPhoneNumber,
	            'receiver_zone_type' => $receiverZoneType,
	            'receiver_zone_id' => $receiverZoneId,
	            'receiver_address' => request()->receiverAddress,
	            'courier_type_id' => request()->courierType,
	            'courier_unit_price' => request()->courierTypeUnit,
	            'delivery_type_id' => request()->deliveryTypeId,
	            'delivery_unit_price' => request()->deliveryTypeUnit,
	            'uom' => request()->uom,
	            'delivery_charge' => request()->deliveryCharge,
	            'status' => '0',
	        ]);
        	return redirect(route('user.booking'))->with('message','Your Booking Created Successfully');
        }
    	return view('frontend.customer.booking.create')->with(compact('title','formLink','buttonName','courierTypes','deliveryTypes','zones','orderNo'));
    }

    public function view($id){
        $title = "View Your Booking";
        $bookedOrder = BookingOrder::where('id',$id)->where('sender_id',\Auth::guard('customer')->user()->id)->first();
        $deliveryMan = DeliveryMan::find($bookedOrder->delivery_man_id);
        $courierType = CourierType::find($bookedOrder->courier_type_id);
        $deliveryTypes = DeliveryType::orderBy('name','asc')->get();
        $sender_zone = DB::table('view_zones')->where('zone_id',$bookedOrder->sender_zone_id)->first();
        $receiver_zone = DB::table('view_zones')->where('zone_id',$bookedOrder->receiver_zone_id)->first();

        return view('frontend.customer.booking.view')->with(compact('title','bookedOrder','deliveryMan','courierType','deliveryTypes','sender_zone','receiver_zone'));
    }


    public function edit($id){
    	$title = "Edit Your Booking";
    	$buttonName = "Update";

        $bookedOrder = BookingOrder::find($id);

    	$courierTypes = CourierType::orderBy('name','asc')->get();
    	$deliveryTypes = DeliveryType::orderBy('name','asc')->get();
    	$zones = DB::table('view_zones')->select('view_zones.*')->orderBy('view_zones.zone_type')->get();

        if(count(request()->all()) > 0){

        	if (request()->deliveryDate)
        {
            $deliveryDate = date('Y-m-d',strtotime(request()->deliveryDate));
        }
        else
        {
            $deliveryDate = "";
        }

        $senderZone = explode(',',request()->senderZone);
        $senderZoneId = $senderZone[0];
        $senderZoneType = $senderZone[1];

        $receiverZone = explode(',',request()->receiverZone);
        $receiverZoneId = $receiverZone[0];
        $receiverZoneType = $receiverZone[1];

        $bookedOrder->update([
            'order_no' => request()->orderNo,
            'date' => $deliveryDate,
            'booked_type' => 'Client',
            'sender_name' => request()->senderName,
            'sender_phone' => request()->senderPhoneNumber,
            'sender_zone_type' => $senderZoneType,
            'sender_zone_id' => $senderZoneId,
            'sender_address' => request()->senderAddress,
            'receiver_name' => request()->receiverName,
            'receiver_phone' => request()->receiverPhoneNumber,
            'receiver_zone_type' => $receiverZoneType,
            'receiver_zone_id' => $receiverZoneId,
            'receiver_address' => request()->receiverAddress,
            'courier_type_id' => request()->courierType,
            'courier_unit_price' => request()->courierTypeUnit,
            'delivery_type_id' => request()->deliveryTypeId,
            'delivery_unit_price' => request()->deliveryTypeUnit,
            'uom' => request()->uom,
            'delivery_charge' => request()->deliveryCharge,
	        'status' => '0',
        ]);
        	return redirect(route('user.booking'))->with('message','Your Booking Updated Successfully');
        }
    	return view('frontend.customer.booking.edit')->with(compact('title','buttonName','bookedOrder','courierTypes','deliveryTypes','zones'));
    }

    public function orderTrack(){
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

}
