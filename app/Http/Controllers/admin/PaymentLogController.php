<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Marchant;
use App\MerchantPayment;
use App\MerchantPaymentList;

use DB;
use PDF;
use MPDF;

class PaymentLogController extends Controller
{
	public function index(Request $request)
	{
		// dd($request->all());
		$title = "Payment Log";
		$searchFormLink = "paymentLog.index";
		$printFormLink = "paymentLog.print";
		$print = $request->print;

		$merchants = Marchant::orderBy('name','asc')->get();

		if ($request->fromDate)
		{
			$fromDate = date('Y-m-d',strtotime($request->fromDate));
		}
		else
		{
			$fromDate = "";
		}

		if ($request->toDate)
		{
			$toDate = date('Y-m-d',strtotime($request->toDate));
		}
		else
		{
			$toDate = "";
		}

		$merchantId = $request->merchant;
		$depositType = $request->depositType;

		// dd($clientType);

		$paymentLogs = MerchantPayment::select('tbl_merchant_payment.*','tbl_marchants.name as merchantName')
			->leftjoin('tbl_marchants','tbl_marchants.id','=','tbl_merchant_payment.merchant_id')
			->orWhere(function($query) use($fromDate,$toDate,$merchantId,$depositType) {
				if ($fromDate)
				{
					$query->whereBetween('tbl_merchant_payment.date', array($fromDate,$toDate));
				}

				if ($merchantId)
				{
					$query->whereIn('tbl_merchant_payment.merchant_id',$merchantId);
				}

				if ($depositType)
				{
					$query->whereIn('tbl_merchant_payment.deposit_type',$depositType);
				}
			})
			->orderby('date','asc')
			->get();

		return view('admin.paymentLog.index')->with(compact('title','searchFormLink','printFormLink','print','fromDate','toDate','merchants','merchantId','depositType','paymentLogs'));
	}

	public function print(Request $request)
	{
		// dd($request->all());
		$title = "Payment Log";
		$searchFormLink = "paymentLog.index";
		$printFormLink = "paymentLog.print";
        $print = $request->print;

		if ($request->fromDate)
		{
			$fromDate = date('Y-m-d',strtotime($request->fromDate));
		}
		else
		{
			$fromDate = "";
		}

		if ($request->toDate)
		{
			$toDate = date('Y-m-d',strtotime($request->toDate));
		}
		else
		{
			$toDate = "";
		}

		$merchantId = $request->merchant;
		$depositType = $request->depositType;

		$paymentLogs = MerchantPayment::select('tbl_merchant_payment.*','tbl_marchants.name as merchantName')
			->leftjoin('tbl_marchants','tbl_marchants.id','=','tbl_merchant_payment.merchant_id')
			->orWhere(function($query) use($fromDate,$toDate,$merchantId,$depositType) {
				if ($fromDate)
				{
					$query->whereBetween('tbl_merchant_payment.date', array($fromDate,$toDate));
				}

				if ($merchantId)
				{
					$query->whereIn('tbl_merchant_payment.merchant_id',$merchantId);
				}

				if ($depositType)
				{
					$query->whereIn('tbl_merchant_payment.deposit_type',$depositType);
				}
			})
			->orderby('date','asc')
			->get();

        $pdf = PDF::loadView('admin.paymentLog.print',['title'=>$title,'fromDate'=>$fromDate,'toDate'=>$toDate,'print'=>$print,'paymentLogs'=>$paymentLogs,[],['orientation'=>'P']]);
        $pdf->stream('payment_log_'.$fromDate.'_'.$toDate.'.pdf');
	}
}
