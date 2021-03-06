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

class WarehouseReceiveGoodsController extends Controller
{
    public function index()
    {
        $title = "All Received Goods";

        $warehouseId = Warehouse::where('user_id',$this->userId)->first();
        
        $allReceivedGoods = BookingOrder::select('tbl_booking_orders.*')
            ->where('tbl_booking_orders.host_warehouse_id',$warehouseId->id)
            ->orderBy('tbl_booking_orders.date','desc')
            ->get();

        return view('admin.warehouseReceiveGoods.index')->with(compact('title','allReceivedGoods'));
    }

    public function view($senderOrderId)
    {
        $title = "View Received Goods Details";

        $bookedOrder = BookingOrder::select('tbl_booking_orders.*','tbl_courier_types.name as courierTypeName','tbl_delivery_types.id as deliveryTypeId','tbl_delivery_types.name as deliveryTypeName','tbl_delivery_men.name as collectionManName','tbl_delivery_men.phone as collectionManPhone','tbl_delivery_men.address as collectionManAddress','tbl_delivery_men.image as collectionManImage','tbl_warehouses.name as destinationWarehouseName','tbl_warehouses.contact_person as destinationWarehouseContactPerson','tbl_warehouses.phone as destinationWarehousePhone','tbl_warehouses.address as destinationWarehouseAddress')
            ->leftJoin('tbl_courier_types','tbl_courier_types.id','=','tbl_booking_orders.courier_type_id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->leftJoin('tbl_delivery_men','tbl_delivery_men.id','=','tbl_booking_orders.collection_man_id')
            ->leftJoin('tbl_warehouses','tbl_warehouses.id','=','tbl_booking_orders.destination_warehouse_id')
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

        return view('admin.warehouseReceiveGoods.view')->with(compact('title','bookedOrder','senderInfo','receiverInfo'));
    }

    public function transferToDestinationWarehouse($senderOrderId)
    {
        $title = "Transfer To Destination Warehouse";
        $formLink = "warehouseReceiveGoods.saveTransferToDestinationWarehouse";
        $buttonName = "Transfer";

        $bookingOrder = BookingOrder::where('id',$senderOrderId)->first();

        if ($bookingOrder->destination_warehouse_id)
        {
            $warehouseInfo = Warehouse::where('id',$bookingOrder->destination_warehouse_id)->first();
        }
        else
        {
            $warehouseInfo = "";
        }

        $warehouses = Warehouse::orderBy('name','asc')->get();

        return view('admin.warehouseReceiveGoods.transferToDestinationWarehouse')->with(compact('title','formLink','buttonName','warehouses','senderOrderId','bookingOrder','warehouseInfo'));
    }

    public function saveTransferToDestinationWarehouse(Request $request)
    {
        // dd($request->all());

        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        $bookedOrder->update([
            'destination_warehouse_id' => $request->warehouseId,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('warehouseReceiveGoods.view',$request->bookedOrderId))->with('msg','Transfer To Destination Warehouse Successfully');
    }

    public function showWarehouseInfo(Request $request)
    {
        $output = '';
        $warehouseInfo = Warehouse::where('id',$request->warehouseId)->first();

        $output .= '<table class="table table-borderless table-striped">';
        $output .= '<thead class="thead-dark">';
        $output .= '<tr>';
        $output .= '<th colspan="3">Delivery Man Info</th>';
        $output .= '</tr>';
        $output .= '</thead>';
        $output .= '<tbody>';
        $output .= '<tr>';
        $output .= '<td style="font-weight: bold;" width="120px">Name</td>';
        $output .= '<td style="font-weight: bold;" width="10px">:</td>';
        $output .= '<td>'.$warehouseInfo->name.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<td style="font-weight: bold;" width="120px">Contact Person</td>';
        $output .= '<td style="font-weight: bold;" width="10px">:</td>';
        $output .= '<td>'.$warehouseInfo->contact_person.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<td style="font-weight: bold;" width="120px">Phone</td>';
        $output .= '<td style="font-weight: bold;" width="10px">:</td>';
        $output .= '<td>'.$warehouseInfo->phone.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<td style="font-weight: bold;" width="120px">Email</td>';
        $output .= '<td style="font-weight: bold;" width="10px">:</td>';
        $output .= '<td>'.$warehouseInfo->email.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<td style="font-weight: bold;" width="120px">Address</td>';
        $output .= '<td style="font-weight: bold;" width="10px">:</td>';
        $output .= '<td>'.$warehouseInfo->address.'</td>';
        $output .= '</tr>';
        $output .= '</tbody>';
        $output .= '</table>';

        echo $output;
    }

    public function goodsReceiveStatus(Request $request)
    {
        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        if ($bookedOrder->host_warehouse_goods_receieve_status == 1)
        {
            $bookedOrder->update( [               
                'host_warehouse_goods_receieve_status' => 0                
            ]);
        }
        else
        {
            $bookedOrder->update( [               
                'host_warehouse_goods_receieve_status' => 1                
            ]);
        }
    }
}
