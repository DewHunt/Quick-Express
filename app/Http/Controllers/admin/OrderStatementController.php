<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Marchant;
use App\PaymentCollection;
use App\Service;
use App\BookingOrder;

use DB;
use PDF;
use MPDF;

class OrderStatementController extends Controller
{
	public function index(Request $request)
	{
		// dd($request->all());
		$title = "Order Status";
		$searchFormLink = "orderStatement.index";
		$printFormLink = "orderStatement.print";
		$print = $request->print;

		$clients = DB::table('view_clients')->select('view_clients.*')->orderBy('view_clients.clientType')->get();
		$services = Service::orderBy('name','asc')->get();

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

		$serviceId = $request->serviceId;
		$deliveryStatuses = $request->deliveryStatus;

		// dd($clientType);

		$orderStatements = BookingOrder::select('tbl_booking_orders.*','view_clients.clientName as clientName','tbl_area.name as deliveryAreaName')
			->leftJoin('view_clients', function($joinQuery) {
				$joinQuery->on('tbl_booking_orders.booked_type','=','view_clients.clientType')->on('tbl_booking_orders.sender_id','=','view_clients.clientId');
			})
			->leftJoin('tbl_area','tbl_area.id','=','tbl_booking_orders.sender_area_id')
			->orWhere(function($query) use($fromDate,$toDate,$clientId,$clientType,$serviceId,$deliveryStatuses) {
				if ($fromDate)
				{
					$query->whereBetween('tbl_booking_orders.date', array($fromDate,$toDate));
				}

				if ($clientType)
				{
					$query->whereIn('tbl_booking_orders.booked_type',$clientType)->whereIn('tbl_booking_orders.sender_id',$clientId);
				}

				if ($serviceId)
				{
					$query->whereIn('tbl_booking_orders.courier_type_id',$serviceId);
				}

				if ($deliveryStatuses)
				{
					$previousDeliveryStatus = 0;
					foreach ($deliveryStatuses as $aDeliveryStatus)
					{
						if ($aDeliveryStatus == 1)
						{
							$query->where('tbl_booking_orders.collection_status','=',0)
								->orWhere('tbl_booking_orders.collection_status','=',1)
								->where('tbl_booking_orders.delivery_status','=',0);
							$previousDeliveryStatus = $aDeliveryStatus;
						}
						else if ($aDeliveryStatus == 2)
						{
							if ($previousDeliveryStatus == 1)
							{
								$query->orWhere('tbl_booking_orders.collection_status','=',1)->where('tbl_booking_orders.delivery_status','=',1);
							}
							else
							{
								$query->where('tbl_booking_orders.collection_status','=',1)->where('tbl_booking_orders.delivery_status','=',1);
							}
							
						}
					}
				}
			})
			->orderby('date','asc')
			->get();

		return view('admin.orderStatement.index')->with(compact('title','searchFormLink','printFormLink','print','fromDate','toDate','clients','services','clientId','clientType','serviceId','deliveryStatuses','orderStatements'));
	}

	public function print(Request $request)
	{
		// dd($request->all());
		$title = "Order Status";
		$searchFormLink = "orderStatement.index";
		$printFormLink = "orderStatement.print";
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
        
        $clientId = $request->clientId;
        $clientType = $request->clientType;
        $serviceId = $request->serviceId;
        $deliveryStatuses = $request->deliveryStatus;

		$orderStatements = BookingOrder::select('tbl_booking_orders.*','view_clients.clientName as clientName','tbl_area.name as deliveryAreaName')
			->leftJoin('view_clients', function($joinQuery) {
				$joinQuery->on('tbl_booking_orders.booked_type','=','view_clients.clientType')->on('tbl_booking_orders.sender_id','=','view_clients.clientId');
			})
			->leftJoin('tbl_area','tbl_area.id','=','tbl_booking_orders.sender_area_id')
			->orWhere(function($query) use($fromDate,$toDate,$clientId,$clientType,$serviceId,$deliveryStatuses) {
				if ($fromDate)
				{
					$query->whereBetween('tbl_booking_orders.date', array($fromDate,$toDate));
				}

				if ($clientType)
				{
					$query->whereIn('tbl_booking_orders.booked_type',$clientType)->whereIn('tbl_booking_orders.sender_id',$clientId);
				}

				if ($serviceId)
				{
					$query->whereIn('tbl_booking_orders.courier_type_id',$serviceId);
				}

				if ($deliveryStatuses)
				{
					$previousDeliveryStatus = 0;
					foreach ($deliveryStatuses as $aDeliveryStatus)
					{
						if ($aDeliveryStatus == 1)
						{
							$query->where('tbl_booking_orders.collection_status','=',0)
								->orWhere('tbl_booking_orders.collection_status','=',1)
								->where('tbl_booking_orders.delivery_status','=',0);
							$previousDeliveryStatus = $aDeliveryStatus;
						}
						else if ($aDeliveryStatus == 2)
						{
							if ($previousDeliveryStatus == 1)
							{
								$query->orWhere('tbl_booking_orders.collection_status','=',1)->where('tbl_booking_orders.delivery_status','=',1);
							}
							else
							{
								$query->where('tbl_booking_orders.collection_status','=',1)->where('tbl_booking_orders.delivery_status','=',1);
							}
							
						}
					}
				}
			})
			->orderby('date','asc')
			->get();

        $pdf = PDF::loadView('admin.orderStatement.print',['title'=>$title,'fromDate'=>$fromDate,'toDate'=>$toDate,'print'=>$print,'orderStatements'=>$orderStatements,[],['orientation'=>'P']]);
        $pdf->stream('order_status_'.$fromDate.'_'.$toDate.'.pdf');
	}
}
