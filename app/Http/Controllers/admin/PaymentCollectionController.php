<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BookingOrder;
use App\PaymentCollection;
use App\PaymentCollectionList;
use App\Client;
use App\Marchant;

use DB;

class PaymentCollectionController extends Controller
{
    public function index()
    {
    	$title = "Payment Collection";

    	$paymentCollections = PaymentCollection::select('tbl_payment_collections.*','view_clients.clientType as clientType','view_clients.clientName as clientName')
    		->leftJoin('view_clients', function($query) {
    			$query->on('tbl_payment_collections.client_type','=','view_clients.clientType');
    			$query->on('tbl_payment_collections.client_id','=','view_clients.clientId');
    		})
    		->orderBy('tbl_payment_collections.id','desc')
    		->get();

    	return view('admin.paymentCollection.index')->with(compact('title','paymentCollections'));
    }

    public function add()
    {
    	$title = "Add Payment Collection";
    	$formLink = "paymentCollection.save";
    	$buttonName = "Save";

    	$clients = DB::table('view_clients')->select('view_clients.*')->orderBy('view_clients.clientType')->get();

    	return view('admin.paymentCollection.add')->with(compact('title','formLink','buttonName','clients'));
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

        $clients = explode(',',$request->client);
        $clientId = $clients[0];
        $clientType = $clients[1];

        $paymentCollection = PaymentCollection::create([
            'date' => $paymentDate,
            'client_type' => $clientType,
            'client_id' => $clientId,
            'total_cod_amount' => $request->totalCodAmount,
            'total_delivery_charge_amount' => $request->totalDeliveryCharge,
            'balance' => $request->balance,
            'created_by' => $this->userId,
        ]);

        $countOrderId = count($request->orderId);
        if($request->orderId)
        {
        	for ($i=0; $i < $countOrderId; $i++)
        	{
		        $paymentCollectionList = PaymentCollectionList::create([
		            'payment_collection_id' => $paymentCollection->id,
		            'booking_order_id' => $request->orderId[$i],
		            'order_no' => $request->orderNo[$i],
		            'cod_amount' => $request->codAmount[$i],
		            'delivery_charge' => $request->deliveryCharge[$i],
		            'created_by' => $this->userId,
		        ]);

		        if ($paymentCollectionList)
		        {
		        	$bookingOrder = BookingOrder::find($paymentCollectionList->booking_order_id);

			        if ($bookingOrder->payment_status == 1)
			        {
			            $bookingOrder->update( [               
			                'payment_status' => 0                
			            ]);
			        }
			        else
			        {
			            $bookingOrder->update( [               
			                'payment_status' => 1                
			            ]);
			        }
		        }
        	}
        }

        return redirect(route('paymentCollection.index'))->with('msg','Payment Collected Successfully');
    }

    public function edit($paymentCollectionId)
    {
        $title = "Edit Payment Collection";
        $formLink = "paymentCollection.update";
        $buttonName = "Update";

        $clients = DB::table('view_clients')->select('view_clients.*')->orderBy('view_clients.clientType')->get();

        $paymentCollection = DeliveryManPayment::where('id',$paymentCollectionId)->first();

        $paymentCollectionLists = DeliveryManPaymentList::where('delivery_man_payment_id',$paymentCollectionId)->get();

        $orderInformations = BookingOrder::where('booked_type',$paymentCollection->client_type)
            ->where('sender_id',$paymentCollection->client_id)
            ->where('payment_status',0)
            ->get();

        // dd($orderInformations);

        return view('admin.paymentCollection.edit')->with(compact('title','formLink','buttonName','clients','paymentCollection','paymentCollectionLists','orderInformations','paymentCollectionId'));
    }

    public function view($paymentCollectionId)
    {
    	$title = "Payment Collection";

    	$paymentCollection = PaymentCollection::select('tbl_payment_collections.*','view_clients.clientType as clientType','view_clients.clientName as clientName')
    		->leftJoin('view_clients', function($query) {
    			$query->on('tbl_payment_collections.client_type','=','view_clients.clientType');
    			$query->on('tbl_payment_collections.client_id','=','view_clients.clientId');
    		})
    		->where('tbl_payment_collections.id',$paymentCollectionId)
    		->first();

    	$paymentCollectionLists = PaymentCollectionList::where('payment_collection_id',$paymentCollectionId)->get();

    	// dd($paymentCollection);

    	return view('admin.paymentCollection.view')->with(compact('title','paymentCollection','paymentCollectionLists'));
    }

    public function getOrderInfo(Request $request)
    {
        $clients = explode(',',$request->client);
        $clientId = $clients[0];
        $clientType = $clients[1];

        $orderInformations = BookingOrder::where('booked_type',$clientType)->where('sender_id',$clientId)->where('payment_status',0)->get();

        // dd($orderInformations);
        
        if($request->ajax())
        {
            return response()->json([
                'orderInformations' => $orderInformations,
            ]);
        }
    }

    public function delete(Request $request)
    {
    	$paymentCollectionLists = PaymentCollectionList::where('payment_collection_id',$request->paymentCollectionId)->get();

    	foreach ($paymentCollectionLists as $paymentCollectionList)
    	{
	        $bookingOrder = BookingOrder::find($paymentCollectionList->booking_order_id);

	        if ($bookingOrder->payment_status == 1)
	        {
	            $bookingOrder->update( [               
	                'payment_status' => 0                
	            ]);
	        }
	        else
	        {
	            $bookingOrder->update( [               
	                'payment_status' => 1                
	            ]);
	        }
    	}

    	PaymentCollectionList::where('payment_collection_id',$request->paymentCollectionId)->delete();

    	PaymentCollection::where('id',$request->paymentCollectionId)->delete();
    }

    public function status(Request $request)
    {
        $paymentCollection = PaymentCollection::find($request->paymentCollectionId);

        if ($paymentCollection->status == 1)
        {
            $paymentCollection->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $paymentCollection->update( [               
                'status' => 1                
            ]);
        }
    }
}
