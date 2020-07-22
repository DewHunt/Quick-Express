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
    		// ->leftJoin('view_clients','view_clients.id','=','tbl_payment_collections.delivery_type_id')
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

        $clients = explode(',',$request->client);
        $clientId = $clients[0];
        $clientType = $clients[1];

        $paymentCollection = PaymentCollection::create([
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
		            'delivery_chargee' => $request->deliveryCharge[$i],
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
}
