<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BookingOrder;
use App\HubSetup;
use App\AreaSetup;
use App\DeliveryMan;
use App\WebsiteInformation;

use DB;
use PDF;
use MPDF;

class OrderStatusListController extends Controller
{
	public function index(Request $request)
	{
		// dd($request->all());
		$title = "Orer List";
		$searchFormLink = "orderStatusList.index";
		$printFormLink = "orderStatusList.print";
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

		$orderStatus = $request->orderStatus;

		$orderList = BookingOrder::select('tbl_booking_orders.*','tbl_area.name as deliveryAreaName','tbl_delivery_men.name as deliveryManName')
			->leftJoin('tbl_area','tbl_area.id','=','tbl_booking_orders.receiver_area_id')
			->leftJoin('tbl_delivery_men','tbl_delivery_men.id','=','tbl_booking_orders.delivery_man_id')
			->orWhere(function($query) use($fromDate,$toDate,$orderStatus) {
				if ($fromDate)
				{
					$query->whereBetween('tbl_booking_orders.delivery_date', array($fromDate,$toDate));
				}

				if ($orderStatus == "NULL")
				{
					$query->whereNull('tbl_booking_orders.order_status');
				}
				else
				{
					$query->where('tbl_booking_orders.order_status',$orderStatus);
				}
			})
			->orderby('date','asc')
			->get();

		// dd($orderList);

		return view('admin.orderStatusList.index')->with(compact('title','searchFormLink','printFormLink','print','fromDate','toDate','orderStatus','orderList'));
	}

	public function print(Request $request)
	{
		// dd($request->all());
		$title = "Orer List";
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

		$orderStatus = $request->orderStatus;

		$orderList = BookingOrder::select('tbl_booking_orders.*','tbl_area.name as deliveryAreaName','tbl_delivery_men.name as deliveryManName')
			->leftJoin('tbl_area','tbl_area.id','=','tbl_booking_orders.receiver_area_id')
			->leftJoin('tbl_delivery_men','tbl_delivery_men.id','=','tbl_booking_orders.delivery_man_id')
			->orWhere(function($query) use($fromDate,$toDate,$orderStatus) {
				if ($fromDate)
				{
					$query->whereBetween('tbl_booking_orders.delivery_date', array($fromDate,$toDate));
				}

				if ($orderStatus == "NULL")
				{
					$query->whereNull('tbl_booking_orders.order_status');
				}
				else
				{
					$query->where('tbl_booking_orders.order_status',$orderStatus);
				}
			})
			->orderby('date','asc')
			->get();

        $pdf = PDF::loadView('admin.orderStatusList.print',['title'=>$title,'fromDate'=>$fromDate,'toDate'=>$toDate,'print'=>$print,'orderList'=>$orderList],[],['orientation'=>'L']);
        $pdf->stream('order_status_list'.$fromDate.'_'.$toDate.'.pdf');
	}
}
