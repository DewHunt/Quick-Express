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

                    if ($request->type[$i] == 'Collection')
                    {
                        if ($bookingOrder->collection_payment_status == 0)
                        {
                            $bookingOrder->update( [               
                                'collection_payment_status' => 1                
                            ]);
                        }
                    }
                    else
                    {
                        if ($bookingOrder->delivery_payment_status == 0)
                        {
                            $bookingOrder->update( [               
                                'delivery_payment_status' => 1                
                            ]);
                        }
                    }
		        }
        	}
        }

        return redirect(route('deliveryManPayment.index'))->with('msg','Payment Collected Successfully');
    }

    public function edit($deliveryManPaymentId)
    {
        $title = "Edit  Delivery Man Payment";
        $formLink = "deliveryManPayment.update";
        $buttonName = "Update";

        $deliveryMen = DeliveryMan::orderBy('name','desc')->get();

        $deliveryManPayment = DeliveryManPayment::where('id',$deliveryManPaymentId)->first();

        $deliveryManPaymentLists = DeliveryManPaymentList::where('delivery_man_payment_id',$deliveryManPaymentId)->get();

        $orderInformations = BookingOrder::where('collection_man_id',$deliveryManPayment->delivery_man_id)
            ->where('collection_status',1)
            ->where('collection_payment_status',0)
            ->orWhere('delivery_man_id',$deliveryManPayment->delivery_man_id)
            ->where('delivery_status',1)
            ->where('delivery_payment_status',0)
            ->get();

        // dd($orderInformations);

        return view('admin.deliveryManPayment.edit')->with(compact('title','formLink','buttonName','deliveryMen','deliveryManPayment','deliveryManPaymentLists','orderInformations','deliveryManPaymentId'));
    }

    public function update(Request $request)
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

        $deliveryManPaymentId = $request->deliveryManPaymentId;

        $deliveryManPayment = DeliveryManPayment::find($deliveryManPaymentId);

        $deliveryMan = $request->deliveryMan;

        $deliveryManPayment->update([
            'date' => $paymentDate,
            'delivery_man_id' => $deliveryMan,
            'total_charge_amount' => $request->totalCharge,
            'updated_by' => $this->userId,
        ]);

        $deliveryManPaymentLists = DeliveryManPaymentList::where('delivery_man_payment_id',$request->deliveryManPaymentId)->get();

        foreach ($deliveryManPaymentLists as $deliveryManPaymentList)
        {
            $bookingOrder = BookingOrder::find($deliveryManPaymentList->booking_order_id);

            if ($deliveryManPaymentList->order_type == 'Collection')
            {
                if ($bookingOrder->collection_payment_status == 1)
                {
                    $bookingOrder->update( [               
                        'collection_payment_status' => 0                
                    ]);
                }
            }
            else
            {
                if ($bookingOrder->delivery_payment_status == 1)
                {
                    $bookingOrder->update( [               
                        'delivery_payment_status' => 0                
                    ]);
                }
            }
        }

        DeliveryManPaymentList::where('delivery_man_payment_id',$request->deliveryManPaymentId)->delete();

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

                    if ($request->type[$i] == 'Collection')
                    {
                        if ($bookingOrder->collection_payment_status == 0)
                        {
                            $bookingOrder->update( [               
                                'collection_payment_status' => 1                
                            ]);
                        }
                    }
                    else
                    {
                        if ($bookingOrder->delivery_payment_status == 0)
                        {
                            $bookingOrder->update( [               
                                'delivery_payment_status' => 1                
                            ]);
                        }
                    }
                }
            }
        }

        return redirect(route('deliveryManPayment.index'))->with('msg','Payment Updated Successfully');
    }

    public function view($deliveryManPaymentId)
    {
    	$title = "Payment Collection";

    	$deliveryManPayment = DeliveryManPayment::select('tbl_delivery_man_payments.*','tbl_delivery_men.name as deliveryManName')
            ->leftJoin('tbl_delivery_men','tbl_delivery_men.id','=','tbl_delivery_man_payments.delivery_man_id')
    		->where('tbl_delivery_man_payments.id',$deliveryManPaymentId)
    		->first();

    	$deliveryManPaymentLists = DeliveryManPaymentList::where('delivery_man_payment_id',$deliveryManPaymentId)->orderBy('order_type','asc')->get();

    	// dd($paymentCollection);

    	return view('admin.paymentCollection.view')->with(compact('title','deliveryManPayment','deliveryManPaymentLists'));
    }

    public function getOrderInfo(Request $request)
    {

        $orderInformations = BookingOrder::where('collection_man_id',$request->deliveryMan)
            ->where('collection_status',1)
            ->where('collection_payment_status',0)
            ->orWhere('delivery_man_id',$request->deliveryMan)
            ->where('delivery_status',1)
            ->where('delivery_payment_status',0)
            ->get();
        
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

            if ($deliveryManPaymentList->order_type == 'Collection')
            {
                if ($bookingOrder->collection_payment_status == 1)
                {
                    $bookingOrder->update( [               
                        'collection_payment_status' => 0                
                    ]);
                }
            }
            else
            {
                if ($bookingOrder->delivery_payment_status == 1)
                {
                    $bookingOrder->update( [               
                        'delivery_payment_status' => 0                
                    ]);
                }
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
