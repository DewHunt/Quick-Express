<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BookingOrder;
use App\HubSetup;
use App\AreaSetup;
use App\DeliveryMan;

use DB;

class AssignedOrderStatusController extends Controller
{
    public function index()
    {
        $title = "Assigned Order Status";

        $allAssignedOrderStatus = BookingOrder::select('tbl_booking_orders.*','tbl_hubs.name as hubName','tbl_area.name as areaName','tbl_delivery_men.name as deliveryManName')
            ->leftJoin('tbl_hubs','tbl_hubs.id','=','tbl_booking_orders.receiver_hub_id')
            ->leftJoin('tbl_area','tbl_area.id','=','tbl_booking_orders.receiver_area_id')
            ->leftJoin('tbl_delivery_men','tbl_delivery_men.id','=','tbl_booking_orders.delivery_man_id')
            ->leftJoin('tbl_service_types','tbl_service_types.id','=','tbl_booking_orders.delivery_type_id')
            ->whereNotNull('tbl_booking_orders.delivery_man_id')
            ->orderBy('id','desc')
            ->get();

        return view('admin.assignedOrderStatus.index')->with(compact('title','allAssignedOrderStatus'));
    }

    public function add()
    {
        $title = "Add Booking Order";
        $formLink = "assignedOrderStatus.save";
        $buttonName = "Save";

        $deliveryMen = DeliveryMan::where('status',1)->orderBy('name','asc')->get();
        $hubs = HubSetup::where('status',1)->orderBy('name','asc')->get();

        return view('admin.assignedOrderStatus.add')->with(compact('title','formLink','buttonName','hubs','deliveryMen'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());
        // dd($request->orderStatus);

        $countOrderId = count($request->orderId);

        if($request->orderId)
        {
        	for ($i=0; $i < $countOrderId; $i++)
        	{
		        $bookedOrder = BookingOrder::find($request->orderId[$i]);

		        $bookedOrder->update([
		        	'order_status' => $request->orderStatus[$i],
		            'updated_by' => $this->userId,
		        ]);
        	}
        }

        return redirect(route('assignedOrderStatus.index'))->with('msg','Order Booked Successfully');
    }

    public function getAllAreas(Request $request)
    {
        $output = '';

        $areas = AreaSetup::where('hub_id',$request->hubId)->where('status','1')->get();
        // dd($areas);

        if ($areas)
        {
            $output .= '<select class="form-control select2 select2-multiple areaId" name="areaId" id="areaId" multiple>';
            foreach ($areas as $area)
            {
                $output .= '<option value="'.$area->id.'">'.$area->name.'</option>';
            }
            $output .= '</select>';         
        }
        else
        {
            $output .= '<select class="form-control select2 select2-multiple areaId" name="areaId" id="areaId" multiple>';
            $output .= '</select>'; 
        }  

        echo $output;
    }

    public function hubWiseOrder(Request $request)
    {
    	$allOrders = BookingOrder::where('receiver_hub_id',$request->hubId)->whereNull('order_status')->get();
        
        if($request->ajax())
        {
            return response()->json([
                'allOrders' => $allOrders
            ]);
        }
    }

    public function areaWiseOrder(Request $request)
    {
    	// dd($request->areaId);
    	$allOrders = BookingOrder::where('receiver_hub_id',$request->hubId)
    		->whereIn('receiver_area_id',$request->areaId)
    		->whereNull('order_status')
    		->get();
        
        if($request->ajax())
        {
            return response()->json([
                'allOrders' => $allOrders
            ]);
        }
    }

    public function deliveryManWiseOrder(Request $request)
    {
    	$allOrders = BookingOrder::where('delivery_man_id',$request->deliveryManId)->whereNull('order_status')->get();
        
        if($request->ajax())
        {
            return response()->json([
                'allOrders' => $allOrders
            ]);
        }
    }

    public function reject(Request $request)
    {
    	$bookingOrder = BookingOrder::find($request->orderId);

    	$bookingOrder->update([
    		'order_status' => null,
    		'updated_by' => $this->userId,
    	]);
    }
}
