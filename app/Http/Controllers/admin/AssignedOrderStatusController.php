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
    public function index(Request $request)
    {
        // dd($request->all());
        $title = "Assigned Order Status";

        $deliveryMen = DeliveryMan::where('status',1)->orderBy('name','asc')->get();
        $hubs = HubSetup::where('status',1)->orderBy('name','asc')->get();

        if ($request->hubId == "") {
            $hubId = "";
        } else {
            $hubId = $request->hubId;
        }

        if ($request->areaId == "") {
            $areaId = "";
        } else {
            $areaId = $request->areaId;
        }

        if ($request->deliveryManId == "") {
            $deliveryManId = "";
        } else {
            $deliveryManId = $request->deliveryManId;
        }        

        if ($hubId == "" && $areaId == "" && $deliveryManId == "") {
            $allAssignedOrderStatus = BookingOrder::select('tbl_booking_orders.*','tbl_hubs.name as hubName','tbl_area.name as areaName','tbl_delivery_men.name as deliveryManName')
                ->leftJoin('tbl_hubs','tbl_hubs.id','=','tbl_booking_orders.receiver_hub_id')
                ->leftJoin('tbl_area','tbl_area.id','=','tbl_booking_orders.receiver_area_id')
                ->leftJoin('tbl_delivery_men','tbl_delivery_men.id','=','tbl_booking_orders.delivery_man_id')
                ->leftJoin('tbl_service_types','tbl_service_types.id','=','tbl_booking_orders.delivery_type_id')
                ->whereNotNull('tbl_booking_orders.delivery_man_id')
                ->orderBy('id','desc')
                ->get();
        }
        else {
            $hubId = $request->hubId;
            $areaId = $request->areaId;
            $deliveryManId = $request->deliveryManId;

            $allAssignedOrderStatus = BookingOrder::select('tbl_booking_orders.*','tbl_hubs.name as hubName','tbl_area.name as areaName','tbl_delivery_men.name as deliveryManName')
                ->leftJoin('tbl_hubs','tbl_hubs.id','=','tbl_booking_orders.receiver_hub_id')
                ->leftJoin('tbl_area','tbl_area.id','=','tbl_booking_orders.receiver_area_id')
                ->leftJoin('tbl_delivery_men','tbl_delivery_men.id','=','tbl_booking_orders.delivery_man_id')
                ->leftJoin('tbl_service_types','tbl_service_types.id','=','tbl_booking_orders.delivery_type_id')
                ->where(function($query) use($hubId,$areaId,$deliveryManId) {
                    if ($deliveryManId)
                    {
                        $query->where('tbl_booking_orders.delivery_man_id',$deliveryManId);
                    }
                    else {
                        if ($hubId)
                        {
                            $query->where('tbl_booking_orders.receiver_hub_id',$hubId);
                        }

                        if ($areaId)
                        {
                            $query->where('tbl_booking_orders.receiver_area_id',$areaId);
                        }
                    }
                })
                ->where('tbl_booking_orders.order_status','<>','On Going')
                ->get();
        }

        return view('admin.assignedOrderStatus.index')->with(compact('title','allAssignedOrderStatus','deliveryMen','hubs','hubId','areaId','deliveryManId'));
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

                if ($request->orderStatus[$i] == 'Return') {
                    $bookedOrder->update([
                        'order_status' => $request->orderStatus[$i],
                        'recieve_amount' => 0,
                        'return_charge' => $request->recieveAmount[$i],
                        'order_status_remarks' => $request->remarks[$i],
                        'updated_by' => $this->userId,
                    ]);
                } else {
                    $bookedOrder->update([
                        'order_status' => $request->orderStatus[$i],
                        'recieve_amount' => $request->recieveAmount[$i],
                        'return_charge' => 0,
                        'order_status_remarks' => $request->remarks[$i],
                        'updated_by' => $this->userId,
                    ]);
                }
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
    	$allOrders = BookingOrder::where('receiver_hub_id',$request->hubId)->where('order_status','On Going')->get();
        
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
    		->where('order_status','On Going')
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
    	$allOrders = BookingOrder::where('delivery_man_id',$request->deliveryManId)->where('order_status','On Going')->get();
        
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
    		'order_status' => 'On Going',
            'recieve_amount' => null,
            'return_charge' => null,
            'order_status_remarks' => null,
    		'updated_by' => $this->userId,
    	]);
    }
}
