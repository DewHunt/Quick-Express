@extends('frontend.customer.index') 

@section('customer_content')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-sm booking_info">
                <tbody>
                    <thead>
                        <tr>
                            <th colspan="6" class="text-center">Booking Information</th>
                        </tr>
                    </thead>
                    <tr>
                        <th class="head_name">Booking Date</th>
                        <td>{{ date('d-m-Y', strtotime($bookedOrder->date)) }}</td>
                        <th class="head_name">Order No</th>
                        <td>{{ $bookedOrder->order_no }}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Sender Name</th>
                        <td>{{ $bookedOrder->sender_name }}</td>
                        <th class="head_name">Receiver Name</th>
                        <td>{{ $bookedOrder->receiver_name }}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Sender Phone Number</th>
                        <td>{{ $bookedOrder->sender_phone }}</td>
                        <th class="head_name">Receiver Phone Number</th>
                        <td>{{ $bookedOrder->receiver_phone }}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Sender Zone</th>
                        <td>{{ $sender_zone->zone_name }}</td>
                        <th class="head_name">Receiver Zone</th>
                        <td>{{ $receiver_zone->zone_name }}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Sender Address</th>
                        <td>{{ $bookedOrder->sender_address }}</td>
                        <th class="head_name">Receiver Address</th>
                        <td>{{ $bookedOrder->receiver_address }}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Courier Type</th>
                        <td>{{ $courierType->name }}</td>
                        <th class="head_name">Courier Type Unit</th>
                        <td>{{ $bookedOrder->courier_unit_price }}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Quantity/Kg/Litre</th>
                        <td>{{ $bookedOrder->uom }}</td>
                        <th class="head_name">Delivery Charge</th>
                        <td>{{ $bookedOrder->delivery_charge }}</td>
                    </tr>


                </tbody>
            </table>
        </div>
        <br>
        <h4 style="text-align: center;border-bottom: 1px solid #cecdcd;padding-bottom: 10px;">
            Order Followup
        </h4>
        <div class="table-responsive">
            <table class="table table-bordered table-sm booking_info">
                <tbody>
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center">Delivery Process</th>
                            <th class="text-center">User</th>
                            <th class="text-center">Date / Time</th>
                            <th class="text-center delivery_status">Status</th>
                        </tr>
                    </thead>
                    <tr>
                        <th class="head_name">Doc / Percel Collection</th>
                        <td>{{$deliveryMan->name}}</td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            @if($bookedOrder->collection_status == 0)
                                <span class="pending">Pending</span>
                            @endif

                            @if($bookedOrder->collection_status == 1)
                                <span class="done">Done</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="head_name">Host Agent</th>
                        <td>Sender Agent Name</td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            @if($bookedOrder->collection_status == 0)
                                <span class="pending">Pending</span>
                            @endif

                            @if($bookedOrder->collection_status == 1)
                                <span class="done">Done</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="head_name">Host Warehouse</th>
                        <td>Sender Warehouse Name</td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            @if($bookedOrder->collection_status == 0)
                                <span class="pending">Pending</span>
                            @endif

                            @if($bookedOrder->collection_status == 1)
                                <span class="done">Done</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="head_name">Delivery Warehouse</th>
                        <td>Delivery Warehouse Name</td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            @if($bookedOrder->collection_status == 0)
                                <span class="pending">Pending</span>
                            @endif

                            @if($bookedOrder->collection_status == 1)
                                <span class="done">Done</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="head_name">Delivery Agent</th>
                        <td>Delivery Agent Name</td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            @if($bookedOrder->collection_status == 0)
                                <span class="pending">Pending</span>
                            @endif

                            @if($bookedOrder->collection_status == 1)
                                <span class="done">Done</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="head_name">Delivery Man</th>
                        <td>Delivery Man Name</td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            @if($bookedOrder->collection_status == 0)
                                <span class="pending">Pending</span>
                            @endif

                            @if($bookedOrder->collection_status == 1)
                                <span class="done">Done</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="head_name">Goods delivery</th>
                        <td>Goods delivery Complete status</td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            @if($bookedOrder->collection_status == 0)
                                <span class="pending">Pending</span>
                            @endif

                            @if($bookedOrder->collection_status == 1)
                                <span class="done">Done</span>
                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection