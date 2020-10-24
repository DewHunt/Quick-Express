<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Marchant;
use App\PaymentCollection;
use App\PaymentCollectionList;

use DB;
use PDF;
use MPDF;

class CollectionHistoryController extends Controller
{
	public function index(Request $request)
	{
		// dd($request->all());
		$title = "Collection History";
		$searchFormLink = "collectionHistory.index";
		$printFormLink = "collectionHistory.print";
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

		// dd($clientType);

		$collectionHistories = PaymentCollectionList::select('tbl_payment_collection_lists.*','tbl_payment_collections.date as paymentDate','view_clients.clientType as clientType','view_clients.clientName as clientName')
			->leftJoin('tbl_payment_collections','tbl_payment_collections.id','=','tbl_payment_collection_lists.payment_collection_id')
			->leftJoin('view_clients', function($joinQuery) {
				$joinQuery->on('tbl_payment_collections.client_type','=','view_clients.clientType')
					->on('tbl_payment_collections.client_id','=','view_clients.clientId');
			})
			->orWhere(function($query) use($fromDate,$toDate,$clientType,$clientId) {
				if ($fromDate)
				{
					$query->whereBetween('tbl_payment_collections.date', array($fromDate,$toDate));
				}

				if ($clientType)
				{
					$query->whereIn('tbl_payment_collections.client_type',$clientType);
				}

				if ($clientId)
				{
					$query->whereIn('tbl_payment_collections.client_id',$clientId);
				}
			})
			->orderby('tbl_payment_collections.date','asc')
			->get();

		return view('admin.collectionHistory.index')->with(compact('title','searchFormLink','printFormLink','print','fromDate','toDate','clients','clientId','clientType','collectionHistories'));
	}

	public function print(Request $request)
	{
		// dd($request->all());
		$title = "Collection History";
		$searchFormLink = "collectionHistory.index";
		$printFormLink = "collectionHistory.print";
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

		$collectionHistories = PaymentCollectionList::select('tbl_payment_collection_lists.*','tbl_payment_collections.date as paymentDate','view_clients.clientType as clientType','view_clients.clientName as clientName')
			->leftJoin('tbl_payment_collections','tbl_payment_collections.id','=','tbl_payment_collection_lists.payment_collection_id')
			->leftJoin('view_clients', function($joinQuery) {
				$joinQuery->on('tbl_payment_collections.client_type','=','view_clients.clientType')
					->on('tbl_payment_collections.client_id','=','view_clients.clientId');
			})
			->orWhere(function($query) use($fromDate,$toDate,$clientType,$clientId) {
				if ($fromDate)
				{
					$query->whereBetween('tbl_payment_collections.date', array($fromDate,$toDate));
				}

				if ($clientType)
				{
					$query->whereIn('tbl_payment_collections.client_type',$clientType);
				}

				if ($clientId)
				{
					$query->whereIn('tbl_payment_collections.client_id',$clientId);
				}
			})
			->orderby('tbl_payment_collections.date','asc')
			->get();

        $pdf = PDF::loadView('admin.collectionHistory.print',['title'=>$title,'fromDate'=>$fromDate,'toDate'=>$toDate,'print'=>$print,'collectionHistories'=>$collectionHistories,[],['orientation'=>'P']]);
        $pdf->stream('collection_history_'.$fromDate.'_'.$toDate.'.pdf');
	}
}
