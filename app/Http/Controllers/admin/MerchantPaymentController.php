<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BookingOrder;
use App\MerchantPayment;
use App\MerchantPaymentList;
use App\Client;
use App\Marchant;

use DB;

class MerchantPaymentController extends Controller
{
    public function index()
    {
    	$title = "Merchant Payment";

    	$merchantPayments = MerchantPayment::select('tbl_merchant_payment.*','tbl_marchants.name as merchantName')
    		->leftJoin('tbl_marchants','tbl_marchants.id','=','tbl_merchant_payment.merchant_id')
    		->orderBy('tbl_merchant_payment.id','desc')
    		->get();

    	return view('admin.merchantPayment.index')->with(compact('title','merchantPayments'));
    }

    public function add()
    {
    	$title = "Add Merchant Payment";
    	$formLink = "merchantPayment.save";
    	$buttonName = "Save";

    	$merchants = Marchant::orderBy('name','asc')->get();

    	return view('admin.merchantPayment.add')->with(compact('title','formLink','buttonName','merchants'));
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

        $merchantId = $request->merchant;
        $totalCodAmount = $request->totalCodAmount;
        $totalBalance = $request->totalBalance;
        $depositType = $request->depositType;
        $accountNo = $request->accountNo;
        $remarks = $request->remarks;

        $orderNo = $request->orderNo;
        $codAmount = $request->codAmount;
        $deliveryCharge = $request->deliveryCharge;
        $orderId = $request->orderId;
        $balance = $request->balance;

        $merchantPayment = MerchantPayment::create([
            'date' => $paymentDate,
            'merchant_id' => $merchantId,
            'total_cod_amount' => $request->totalCodAmount,
            'total_balance' => $request->totalBalance,
            'deposit_type' => $request->depositType,
            'remarks' => $request->remarks,
            'created_by' => $this->userId,
        ]);

        $countOrderId = count($request->orderId);
        if($request->orderId)
        {
        	for ($i=0; $i < $countOrderId; $i++)
        	{
		        $merchantPaymentList = MerchantPaymentList::create([
		            'merchant_payment_id' => $merchantPayment->id,
		            'booking_order_id' => $request->orderId[$i],
		            'order_no' => $request->orderNo[$i],
		            'cod_amount' => $request->codAmount[$i],
		            'service_charge' => $request->deliveryCharge[$i],
		            'balance' => $request->balance[$i],
		            'created_by' => $this->userId,
		        ]);

		        if ($merchantPaymentList)
		        {
		        	$bookingOrder = BookingOrder::find($merchantPaymentList->booking_order_id);

			        if ($bookingOrder)
			        {
			            $bookingOrder->update( [               
			                'merchant_payment_status' => 1
			            ]);
			        }
		        }
        	}
        }

        return redirect(route('merchantPayment.index'))->with('msg','Payment Collected Successfully');
    }

    public function edit($merchantPaymentId)
    {
        $title = "Edit Merchant Payment";
        $formLink = "merchantPayment.update";
        $buttonName = "Update";

        $merchants = Marchant::orderBy('name','desc')->get();

        $merchantPayment = MerchantPayment::where('id',$merchantPaymentId)->first();

        $merchantPaymentLists = merchantPaymentList::where('merchant_payment_id',$merchantPaymentId)->get();

        $orderInformations = BookingOrder::where('booked_type','Merchant')
        	->where('collection_man_id',$merchantPayment->delivery_man_id)
        	->where('cod_amount','>',0)
            ->where('merchant_payment_status',0)
            ->get();

        // dd($merchantPaymentLists);

        return view('admin.merchantPayment.edit')->with(compact('title','formLink','buttonName','merchants','merchantPayment','merchantPaymentLists','orderInformations','merchantPaymentId'));
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

        $merchantId = $request->merchantId;
        $merchantPaymentId = $request->merchantPaymentId;
        $totalCodAmount = $request->totalCodAmount;
        $totalBalance = $request->totalBalance;
        $depositType = $request->depositType;
        $accountNo = $request->accountNo;
        $remarks = $request->remarks;

        $orderNo = $request->orderNo;
        $codAmount = $request->codAmount;
        $deliveryCharge = $request->deliveryCharge;
        $orderId = $request->orderId;
        $balance = $request->balance;

        $merchantPayment = MerchantPayment::find($merchantPaymentId);

        $merchantPayment->update([
            'date' => $paymentDate,
            'merchant_id' => $merchantId,
            'total_cod_amount' => $request->totalCodAmount,
            'total_balance' => $request->totalBalance,
            'deposit_type' => $request->depositType,
            'remarks' => $request->remarks,
            'created_by' => $this->userId,
        ]);

        $merchantPaymentLists = MerchantPaymentList::where('merchant_payment_id','=',$merchantPaymentId)->get();

        foreach ($merchantPaymentLists as $merchantPaymentList)
        {
	        $bookingOrder = BookingOrder::find($merchantPaymentList->booking_order_id);

	        if ($bookingOrder)
	        {
	            $bookingOrder->update( [               
	                'merchant_payment_status' => 0
	            ]);
	        }
        }

        MerchantPaymentList::where('merchant_payment_id',$merchantPaymentId)->delete();

        $countOrderId = count($request->orderId);
        if($request->orderId)
        {
        	for ($i=0; $i < $countOrderId; $i++)
        	{
		        $merchantPaymentList = MerchantPaymentList::create([
		            'merchant_payment_id' => $merchantPayment->id,
		            'booking_order_id' => $request->orderId[$i],
		            'order_no' => $request->orderNo[$i],
		            'cod_amount' => $request->codAmount[$i],
		            'service_charge' => $request->deliveryCharge[$i],
		            'balance' => $request->balance[$i],
		            'created_by' => $this->userId,
		        ]);

		        if ($merchantPaymentList)
		        {
		        	$bookingOrder = BookingOrder::find($merchantPaymentList->booking_order_id);

			        if ($bookingOrder)
			        {
			            $bookingOrder->update( [               
			                'merchant_payment_status' => 1
			            ]);
			        }
		        }
        	}
        }

        return redirect(route('merchantPayment.index'))->with('msg','Payment Updated Successfully');
    }

    public function view($merchantPaymentId)
    {
    	$title = "Merchant Payment";

    	$merchantPayment = MerchantPayment::select('tbl_merchant_payment.*','tbl_marchants.name as merchantName')
    		->leftJoin('tbl_marchants','tbl_marchants.id','=','tbl_merchant_payment.merchant_id')
    		->where('tbl_merchant_payment.id',$merchantPaymentId)
    		->first();

    	$merchantPaymentLists = MerchantPaymentList::where('merchant_payment_id',$merchantPaymentId)->get();

    	// dd($paymentCollection);

    	return view('admin.merchantPayment.view')->with(compact('title','merchantPayment','merchantPaymentLists'));
    }

    public function getOrderInfo(Request $request)
    {
        $merchant = $request->merchant;
        
        $orderInformations = BookingOrder::where('booked_type','Merchant')
        	->where('sender_id',$merchant)
        	->where('cod_amount','>',0)
        	->where('merchant_payment_status','=','0')
        	->get();

        // dd($orderInformations);
        
        if($request->ajax())
        {
            return response()->json([
                'orderInformations' => $orderInformations,
            ]);
        }
    }

    public function status(Request $request)
    {
        $MerchantPayment = MerchantPayment::find($request->merchantPaymentId);

        if ($MerchantPayment->status == 1)
        {
            $MerchantPayment->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $MerchantPayment->update( [               
                'status' => 1                
            ]);
        }
    }

    public function delete(Request $request)
    {
    	$merchantPaymentLists = MerchantPaymentList::where('merchant_payment_id',$request->merchantPaymentId)->get();

    	foreach ($merchantPaymentLists as $merchantPaymentList)
    	{
	        $bookingOrder = BookingOrder::find($merchantPaymentList->booking_order_id);

	        if ($bookingOrder)
	        {
	            $bookingOrder->update( [               
	                'merchant_payment_status' => 0                
	            ]);
	        }
    	}

    	MerchantPaymentList::where('merchant_payment_id',$request->merchantPaymentId)->delete();

    	MerchantPayment::where('id',$request->merchantPaymentId)->delete();
    }
}
