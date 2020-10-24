<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BookingOrder;
use App\PaymentCollection;
use App\MerchantPayment;

use DB;
use PDF;
use MPDF;

class TopSheetController extends Controller
{
	public function index(Request $request)
	{
		// dd($request->all());
		$title = "Top Sheet";
		$searchFormLink = "topSheet.index";
		$printFormLink = "topSheet.print";
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

		// dd($clientType);

		$topSheet = DB::table('view_top_sheet')
			->select(DB::raw('COUNT(orderNo) as orderQty'),DB::raw('SUM(orderValue) as orderValue'),DB::raw('SUM(returnDelivery) AS returnDelivery'),DB::raw('SUM(paymentCollection) as paymentCollection'),DB::raw('SUM(merchantPayment) as merchantPayment'))
			->whereBetween('date',array($fromDate,$toDate))
			->first();

		return view('admin.topSheet.index')->with(compact('title','searchFormLink','printFormLink','print','fromDate','toDate','topSheet'));
	}

	public function print(Request $request)
	{
		// dd($request->all());
		$title = "Collection History";
		$searchFormLink = "topSheet.index";
		$printFormLink = "topSheet.print";
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

		$topSheet = DB::table('view_top_sheet')
			->select(DB::raw('COUNT(orderNo) as orderQty'),DB::raw('SUM(orderValue) as orderValue'),DB::raw('SUM(returnDelivery) AS returnDelivery'),DB::raw('SUM(paymentCollection) as paymentCollection'),DB::raw('SUM(merchantPayment) as merchantPayment'))
			->whereBetween('date',array($fromDate,$toDate))
			->first();

        $pdf = PDF::loadView('admin.topSheet.print',['title'=>$title,'fromDate'=>$fromDate,'toDate'=>$toDate,'print'=>$print,'topSheet'=>$topSheet,[],['orientation'=>'P']]);
        $pdf->stream('top_sheet_'.$fromDate.'_'.$toDate.'.pdf');
	}
}
