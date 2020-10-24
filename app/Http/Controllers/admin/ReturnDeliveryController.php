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

class ReturnDeliveryController extends Controller
{
    public function index()
    {
        $title = "All Pending Delivery";

        $pendingDeliveries = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('tbl_booking_orders.return_status',1)
            ->where('tbl_booking_orders.return_to_client_status',0)
            ->orderBy('tbl_booking_orders.date','desc')
            ->get();

        $approvedDeliveries = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('tbl_booking_orders.return_to_client_status',1)
            ->orderBy('tbl_booking_orders.date','desc')
            ->get();

        return view('admin.returnDelivery.index')->with(compact('title','pendingDeliveries','approvedDeliveries'));
    }

    public function view($bookedOrderId)
    {
        $title = "View Returned Delivery Info";

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

        return view('admin.returnDelivery.view')->with(compact('title','bookedOrder','senderInfo','receiverInfo'));
    }

    public function approveOrRefuseDelivery(Request $request)
    {
        if ($request->date)
        {
            $returnDate = date('Y-m-d',strtotime($request->date));
        }
        else
        {
            $returnDate = "";
        }

        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        $bookedOrder->update( [               
            'return_date' => $returnDate,
            'return_to_client_status' => 1,
        ]);

        $msg = 'Returned To Client';
        
        if($request->ajax())
        {
            return response()->json([
                'bookedOrder'=>$bookedOrder,
                'msg'=>$msg
            ]);
        }
    }
}
