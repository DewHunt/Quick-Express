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

class SenderOrderController extends Controller
{
    public function index()
    {
        $title = "All Sender Order";

        if ($this->userRole == 8)
        {
        	$searchId = Agent::where('user_id',$this->userId)->first();
        	$zoneType = "Agent";
        }
        elseif ($this->userRole == 10)
        {
        	$searchId = Subagent::where('user_id',$this->userId)->first();
        	$zoneType = "Subagent";
        }
        elseif ($this->userRole == 12)
        {
        	$searchId = Marchant::where('user_id',$this->userId)->first();
        	$zoneType = "Marchant";
        }

        $senderOrders = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.id as deliveryTypeId','tbl_delivery_types.name as deliveryTypeName')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('tbl_booking_orders.sender_zone_type',$zoneType)
            ->where('tbl_booking_orders.sender_zone_id',$searchId->id)
            ->orderBy('tbl_booking_orders.date','desc')
            ->get();

        // dd($senderOrders);

        return view('admin.senderOrder.index')->with(compact('title','senderOrders'));
    }

    public function view($senderOrderId)
    {
        $title = "View Sender Order";

        $bookedOrder = BookingOrder::select('tbl_booking_orders.*','tbl_courier_types.name as courierTypeName','tbl_delivery_types.id as deliveryTypeId','tbl_delivery_types.name as deliveryTypeName','tbl_delivery_men.name as collectionManName','tbl_delivery_men.phone as collectionManPhone','tbl_delivery_men.address as collectionManAddress','tbl_delivery_men.image as collectionManImage','tbl_warehouses.name as hostWarehouseName','tbl_warehouses.contact_person as hostWarehouseContactPerson','tbl_warehouses.phone as hostWarehousePhone','tbl_warehouses.address as hostWarehouseAddress')
            ->leftJoin('tbl_courier_types','tbl_courier_types.id','=','tbl_booking_orders.courier_type_id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
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

        return view('admin.senderOrder.view')->with(compact('title','bookedOrder','senderInfo','receiverInfo'));
    }

    public function assignCollectionMan($senderOrderId)
    {
        $title = "Assign Delivery Man";
        $formLink = "saveAssignedCollectionMan";
        $buttonName = "Assign";

        $bookingOrder = BookingOrder::where('id',$senderOrderId)->first();

        if ($bookingOrder->collection_man_id)
        {
            $deliveryManInfo = DeliveryMan::where('id',$bookingOrder->collection_man_id)->first();
        }
        else
        {
            $deliveryManInfo = "";
        }

        $deliveryMen = DeliveryMan::orderBy('name','asc')->get();

        return view('admin.senderOrder.assignCollectionMan')->with(compact('title','formLink','buttonName','deliveryMen','senderOrderId','bookingOrder','deliveryManInfo'));
    }

    public function saveAssignedCollectionMan(Request $request)
    {
        // dd($request->all());

        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        $bookedOrder->update([
            'collection_man_id' => $request->collectionManId,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('senderOrder.view',$request->bookedOrderId))->with('msg','Collection Man Assigned Successfully');
    }

    public function showDeliveryManInfo(Request $request)
    {
        $output = '';
        $deliveryManInfo = DeliveryMan::where('id',$request->deliveryManId)->first();

        $output .= '<table class="table table-borderless table-striped">';
        $output .= '<thead class="thead-dark">';
        $output .= '<tr>';
        $output .= '<th colspan="3">Delivery Man Info</th>';
        $output .= '<th width="150px">Image</th>';
        $output .= '</tr>';
        $output .= '</thead>';
        $output .= '<tbody>';
        $output .= '<tr>';
        $output .= '<td style="font-weight: bold;" width="100px">Name</td>';
        $output .= '<td style="font-weight: bold;" width="10px">:</td>';
        $output .= '<td>'.$deliveryManInfo->name.'</td>';
        $output .= '<td style="text-align= center;" rowspan="5"><img src="'.asset($deliveryManInfo->image).'" width="150px" height="150px"></td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<td style="font-weight: bold;" width="100px">NID</td>';
        $output .= '<td style="font-weight: bold;" width="10px">:</td>';
        $output .= '<td>'.$deliveryManInfo->nid.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<td style="font-weight: bold;" width="100px">Phone</td>';
        $output .= '<td style="font-weight: bold;" width="10px">:</td>';
        $output .= '<td>'.$deliveryManInfo->phone.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<td style="font-weight: bold;" width="100px">Email</td>';
        $output .= '<td style="font-weight: bold;" width="10px">:</td>';
        $output .= '<td>'.$deliveryManInfo->email.'</td>';
        $output .= '</tr>';
        $output .= '<tr>';
        $output .= '<td style="font-weight: bold;" width="100px">Address</td>';
        $output .= '<td style="font-weight: bold;" width="10px">:</td>';
        $output .= '<td>'.$deliveryManInfo->address.'</td>';
        $output .= '</tr>';
        $output .= '</tbody>';
        $output .= '</table>';

        echo $output;
    }

    public function transferToHostWarehouse($senderOrderId)
    {
        $title = "Transfer To Host Warehouse";
        $formLink = "senderOrder.saveTransferToHostWarehouse";
        $buttonName = "Transfer";

        $bookingOrder = BookingOrder::where('id',$senderOrderId)->first();

        if ($bookingOrder->host_warehouse_id)
        {
            $warehouseInfo = Warehouse::where('id',$bookingOrder->host_warehouse_id)->first();
        }
        else
        {
            $warehouseInfo = "";
        }

        $warehouses = Warehouse::orderBy('name','asc')->get();

        return view('admin.senderOrder.transferToHostWarehouse')->with(compact('title','formLink','buttonName','warehouses','senderOrderId','bookingOrder','warehouseInfo'));
    }

    public function saveTransferToHostWarehouse(Request $request)
    {
        // dd($request->all());

        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        $bookedOrder->update([
            'host_warehouse_id' => $request->warehouseId,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('senderOrder.view',$request->bookedOrderId))->with('msg','Transfer To Host Warehouse Successfully');
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

        if ($bookedOrder->sender_goods_receieve_status == 1)
        {
            $bookedOrder->update( [               
                'sender_goods_receieve_status' => 0                
            ]);
        }
        else
        {
            $bookedOrder->update( [               
                'sender_goods_receieve_status' => 1                
            ]);
        }
    }
}
