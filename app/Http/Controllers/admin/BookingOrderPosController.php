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

class BookingOrderPosController extends Controller
{
	public function index(Request $request)
	{
		// dd($request->all());
		$title = "Booking Order POS";
		$searchFormLink = "bookingOrderPos.index";
		$printFormLink = "bookingOrderPos.print";
		$print = $request->print;

		$clients = DB::table('view_clients')->select('view_clients.*')->orderBy('view_clients.clientType')->get();

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

		// echo $toDate; exit();

		if ($request->client)
		{
			foreach ($request->client as $aClient)
			{
				$aClients = explode(',',$aClient);
				$clientId[] = $aClients[0];
				$clientType[] = $aClients[1];
			}
		}
		else
		{
			$clientId = "";
			$clientType = "";
		}

		$bookingOrderPos = BookingOrder::select('tbl_booking_orders.*','view_clients.clientName as clientName','tbl_area.name as deliveryAreaName')
			->leftJoin('view_clients', function($joinQuery) {
				$joinQuery->on('tbl_booking_orders.booked_type','=','view_clients.clientType')->on('tbl_booking_orders.sender_id','=','view_clients.clientId');
			})
			->leftJoin('tbl_area','tbl_area.id','=','tbl_booking_orders.receiver_area_id')
			->orWhere(function($query) use($fromDate,$toDate,$clientId,$clientType) {
				if ($fromDate)
				{
					$query->whereBetween('tbl_booking_orders.delivery_date', array($fromDate,$toDate));
				}

				if ($clientType)
				{
					$query->whereIn('tbl_booking_orders.booked_type',$clientType)->whereIn('tbl_booking_orders.sender_id',$clientId);
				}
			})
			->orderby('date','asc')
			->get();

		// dd($bookingOrderPos);

		return view('admin.bookingOrderPos.index')->with(compact('title','searchFormLink','printFormLink','print','fromDate','toDate','clients','clientId','clientType','bookingOrderPos'));
	}

	public function print(Request $request)
	{
		// dd($request->all());
		// dd($request->all());
		$title = "Booking Order POS";
		$searchFormLink = "bookingOrderPos.index";
		$printFormLink = "bookingOrderPos.print";
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

		// echo $toDate; exit();

		if ($request->client)
		{
			foreach ($request->client as $aClient)
			{
				$aClients = explode(',',$aClient);
				$clientId[] = $aClients[0];
				$clientType[] = $aClients[1];
			}
		}
		else
		{
			$clientId = "";
			$clientType = "";
		}

		$WebsiteInformation = WebsiteInformation::first();

		$bookingOrderPos = BookingOrder::select('tbl_booking_orders.*','view_clients.clientName as clientName','tbl_area.name as deliveryAreaName')
			->leftJoin('view_clients', function($joinQuery) {
				$joinQuery->on('tbl_booking_orders.booked_type','=','view_clients.clientType')->on('tbl_booking_orders.sender_id','=','view_clients.clientId');
			})
			->leftJoin('tbl_area','tbl_area.id','=','tbl_booking_orders.receiver_area_id')
			->orWhere(function($query) use($fromDate,$toDate,$clientId,$clientType) {
				if ($fromDate)
				{
					$query->whereBetween('tbl_booking_orders.delivery_date', array($fromDate,$toDate));
				}

				if ($clientType)
				{
					$query->whereIn('tbl_booking_orders.booked_type',$clientType)->whereIn('tbl_booking_orders.sender_id',$clientId);
				}
			})
			->orderby('date','asc')
			->get();

        $pdf = PDF::loadView('admin.bookingOrderPos.print',['title'=>$title,'fromDate'=>$fromDate,'toDate'=>$toDate,'print'=>$print,'bookingOrderPos'=>$bookingOrderPos,'WebsiteInformation'=>$WebsiteInformation,[],['orientation'=>'P']]);
        $pdf->stream('pos_'.$fromDate.'_'.$toDate.'.pdf');
	}
}
