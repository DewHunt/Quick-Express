<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agent;
use App\Subagent;
use App\Warehouse;
use App\Marchant;
use App\Client;
use App\BookingOrder;

use Auth;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $title = "Web Site CMS Dashboard";
        $userId = Auth::user()->id;
        $userRole = Auth::user()->role;

        if ($userRole == 2)
        {
            return view('admin.index.index')->with(compact('title'));
        }
        elseif ($userRole == 3)
        {
            // return view('admin.index.agent')->with(compact('title'));
        }
        elseif ($userRole == 4)
        {
            # code...
        }
        elseif ($userRole == 8)
        {
            $title = "Agent Dashboard";
            
            return view('admin.index.agent')->with(compact('title'));
        }
        elseif ($userRole == 10)
        {
            $title = "Subagent Dashboard";
            
            return view('admin.index.subagent')->with(compact('title'));
        }
        elseif ($userRole == 11)
        {
            $title = "Warehouse Dashboard";
            
            return view('admin.index.warehouse')->with(compact('title'));
        }
        elseif ($userRole == 12)
        {   
            $title = "Marchant Dashboard";

            $new_order_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName','tbl_marchants.user_id')
            ->join('tbl_marchants','tbl_booking_orders.sender_id','=','tbl_marchants.id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('collection_status',0)
            ->where('booked_type','Merchant')
            ->Where('tbl_marchants.user_id',\Auth::user()->id)
            ->Where('booked_type','Merchant')
            ->orderBy('id','desc')
            ->get();

            $running_order_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName','tbl_marchants.user_id')
            ->join('tbl_marchants','tbl_booking_orders.sender_id','=','tbl_marchants.id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('collection_status',1)
            ->where('delivery_status',0)
            ->where('booked_type','Merchant')
            ->Where('tbl_marchants.user_id',\Auth::user()->id)
            ->Where('booked_type','Merchant')
            ->orderBy('id','desc')
            ->get();

            $complete_order_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName','tbl_marchants.user_id')
            ->join('tbl_marchants','tbl_booking_orders.sender_id','=','tbl_marchants.id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('collection_status',1)
            ->where('delivery_status',1)
            ->where('booked_type','Merchant')
            ->Where('tbl_marchants.user_id',\Auth::user()->id)
            ->Where('booked_type','Merchant')
            ->orderBy('id','desc')
            ->get();
            
            return view('admin.index.marchant')->with(compact('title','new_order_list','running_order_list','complete_order_list'));
        }
        elseif ($userRole == 14)
        {
            $title = "Delivery Man Dashboard";
            
            return view('admin.index.deliveryMan')->with(compact('title'));
        }
        // return view('home');
    }

    public function message_md()
    {
        return view('admin.settings.message_md');
    }

    public function message_md_ajax(Request $request)
    {
        \App\helperClass::_writeNammedFile($request->message, 'message_md.txt');

        return redirect(route('settings.message_md'))->with('message', 'updated successfully');
    }
}
