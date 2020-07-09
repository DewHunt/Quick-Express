<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BookingOrder;
use App\Agent;
use App\Subagent;
use App\Warehouse;
use App\CourierType;
use App\DeliveryType;
use App\Client;
use App\Admin;
use App\UserRoles;
use App\Marchant;

use DB;

class MerchantBookingOrderController extends Controller
{
    public function index()
    {
    	$title = "Booking Your Order";

    	$bookingOrders = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName','tbl_marchants.user_id')
            ->join('tbl_marchants','tbl_booking_orders.sender_id','=','tbl_marchants.id')
    		->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->Where('tbl_marchants.user_id',\Auth::user()->id)
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

        $merchant_info = Marchant::where('user_id',\Auth::user()->id)->first();

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

        // echo $orderNo; exit();

    	return view('admin.merchantBookingOrder.add')->with(compact('title','formLink','buttonName','merchant_info','courierTypes','deliveryTypes','zones','orderNo'));
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

        $senderZone = explode(',',$request->senderZone);
        $senderZoneId = $senderZone[0];
        $senderZoneType = $senderZone[1];

        $receiverZone = explode(',',$request->receiverZone);
        $receiverZoneId = $receiverZone[0];
        $receiverZoneType = $receiverZone[1];       

        BookingOrder::create([
            'order_no' => $request->orderNo,
            'date' => $bookingDate,
            'booked_type' => 'Merchant',
            'sender_id' => $request->senderId,
            'sender_name' => $request->senderName,
            'sender_phone' => $request->senderPhoneNumber,
            'sender_zone_type' => $senderZoneType,
            'sender_zone_id' => $senderZoneId,
            'sender_address' => $request->senderAddress,
            'receiver_name' => $request->receiverName,
            'receiver_phone' => $request->receiverPhoneNumber,
            'receiver_zone_type' => $receiverZoneType,
            'receiver_zone_id' => $receiverZoneId,
            'receiver_address' => $request->receiverAddress,
            'courier_type_id' => $request->courierType,
            'courier_unit_price' => $request->courierTypeUnit,
            'delivery_type_id' => $request->deliveryTypeId,
            'delivery_unit_price' => $request->deliveryTypeUnit,
            'uom' => $request->uom,
            'delivery_charge' => $request->deliveryCharge,
            'created_by' => $this->userId,
        ]);

        return redirect(route('merchantBookingOrder.index'))->with('msg','Order Created Successfully');
    }

    public function edit($bookedOrderId)
    {
    	$title = "Edit Booked Order";
    	$formLink = "merchantBookingOrder.update";
    	$buttonName = "Update";

        $bookedOrder = BookingOrder::where('id',$bookedOrderId)->first();

    	$courierTypes = CourierType::orderBy('name','asc')->get();
    	$deliveryTypes = DeliveryType::orderBy('name','asc')->get();
    	$zones = DB::table('view_zones')->select('view_zones.*')->orderBy('view_zones.zone_type')->get();

    	return view('admin.merchantBookingOrder.edit')->with(compact('title','formLink','buttonName','bookedOrder','courierTypes','deliveryTypes','zones'));
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

        $senderZone = explode(',',$request->senderZone);
        $senderZoneId = $senderZone[0];
        $senderZoneType = $senderZone[1];

        $receiverZone = explode(',',$request->receiverZone);
        $receiverZoneId = $receiverZone[0];
        $receiverZoneType = $receiverZone[1];

        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        $bookedOrder->update([
            'order_no' => $request->orderNo,
            'date' => $deliveryDate,
            'sender_name' => $request->senderName,
            'sender_phone' => $request->senderPhoneNumber,
            'sender_zone_type' => $senderZoneType,
            'sender_zone_id' => $senderZoneId,
            'sender_address' => $request->senderAddress,
            'receiver_name' => $request->receiverName,
            'receiver_phone' => $request->receiverPhoneNumber,
            'receiver_zone_type' => $receiverZoneType,
            'receiver_zone_id' => $receiverZoneId,
            'receiver_address' => $request->receiverAddress,
            'courier_type_id' => $request->courierType,
            'courier_unit_price' => $request->courierTypeUnit,
            'delivery_type_id' => $request->deliveryTypeId,
            'delivery_unit_price' => $request->deliveryTypeUnit,
            'uom' => $request->uom,
            'delivery_charge' => $request->deliveryCharge,
            'created_by' => $this->userId,
        ]);

        return redirect(route('merchantBookingOrder.index'))->with('msg','Your Booking Updated Successfully');
    }

    public function view($bookedOrderId)
    {
    	$title = "View Booked Order";

    	$bookedOrder = BookingOrder::select('tbl_booking_orders.*','tbl_courier_types.name as courierTypeName','tbl_delivery_types.name as deliveryTypeName')
    		->leftJoin('tbl_courier_types','tbl_courier_types.id','=','tbl_booking_orders.courier_type_id')
    		->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
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


    public function getClientTypeInfo(Request $request)
    {
    	$courierType = CourierType::where('id',$request->courierTypeId)->first();
    	
        if($request->ajax())
        {
            return response()->json([
                'courierTypeUnitPrice'=>$courierType->charge,
            ]);
        }
    }

    public function getDeliveryTypeInfo(Request $request)
    {
    	$deliveryType = DeliveryType::where('id',$request->deliveryTypeId)->first();

    	
        if($request->ajax())
        {
            return response()->json([
                'deliveryTypeUnitPrice'=>$deliveryType->charge,
            ]);
        }
    }

    public function getOrderNo(Request $request)
    {

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