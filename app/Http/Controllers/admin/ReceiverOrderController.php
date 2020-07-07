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

class ReceiverOrderController extends Controller
{
    public function index()
    {
        $title = "All Receiver Order";

        if ($this->userRole == 8)
        {
        	$agentId = Agent::where('user_id',$this->userId)->first();
        	$zoneType = "Agent";
        }
        elseif ($this->userRole == 10)
        {
        	$agentId = Subagent::where('user_id',$this->userId)->first();
        	$zoneType = "Subagent";
        }
        elseif ($this->userRole == 11)
        {
        	$agentId = Warehouse::where('user_id',$this->userId)->first();
        	$zoneType = "Warehouse";
        }
        elseif ($this->userRole == 12)
        {
        	$agentId = Marchant::where('user_id',$this->userId)->first();
        	$zoneType = "Marchant";
        }

        $receiverOrders = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.id as deliveryTypeId','tbl_delivery_types.name as deliveryTypeName')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('tbl_booking_orders.receiver_zone_type',$zoneType)
            ->where('tbl_booking_orders.receiver_zone_id',$agentId->id)
            ->where('tbl_booking_orders.receiver_issue_status',1)
            ->orderBy('tbl_booking_orders.date','desc')
            ->get();

        return view('admin.receiverOrder.index')->with(compact('title','receiverOrders'));
    }

    public function view($receiverOrderId)
    {
        $title = "View Sender Order";

        $bookedOrder = BookingOrder::select('tbl_booking_orders.*','tbl_courier_types.name as courierTypeName','tbl_delivery_types.id as deliveryTypeId','tbl_delivery_types.name as deliveryTypeName','tbl_delivery_men.name as deliveryManName','tbl_delivery_men.phone as deliveryManPhone','tbl_delivery_men.address as deliveryManAddress','tbl_delivery_men.image as deliveryManImage')
            ->leftJoin('tbl_courier_types','tbl_courier_types.id','=','tbl_booking_orders.courier_type_id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->leftJoin('tbl_delivery_men','tbl_delivery_men.id','=','tbl_booking_orders.delivery_man_id')
            ->where('tbl_booking_orders.id',$receiverOrderId)
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

        return view('admin.receiverOrder.view')->with(compact('title','bookedOrder','senderInfo','receiverInfo'));
    }

    public function assignDeliveryMan($receiverOrderId)
    {
        $title = "Assign Delivery Man";
        $formLink = "saveAssignedDeliveryMan";
        $buttonName = "Assign";

        $bookingOrder = BookingOrder::where('id',$receiverOrderId)->first();

        if ($bookingOrder->delivery_man_id)
        {
            $deliveryManInfo = DeliveryMan::where('id',$bookingOrder->delivery_man_id)->first();
        }
        else
        {
            $deliveryManInfo = "";
        }

        $deliveryMen = DeliveryMan::orderBy('name','asc')->get();

        return view('admin.receiverOrder.assignDeliveryMan')->with(compact('title','formLink','buttonName','deliveryMen','receiverOrderId','bookingOrder','deliveryManInfo'));
    }

    public function saveAssignedDeliveryMan(Request $request)
    {
        // dd($request->all());

        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        $bookedOrder->update([
            'delivery_man_id' => $request->deliveryManId,
            'created_by' => $this->userId,
        ]);

        return redirect(route('receiverOrder.view',$request->bookedOrderId))->with('msg','Delivery Man Assigned Successfully');
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

    public function goodsReceiveStatus(Request $request)
    {
        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        if ($bookedOrder->receiver_goods_receieve_status == 1)
        {
            $bookedOrder->update( [               
                'receiver_goods_receieve_status' => 0                
            ]);
        }
        else
        {
            $bookedOrder->update( [               
                'receiver_goods_receieve_status' => 1                
            ]);
        }

        if ($request->returnView == 1)
        {
            return redirect(route('receiverOrder.view',$request->bookedOrderId))->with('msg','Goods Received Successfully!');
        }
    }

    public function goodsDeliveryStatus(Request $request)
    {
        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        if ($bookedOrder->delivery_status == 1)
        {
            $bookedOrder->update( [               
                'delivery_status' => 0                
            ]);
        }
        else
        {
            $bookedOrder->update( [               
                'delivery_status' => 1                
            ]);
        }
    }
}
