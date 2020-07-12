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

class IssueToAgentController extends Controller
{
    public function index()
    {
        $title = "All Received Goods";

        $warehouseId = Warehouse::where('user_id',$this->userId)->first();
        
        $allIssuedGoods = BookingOrder::select('tbl_booking_orders.*')
            ->where('destination_warehouse_id',$warehouseId->id)
            ->where('destination_warehouse_goods_receieve_status',1)
            ->orderBy('date','desc')
            ->get();

        return view('admin.issueToAgent.index')->with(compact('title','allIssuedGoods'));
    }

    public function view($senderOrderId)
    {
        $title = "View Received Goods Details";

        $bookedOrder = BookingOrder::select('tbl_booking_orders.*','tbl_services.name as serviceName','tbl_service_types.id as deliveryTypeId','tbl_service_types.name as deliveryTypeName','tbl_delivery_men.name as collectionManName','tbl_delivery_types.name as deliveryTypeName','tbl_delivery_men.phone as collectionManPhone','tbl_delivery_men.address as collectionManAddress','tbl_delivery_men.image as collectionManImage','tbl_warehouses.name as hostWarehouseName','tbl_warehouses.contact_person as hostWarehouseContactPerson','tbl_warehouses.phone as hostWarehousePhone','tbl_warehouses.address as hostWarehouseAddress')
            ->leftJoin('tbl_services','tbl_services.id','=','tbl_booking_orders.courier_type_id')
            ->leftJoin('tbl_service_types','tbl_service_types.id','=','tbl_booking_orders.delivery_type_id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_duration_id')
            ->leftJoin('tbl_delivery_men','tbl_delivery_men.id','=','tbl_booking_orders.collection_man_id')
            ->leftJoin('tbl_warehouses','tbl_warehouses.id','=','tbl_booking_orders.host_warehouse_id')
            ->where('tbl_booking_orders.id',$senderOrderId)
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

        return view('admin.issueToAgent.view')->with(compact('title','bookedOrder','senderInfo','receiverInfo'));
    }

    public function issueToAgentStatus(Request $request)
    {
        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        if ($bookedOrder->receiver_issue_status == 1)
        {
            $bookedOrder->update( [               
                'receiver_issue_status' => 0                
            ]);
        }
        else
        {
            $bookedOrder->update( [               
                'receiver_issue_status' => 1                
            ]);
        }
    }
}
