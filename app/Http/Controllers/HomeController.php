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

        if ($userRole == 2 || $userRole == 3)
        {   $title = "Dashboard";

            $new_order_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->whereNull('order_status')
            ->orderBy('id','desc')
            ->get();

            $running_order_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('order_status','On Going')
            // ->where('delivery_status',0)
            ->orderBy('id','desc')
            ->get();

            $complete_order_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('order_status','Delivered')
            // ->where('delivery_status',1)
            ->orderBy('id','desc')
            ->get();

            $total_amount = BookingOrder::select('tbl_booking_orders.*')
                            ->sum('delivery_charge');
            
            return view('admin.index.index')->with(compact('title','new_order_list','running_order_list','complete_order_list','total_amount'));
        }
        /*elseif ($userRole == 3)
        {
            // return view('admin.index.agent')->with(compact('title'));
        }*/
        elseif ($userRole == 4)
        {
            # code...
        }
        elseif ($userRole == 8)
        {
            $title = "Agent Dashboard";
            
            $new_order_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName','tbl_agents.user_id')
            ->join('tbl_agents','tbl_booking_orders.sender_zone_id','=','tbl_agents.id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('collection_status',0)
            ->Where('tbl_agents.user_id',\Auth::user()->id)
            ->orderBy('id','desc')
            ->get();

            $running_order_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName','tbl_agents.user_id')
            ->join('tbl_agents','tbl_booking_orders.sender_zone_id','=','tbl_agents.id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('collection_status',1)
            ->where('delivery_status',0)
            ->Where('tbl_agents.user_id',\Auth::user()->id)
            ->orderBy('id','desc')
            ->get();

            $complete_order_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName','tbl_agents.user_id')
            ->join('tbl_agents','tbl_booking_orders.sender_zone_id','=','tbl_agents.id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('collection_status',1)
            ->where('delivery_status',1)
            ->Where('tbl_agents.user_id',\Auth::user()->id)
            ->orderBy('id','desc')
            ->get();

            $total_amount = BookingOrder::select('tbl_booking_orders.*','tbl_agents.user_id')
                            ->join('tbl_agents','tbl_booking_orders.sender_zone_id','=','tbl_agents.id')
                            ->Where('tbl_agents.user_id',\Auth::user()->id)
                            ->sum('delivery_charge');
            
            return view('admin.index.agent')->with(compact('title','new_order_list','running_order_list','complete_order_list','total_amount'));
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
            ->orderBy('id','desc')
            ->get();

            $running_order_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName','tbl_marchants.user_id')
            ->join('tbl_marchants','tbl_booking_orders.sender_id','=','tbl_marchants.id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('collection_status',1)
            ->where('delivery_status',0)
            ->where('booked_type','Merchant')
            ->Where('tbl_marchants.user_id',\Auth::user()->id)
            ->orderBy('id','desc')
            ->get();

            $complete_order_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName','tbl_marchants.user_id')
            ->join('tbl_marchants','tbl_booking_orders.sender_id','=','tbl_marchants.id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('collection_status',1)
            ->where('delivery_status',1)
            ->where('booked_type','Merchant')
            ->Where('tbl_marchants.user_id',\Auth::user()->id)
            ->orderBy('id','desc')
            ->get();

            $total_amount = BookingOrder::select('tbl_booking_orders.*','tbl_marchants.user_id')
                            ->join('tbl_marchants','tbl_booking_orders.sender_id','=','tbl_marchants.id')
                            ->where('booked_type','Merchant')
                            ->Where('tbl_marchants.user_id',\Auth::user()->id)
                            ->sum('delivery_charge');
            
            return view('admin.index.marchant')->with(compact('title','new_order_list','running_order_list','complete_order_list','total_amount'));
        }
        elseif ($userRole == 14)
        {
            $title = "Delivery Man Dashboard";

            $new_collection_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName','tbl_delivery_men.user_id')
            ->join('tbl_delivery_men','tbl_booking_orders.collection_man_id','=','tbl_delivery_men.id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('collection_status',0)
            ->where('tbl_booking_orders.collection_man_id','!=',NULL)
            ->Where('tbl_delivery_men.user_id',\Auth::user()->id)
            ->orderBy('id','desc')
            ->get();

            $new_delivery_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName','tbl_delivery_men.user_id')
            ->join('tbl_delivery_men','tbl_booking_orders.delivery_man_id','=','tbl_delivery_men.id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('delivery_status',0)
            ->where('tbl_booking_orders.delivery_man_id','!=',NULL)
            ->Where('tbl_delivery_men.user_id',\Auth::user()->id)
            ->orderBy('id','desc')
            ->get();

            $complete_collection_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName','tbl_delivery_men.user_id')
            ->join('tbl_delivery_men','tbl_booking_orders.collection_man_id','=','tbl_delivery_men.id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('collection_status',1)
            ->Where('tbl_delivery_men.user_id',\Auth::user()->id)
            ->orderBy('id','desc')
            ->get();

            $complete_delivery_list = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_types.name as deliveryTypeName','tbl_delivery_men.user_id')
            ->join('tbl_delivery_men','tbl_booking_orders.collection_man_id','=','tbl_delivery_men.id')
            ->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_type_id')
            ->where('delivery_status',1)
            ->Where('tbl_delivery_men.user_id',\Auth::user()->id)
            ->orderBy('id','desc')
            ->get();

            $received_collection_amount = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_men.user_id')
                            ->join('tbl_delivery_men','tbl_booking_orders.collection_man_id','=','tbl_delivery_men.id')
                            ->Where('tbl_delivery_men.user_id',\Auth::user()->id)
                            ->where('tbl_booking_orders.collection_payment_status',1)
                            ->sum('delivery_charge');

            $received_delivery_amount = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_men.user_id')
                            ->join('tbl_delivery_men','tbl_booking_orders.collection_man_id','=','tbl_delivery_men.id')
                            ->Where('tbl_delivery_men.user_id',\Auth::user()->id)
                            ->where('tbl_booking_orders.delivery_payment_status',1)
                            ->sum('delivery_charge');

            $due_collection_amount = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_men.user_id')
                            ->join('tbl_delivery_men','tbl_booking_orders.collection_man_id','=','tbl_delivery_men.id')
                            ->Where('tbl_delivery_men.user_id',\Auth::user()->id)
                            ->where('tbl_booking_orders.collection_payment_status',0)
                            ->sum('delivery_charge');

            $due_delivery_amount = BookingOrder::select('tbl_booking_orders.*','tbl_delivery_men.user_id')
                            ->join('tbl_delivery_men','tbl_booking_orders.collection_man_id','=','tbl_delivery_men.id')
                            ->Where('tbl_delivery_men.user_id',\Auth::user()->id)
                            ->where('tbl_booking_orders.delivery_payment_status',0)
                            ->sum('delivery_charge');
            
            return view('admin.index.deliveryMan')->with(compact('title','new_collection_list','new_delivery_list','complete_collection_list','complete_delivery_list','received_collection_amount','received_delivery_amount','due_collection_amount','due_delivery_amount'));
        }
        // return view('home');
    }

}
