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

class OrderListController extends Controller
{
	public function index(Request $request)
	{
		// dd($request->all());
		$title = "Orer List";
		$searchFormLink = "orderList.index";
		$printFormLink = "orderList.print";
		$print = $request->print;

		$deliveryMen = DeliveryMan::where('status',1)->orderBy('name','asc')->get();

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

		$deliveryManId = $request->deliveryManId;

		$orderList = BookingOrder::select('tbl_booking_orders.*','tbl_area.name as deliveryAreaName')
			->leftJoin('tbl_area','tbl_area.id','=','tbl_booking_orders.receiver_area_id')
			->orWhere(function($query) use($fromDate,$toDate,$deliveryManId) {
				if ($fromDate)
				{
					$query->whereBetween('tbl_booking_orders.delivery_date', array($fromDate,$toDate));
				}

				if ($deliveryManId)
				{
					$query->where('tbl_booking_orders.delivery_man_id',$deliveryManId);
				}
			})
			->orderby('date','asc')
			->get();

		// dd($orderList);

		return view('admin.orderList.index')->with(compact('title','searchFormLink','printFormLink','print','fromDate','toDate','deliveryMen','deliveryManId','orderList'));
	}

	public function print(Request $request)
	{
		// dd($request->all());
		$title = "Order List";
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

		$deliveryManId = $request->deliveryManId;

		$deliveryManInfo = DeliveryMan::where('id',$deliveryManId)->first();

        if ($deliveryManInfo->area_id)
        {
            $areasId = explode(',',$deliveryManInfo->area_id);
            $areas = DB::table('tbl_area')->whereIn('id',$areasId)->get();
        }
        else
        {
            $areas = [];
        }
    
        $areaArray = [];
        foreach ($areas as $area)
        {
            array_push($areaArray, $area->name);
        }

        $areaName = implode(', ', $areaArray);

		$orderList = BookingOrder::select('tbl_booking_orders.*','tbl_area.name as deliveryAreaName')
			->leftJoin('tbl_area','tbl_area.id','=','tbl_booking_orders.receiver_area_id')
			->orWhere(function($query) use($fromDate,$toDate,$deliveryManId) {
				if ($fromDate)
				{
					$query->whereBetween('tbl_booking_orders.delivery_date', array($fromDate,$toDate));
				}

				if ($deliveryManId)
				{
					$query->where('tbl_booking_orders.delivery_man_id',$deliveryManId);
				}
			})
			->orderby('date','asc')
			->get();

        $pdf = PDF::loadView('admin.orderList.print',['title'=>$title,'fromDate'=>$fromDate,'toDate'=>$toDate,'print'=>$print,'orderList'=>$orderList,'deliveryManInfo'=>$deliveryManInfo,'areaName'=>$areaName],[],['orientation'=>'L']);
        $pdf->stream('order_list'.$fromDate.'_'.$toDate.'.pdf');
	}
}
