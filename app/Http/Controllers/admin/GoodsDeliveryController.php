<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BookingOrder;
use App\Agent;
use App\Subagent;
use App\Warehouse;
use App\Marchant;
use App\Client;
use App\DeliveryMan;

use DB;

class GoodsDeliveryController extends Controller
{
    public function index()
    {
        $title = "All Pending Delivery";

        $deliveryManId = DeliveryMan::where('user_id',$this->userId)->first();

        $pendingDeliveries = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('tbl_booking_orders.delivery_man_id',$deliveryManId->id)
            ->where('tbl_booking_orders.delivery_status',0)
            ->where('tbl_booking_orders.status',1)
            ->orderBy('tbl_booking_orders.date','desc')
            ->get();

        $approvedDeliveries = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('tbl_booking_orders.delivery_man_id',$deliveryManId->id)
            ->where('tbl_booking_orders.delivery_status',1)
            ->orderBy('tbl_booking_orders.date','desc')
            ->get();

        return view('admin.goodsDelivery.index')->with(compact('title','pendingDeliveries','approvedDeliveries'));
    }

    public function view($bookedOrderId)
    {
        $title = "View Goods Collection Info";

        $bookedOrder = BookingOrder::select('tbl_booking_orders.*','tbl_services.name as serviceName','tbl_service_types.id as deliveryTypeId','tbl_service_types.name as deliveryTypeName','tbl_delivery_men.name as deliveryManName','tbl_delivery_types.name as deliveryTypeName','tbl_delivery_men.phone as deliveryManPhone','tbl_delivery_men.address as deliveryManAddress','tbl_delivery_men.image as deliveryManImage','tbl_warehouses.name as hostWarehouseName','tbl_warehouses.contact_person as hostWarehouseContactPerson','tbl_warehouses.phone as hostWarehousePhone','tbl_warehouses.address as hostWarehouseAddress')
            ->leftJoin('tbl_services','tbl_services.id','=','tbl_booking_orders.courier_type_id')
            ->leftJoin('tbl_service_types','tbl_service_types.id','=','tbl_booking_orders.delivery_type_id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_duration_id')
            ->leftJoin('tbl_delivery_men','tbl_delivery_men.id','=','tbl_booking_orders.delivery_man_id')
            ->leftJoin('tbl_warehouses','tbl_warehouses.id','=','tbl_booking_orders.host_warehouse_id')
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

        return view('admin.goodsDelivery.view')->with(compact('title','bookedOrder','senderInfo','receiverInfo'));
    }

    public function approveOrRefuseDelivery(Request $request)
    {
        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        if ($bookedOrder->delivery_status == 1)
        {
            $bookedOrder->update( [               
                'delivery_status' => 0                
            ]);
            $msg = 'Delivery Refused';
        }
        else
        {
            $bookedOrder->update( [               
                'delivery_status' => 1                
            ]);
            $msg = 'Delivery Approved';
        }
        
        if($request->ajax())
        {
            return response()->json([
                'bookedOrder'=>$bookedOrder,
                'msg'=>$msg
            ]);
        }
    }

    public function returnDelivery(Request $request)
    {
        $bookedOrder = BookingOrder::find($request->bookedOrderId);
        
        $bookedOrder->update( [               
            'return_status' => 1                
        ]);
        $msg = 'Return';
        
        if($request->ajax())
        {
            return response()->json([
                'bookedOrder'=>$bookedOrder,
                'msg'=>$msg
            ]);
        }
    }

    public function rescheduleDelivery(Request $request)
    {
        if ($request->date)
        {
            $rescheduleDate = date('Y-m-d',strtotime($request->date));
        }
        else
        {
            $rescheduleDate = "";
        }

        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        $bookedOrder->update( [               
            'status' => 0,
        ]);        

        BookingOrder::create([
            'order_no' => $bookedOrder->order_no,
            'date' => $bookedOrder->date,
            'booked_type' => $bookedOrder->booked_type,
            'sender_id' => $bookedOrder->sender_id,
            'sender_area_id' => $bookedOrder->sender_area_id,
            'sender_name' => $bookedOrder->sender_name,
            'sender_phone' => $bookedOrder->sender_phone,
            'sender_zone_type' => $bookedOrder->sender_zone_type,
            'sender_zone_id' => $bookedOrder->sender_zone_id,
            'sender_address' => $bookedOrder->sender_address,
            'receiver_area_id' => $bookedOrder->receiver_area_id,
            'receiver_name' => $bookedOrder->receiver_name,
            'receiver_phone' => $bookedOrder->receiver_phone,
            'receiver_zone_type' => $bookedOrder->receiver_zone_type,
            'receiver_zone_id' => $bookedOrder->receiver_zone_id,
            'receiver_address' => $bookedOrder->receiver_address,
            'remarks' => $bookedOrder->remarks,
            'courier_type_id' => $bookedOrder->courier_type_id,
            'delivery_type_id' => $bookedOrder->delivery_type_id,
            'charge_name' => $bookedOrder->charge_name,
            'delivery_charge_unit' => $bookedOrder->delivery_charge_unit,
            'delivery_charge_unit_per_uom' => $bookedOrder->delivery_charge_unit_per_uom,
            'uom' => $bookedOrder->uom,
            'cod' => $bookedOrder->cod,
            'cod_amount' => $bookedOrder->cod_amount,
            'cod_charge' => $bookedOrder->cod_charge,
            'delivery_charge' => $bookedOrder->delivery_charge,
            'delivery_duration_id' => $bookedOrder->delivery_duration_id,
            'collection_man_id' => $bookedOrder->collection_man_id,
            'collection_payment' => $bookedOrder->collection_payment,
            'collection_status' => $bookedOrder->collection_status,
            'collection_payment_status' => $bookedOrder->collection_payment_status,
            'sender_goods_receieve_status' => $bookedOrder->sender_goods_receieve_status,
            'host_warehouse_id' => $bookedOrder->host_warehouse_id,
            'host_warehouse_goods_receieve_status' => $bookedOrder->host_warehouse_goods_receieve_status,
            'destination_warehouse_id' => $bookedOrder->destination_warehouse_id,
            'destination_warehouse_goods_receieve_status' => $bookedOrder->destination_warehouse_goods_receieve_status,
            'receiver_issue_status' => $bookedOrder->receiver_issue_status,
            'receiver_goods_receieve_status' => $bookedOrder->receiver_goods_receieve_status,
            'delivery_payment' => $bookedOrder->delivery_payment,
            'delivery_payment_status' => $bookedOrder->delivery_payment_status,
            'payment_status' => $bookedOrder->payment_status,
            'merchant_payment_status' => $bookedOrder->merchant_payment_status,
            'return_status' => $bookedOrder->return_status,
            'reschedule_status' => 1,
            'reschedule_date' => $rescheduleDate,
            'created_by' => $this->userId,
        ]);

        $msg = 'Re-Schedule';
        
        if($request->ajax())
        {
            return response()->json([
                'bookedOrder'=>$bookedOrder,
                'msg'=>$msg
            ]);
        }
    }
}
