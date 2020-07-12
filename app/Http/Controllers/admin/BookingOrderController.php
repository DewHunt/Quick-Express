<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BookingOrder;
use App\Agent;
use App\Subagent;
use App\Warehouse;
use App\Service;
use App\ServiceType;
use App\Client;
use App\Marchant;
use App\Admin;
use App\UserRoles;
use App\ChargeForClient;
use App\ChargeForMerchant;
use App\DeliveryType;

use DB;

class BookingOrderController extends Controller
{
    public function index()
    {
    	$title = "Booking Order Setup";

    	$bookingOrders = BookingOrder::select('tbl_booking_orders.*','tbl_service_types.name as deliveryTypeName')
    		->leftJoin('tbl_service_types','tbl_service_types.id','=','tbl_booking_orders.delivery_type_id')
    		->orderBy('id','desc')
    		->get();

    	return view('admin.bookingOrder.index')->with(compact('title','bookingOrders'));
    }

    public function add()
    {
    	$title = "Add Booking Order";
    	$formLink = "bookingOrder.save";
    	$buttonName = "Save";

    	$services = Service::orderBy('name','asc')->get();
    	$serviceTypes = ServiceType::orderBy('name','asc')->get();
        $deliveryTypes = DeliveryType::orderBy('name','asc')->get();

    	$zones = DB::table('view_zones')->select('view_zones.*')->orderBy('view_zones.zone_type')->get();

        $toDayDate = date("Y-m-d");
        $orderPrefix = "co-".date('ymd')."-";

        $maxOrderNo = BookingOrder::where('date',$toDayDate)->where('booked_type','Client')->max('order_no');

        if ($maxOrderNo)
        {
            $maxOrderNo = substr($maxOrderNo, strlen($orderPrefix));
            $orderNo = $orderPrefix.str_pad($maxOrderNo + 1, 5, '0', STR_PAD_LEFT);
        }
        else
        {
            $orderNo = $orderPrefix."00001";
        }

        // echo $orderNo; exit();

    	return view('admin.bookingOrder.add')->with(compact('title','formLink','buttonName','services','serviceTypes','zones','orderNo','deliveryTypes'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        if ($request->bookingDate)
        {
            $bookingDate = date('Y-m-d',strtotime($request->bookingDate));
        }
        else
        {
            $bookingDate = "";
        }

        $senderZone = explode(',',$request->senderZone);
        $senderZoneId = $senderZone[0];
        $senderZoneType = $senderZone[1];

        $receiverZone = explode(',',$request->receiverZone);
        $receiverZoneId = $receiverZone[0];
        $receiverZoneType = $receiverZone[1];

        if ($request->clientId)
        {
            $senderId = $request->clientId;
        }
        else
        {
            if ($request->senderType == "Client")
            {            
                $client = Client::create([
                    'user_role_id' => 4,
                    'name' => $request->senderName,
                    'phone' => $request->senderPhoneNumber,
                    'address' => $request->address,
                    'password' => bcrypt('123456'),
                    'created_by' => $this->userId,
                ]);
            }
            else
            {
                $user = Admin::create( [           
                    'role' => 12,     
                    'name' => $request->senderName,
                    'phone' => $request->senderPhoneNumber,
                    'password' => bcrypt('123456'),                      
                ]);

                $client = Marchant::create([
                    'user_id' => $user->id,
                    'user_role_id' => 12,
                    'name' => $request->senderName,
                    'contact_person_phone' => $request->senderPhoneNumber,
                    'address' => $request->address,
                    'created_by' => $this->userId,
                ]);
            }

            $senderId = $client->id;
        }        

        BookingOrder::create([
            'order_no' => $request->orderNo,
            'date' => $bookingDate,
            'booked_type' => $request->senderType,
            'sender_id' => $senderId,
            'sender_name' => $request->senderName,
            'sender_phone' => $request->senderPhoneNumber,
            'sender_zone_type' => $senderZoneType,
            'sender_zone_id' => $senderZoneId,
            'sender_address' => $request->senderAddress,
            'receiver_name' => $request->receiverName,
            'receiver_phone' => $request->receiverPhoneNumber,
            'receiver_zone_type' => $receiverZoneType,
            'receiver_zone_id' => $receiverZoneId,
            'receiver_address' => $request->receiverAddress,
            'remarks' => $request->remarks,
            'courier_type_id' => $request->serviceId,
            'delivery_type_id' => $request->serviceTypeId,
            'charge_name' => $request->chargeName,
            'delivery_charge_unit' => $request->deliveryChargeUnit,
            'uom' => $request->uom,
            'delivery_charge' => $request->deliveryCharge,
            'cod' => $request->cod,
            'delivery_duration_id' => $request->deliveryTypeId,
            'created_by' => $this->userId,
        ]);

        return redirect(route('bookingOrder.index'))->with('msg','Order Booked Successfully');
    }

    public function edit($bookedOrderId)
    {
    	$title = "Edit Booked Order";
    	$formLink = "bookingOrder.update";
    	$buttonName = "Update";

        $services = Service::orderBy('name','asc')->get();
        $serviceTypes = ServiceType::orderBy('name','asc')->get();
        $deliveryTypes = DeliveryType::orderBy('name','asc')->get();

        $zones = DB::table('view_zones')->select('view_zones.*')->orderBy('view_zones.zone_type')->get();

        $toDayDate = date("Y-m-d");
        $orderPrefix = "co-".date('ymd')."-";

        $maxOrderNo = BookingOrder::where('date',$toDayDate)->where('booked_type','Client')->max('order_no');

        if ($maxOrderNo)
        {
            $maxOrderNo = substr($maxOrderNo, strlen($orderPrefix));
            $orderNo = $orderPrefix.str_pad($maxOrderNo + 1, 5, '0', STR_PAD_LEFT);
        }
        else
        {
            $orderNo = $orderPrefix."00001";
        }

        $bookedOrder = BookingOrder::where('id',$bookedOrderId)->first();

    	return view('admin.bookingOrder.edit')->with(compact('title','formLink','buttonName','bookedOrder','services','serviceTypes','zones','orderNo','deliveryTypes'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

        if ($request->bookingDate)
        {
            $bookingDate = date('Y-m-d',strtotime($request->bookingDate));
        }
        else
        {
            $bookingDate = "";
        }

        $senderZone = explode(',',$request->senderZone);
        $senderZoneId = $senderZone[0];
        $senderZoneType = $senderZone[1];

        $receiverZone = explode(',',$request->receiverZone);
        $receiverZoneId = $receiverZone[0];
        $receiverZoneType = $receiverZone[1];

        $bookedOrder = BookingOrder::find($request->bookedOrderId);

        $bookedOrder->update([
            'order_no' => $request->orderNo,
            'date' => $bookingDate,
            'booked_type' => $request->senderType,
            'sender_id' => $request->clientId,
            'sender_name' => $request->senderName,
            'sender_phone' => $request->senderPhoneNumber,
            'sender_zone_type' => $senderZoneType,
            'sender_zone_id' => $senderZoneId,
            'sender_address' => $request->senderAddress,
            'receiver_name' => $request->receiverName,
            'receiver_phone' => $request->receiverPhoneNumber,
            'receiver_zone_type' => $receiverZoneType,
            'receiver_zone_id' => $receiverZoneId,
            'receiver_address' => $request->receiverAddress,
            'remarks' => $request->remarks,
            'courier_type_id' => $request->serviceId,
            'delivery_type_id' => $request->serviceTypeId,
            'charge_name' => $request->chargeName,
            'delivery_charge_unit' => $request->deliveryChargeUnit,
            'uom' => $request->uom,
            'delivery_charge' => $request->deliveryCharge,
            'cod' => $request->cod,
            'delivery_duration_id' => $request->deliveryTypeId,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('bookingOrder.index'))->with('msg','Booked Order Updated Successfully');
    }

    public function view($bookedOrderId)
    {
    	$title = "View Booked Order";

    	$bookedOrder = BookingOrder::select('tbl_booking_orders.*','tbl_services.name as serviceName','tbl_service_types.name as serviceTypeName','tbl_delivery_types.name as deliveryTypeName')
    		->leftJoin('tbl_services','tbl_services.id','=','tbl_booking_orders.courier_type_id')
            ->leftJoin('tbl_service_types','tbl_service_types.id','=','tbl_booking_orders.delivery_type_id')
    		->leftJoin('tbl_delivery_types','tbl_delivery_types.id','=','tbl_booking_orders.delivery_duration_id')
    		->where('tbl_booking_orders.id',$bookedOrderId)
    		->orderBy('id','desc')
    		->first();

    	$senderInfo = DB::table('view_zones')
    		->select('view_zones.*')
    		->where('zone_type',$bookedOrder->sender_zone_type)
    		->where('zone_id',$bookedOrder->sender_zone_id)
    		->first();

    	$receiverInfo = DB::table('view_zones')
    		->select('view_zones.*')
    		->where('zone_type',$bookedOrder->receiver_zone_type)
    		->where('zone_id',$bookedOrder->receiver_zone_id)
    		->first();

    	// dd($receiverInfo);

    	return view('admin.bookingOrder.view')->with(compact('title','bookedOrder','senderInfo','receiverInfo'));
    }

    public function getClientInfo(Request $request)
    {
        $senderPhoneNumber = $request->senderPhoneNumber;

        // $clientInfo = Client::where('phone',$senderPhoneNumber)->first();
        // $clientInfo = Client::where('phone','like','%'.$senderPhoneNumber.'%')->first();

        $clientInfo = DB::table('view_clients')
            ->select('view_clients.*')
            ->where('clientPhone',$senderPhoneNumber)
            // ->where('clientPhone','like','%'.$senderPhoneNumber.'%')
            ->first();

        // dd($clientInfo);

        if ($clientInfo)
        {
            $senderName = $clientInfo->clientName;
            $senderAddress = $clientInfo->clientAddress;
            $clientId = $clientInfo->clientId;
            $clientType = $clientInfo->clientType;
            $clientUserRoleId = $clientInfo->clientUserRoleId;
        }
        else
        {
            $senderName = "";
            $senderAddress = "";
            $clientId = "";
            $clientType = "";
            $clientUserRoleId = "";
        }
        
        if($request->ajax())
        {
            return response()->json([
                'senderName' => $senderName,
                'senderAddress'=> $senderAddress,
                'clientId'=> $clientId,
                'clientType'=> $clientType,
                'clientUserRoleId'=> $clientUserRoleId,
            ]);
        }
    }

    public function getChargeInfo(Request $request)
    {
        if ($request->senderType == 'Merchant' && $request->clientId != '')
        {
            $charge = ChargeForMerchant::where('merchant_id',$request->clientId)
                ->where('service_type_id',$request->serviceTypeId)
                ->where('service_id',$request->serviceId)
                ->first();
        }
        else
        {
            $charge = ChargeForClient::where('service_type_id',$request->serviceTypeId)
                ->where('service_id',$request->serviceId)
                ->first();
        }

        if ($charge)
        {
            $chargeName = $charge->name;
            $charge = $charge->charge;
        }
        else
        {
            $chargeName = "";
            $charge = "";
        }
        
    	
        if($request->ajax())
        {
            return response()->json([
                'chargeName'=>$chargeName,
                'charge'=>$charge,
            ]);
        }
    }

    public function delete(Request $request)
    {
    	BookingOrder::where('id',$request->bookingOrderId)->delete();
    }

    public function status(Request $request)
    {
        $bookingOrder = BookingOrder::find($request->bookingOrderId);

        if ($bookingOrder->status == 1)
        {
            $bookingOrder->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $bookingOrder->update( [               
                'status' => 1                
            ]);
        }
    }
}
