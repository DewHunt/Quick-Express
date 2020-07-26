<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BookingOrder;
use App\DeliveryManPayment;
use App\DeliveryManPaymentList;
use App\DeliveryMan;
use App\Client;
use App\Marchant;

use DB;

class DeliveryManPaymentController extends Controller
{
    public function index()
    {
    	$title = "Delivery Man Payment";

    	$deliveryManPayments = DeliveryManPayment::select('tbl_delivery_man_payments.*','tbl_delivery_men.name as deliveryManName')
    		->leftJoin('tbl_delivery_men','tbl_delivery_men.id','=','tbl_delivery_man_payments.delivery_man_id')
    		->orderBy('tbl_delivery_man_payments.id','desc')
    		->get();

    	return view('admin.deliveryManPayment.index')->with(compact('title','deliveryManPayments'));
    }

    public function add()
    {
    	$title = "Add Delivery Man Payment";
    	$formLink = "deliveryManPayment.save";
    	$buttonName = "Save";

    	$deliveryMen = DeliveryMan::orderBy('name','desc')->get();

    	return view('admin.deliveryManPayment.add')->with(compact('title','formLink','buttonName','deliveryMen'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        if ($request->paymentDate)
        {
            $paymentDate = date('Y-m-d',strtotime($request->paymentDate));
        }
        else
        {
            $paymentDate = "";
        }

        $deliveryMan = $request->deliveryMan;

        $deliveryManPayment = DeliveryManPayment::create([
            'date' => $paymentDate,
            'delivery_man_id' => $deliveryMan,
            'total_charge_amount' => $request->totalCharge,
            'created_by' => $this->userId,
        ]);

        $countOrderId = count($request->orderId);
        if($request->orderId)
        {
        	for ($i=0; $i < $countOrderId; $i++)
        	{
		        $deliveryManPaymentList = DeliveryManPaymentList::create([
		            'delivery_man_payment_id' => $deliveryManPayment->id,
		            'booking_order_id' => $request->orderId[$i],
		            'order_no' => $request->orderNo[$i],
                    'order_type' => $request->type[$i],
		            'charge' => $request->charge[$i],
		            'created_by' => $this->userId,
		        ]);

		        if ($deliveryManPaymentList)
		        {
		        	$bookingOrder = BookingOrder::find($deliveryManPaymentList->booking_order_id);

			        if ($bookingOrder->delivery_man_payment_status == 1)
			        {
			            $bookingOrder->update( [               
			                'delivery_man_payment_status' => 0                
			            ]);
			        }
			        else
			        {
			            $bookingOrder->update( [               
			                'delivery_man_payment_status' => 1                
			            ]);
			        }
		        }
        	}
        }

        return redirect(route('deliveryManPayment.index'))->with('msg','Payment Collected Successfully');
    }

    public function view($deliveryManPaymentId)
    {
    	$title = "Payment Collection";

    	$deliveryManPayment = DeliveryManPayment::select('tbl_delivery_man_payments.*','tbl_delivery_men.name as deliveryManName')
            ->leftJoin('tbl_delivery_men','tbl_delivery_men.id','=','tbl_delivery_man_payments.delivery_man_id')
    		->where('tbl_delivery_man_payments.id',$deliveryManPaymentId)
    		->first();

    	$deliveryManPaymentLists = DeliveryManPaymentList::where('delivery_man_payment_id',$deliveryManPaymentId)->get();

    	// dd($paymentCollection);

    	return view('admin.paymentCollection.view')->with(compact('title','deliveryManPayment','deliveryManPaymentLists'));
    }

    public function getOrderInfo(Request $request)
    {

        $orderInformations = BookingOrder::where('collection_man_id',$request->deliveryMan)->orWhere('delivery_man_id',$request->deliveryMan)->get();
        
        if($request->ajax())
        {
            return response()->json([
                'orderInformations' => $orderInformations,
            ]);
        }
    }

    public function delete(Request $request)
    {
    	$deliveryManPaymentLists = DeliveryManPaymentList::where('delivery_man_payment_id',$request->deliveryManPaymentId)->get();

    	foreach ($deliveryManPaymentLists as $deliveryManPaymentList)
    	{
	        $bookingOrder = BookingOrder::find($deliveryManPaymentList->booking_order_id);

	        if ($bookingOrder->delivery_man_payment_status == 1)
	        {
	            $bookingOrder->update( [               
	                'delivery_man_payment_status' => 0                
	            ]);
	        }
    	}

    	DeliveryManPaymentList::where('delivery_man_payment_id',$request->deliveryManPaymentId)->delete();

    	DeliveryManPayment::where('id',$request->deliveryManPaymentId)->delete();
    }

    public function status(Request $request)
    {
        $deliveryManPayment = DeliveryManPayment::find($request->deliveryManPaymentId);

        if ($deliveryManPayment->status == 1)
        {
            $deliveryManPayment->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $deliveryManPayment->update( [               
                'status' => 1                
            ]);
        }
    }
}
