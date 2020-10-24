<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Marchant;
use App\PaymentCollection;

use DB;
use PDF;
use MPDF;

class MerchantStatementController extends Controller
{
	public function index(Request $request)
	{
		// dd($request->all());
		$title = "Maerchant Statement";
		$searchFormLink = "merchantStatement.index";
		$printFormLink = "merchantStatement.print";
        $print = $request->print;

        $merchants = Marchant::orderby('name','asc')->get();

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

        $merchant = $request->merchant;

        $lastDate = Date('Y-m-d',strtotime("-1 day", strtotime($fromDate)));

        $previousBalances = DB::table('view_merchant_statement')
            ->select(DB::raw('SUM(bookingDeliveryCharge) as bookingDeliveryCharge'), DB::raw('SUM(paymentDeliveryCharge) as paymentDeliveryCharge'))
            ->orWhere(function($query) use($lastDate,$merchant){
                if (!empty($lastDate))
                {
                    $query->where('date','<=', $lastDate);
                }

                if ($merchant)
                {
                    $query->where('clientId',$merchant);
                }
            })
            ->first();

        $merchantStatements = DB::table('view_merchant_statement')
        	->orWhere(function($query) use($fromDate,$toDate,$merchant) {
        		if ($fromDate)
        		{
        			$query->whereBetween('view_merchant_statement.date', array($fromDate,$toDate));
        		}
        		
        		if ($merchant)
        		{
        			$query->where('view_merchant_statement.clientId',$merchant);
        		}
        	})
        	->where('view_merchant_statement.clientType','=','Merchant')
        	->orderby('date','asc')
        	->get();

		return view('admin.merchantStatement.index')->with(compact('title','searchFormLink','printFormLink','print','fromDate','toDate','merchants','merchant','previousBalances','merchantStatements'));
	}

	public function print(Request $request)
	{
		// dd($request->all());
		$title = "Merchant Statement";
		$searchFormLink = "merchantStatement.index";
		$printFormLink = "merchantStatement.print";
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

        $merchant = $request->merchant;

        $lastDate = Date('Y-m-d',strtotime("-1 day", strtotime($fromDate)));

        $previousBalances = DB::table('view_merchant_statement')
            ->select(DB::raw('SUM(bookingDeliveryCharge) as bookingDeliveryCharge'), DB::raw('SUM(paymentDeliveryCharge) as paymentDeliveryCharge'))
            ->orWhere(function($query) use($lastDate,$merchant){
                if (!empty($lastDate))
                {
                    $query->where('date','<=', $lastDate);
                }

                if ($merchant)
                {
                    $query->where('clientId',$merchant);
                }
            })
            ->first();

        $merchantStatements = DB::table('view_merchant_statement')
            ->orWhere(function($query) use($fromDate,$toDate,$merchant) {
                if ($fromDate)
                {
                    $query->whereBetween('view_merchant_statement.date', array($fromDate,$toDate));
                }
                
                if ($merchant)
                {
                    $query->where('view_merchant_statement.clientId',$merchant);
                }
            })
            ->where('view_merchant_statement.clientType','=','Merchant')
            ->orderby('date','asc')
            ->get();

        $pdf = PDF::loadView('admin.merchantStatement.print',['title'=>$title,'fromDate'=>$fromDate,'toDate'=>$toDate,'print'=>$print,'merchantStatements'=>$merchantStatements,'previousBalances'=>$previousBalances],[],['orientation'=>'P']);
        $pdf->stream('merchant_statement_'.$fromDate.'_'.$toDate.'.pdf');
	}
}
