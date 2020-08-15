@extends('admin.layouts.masterView')

@section('card_body')
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                	<th width="120px">Headiing</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                </tr>
            </thead>
            <tbody>
            	<tr>
            		<td style="font-weight: bold;">Name</td>
            		<td>{{ $bookedOrder->sender_name }}</td>
            		<td>{{ $bookedOrder->receiver_name }}</td>
            	</tr>

            	<tr>
            		<td style="font-weight: bold;">Phone</td>
            		<td>{{ $bookedOrder->sender_phone }}</td>
            		<td>{{ $bookedOrder->receiver_phone }}</td>
            	</tr>

                <tr>
                    <td style="font-weight: bold;">Area</td>
                    <td>{{ $senderAreaInfo->name }}</td>
                    <td>{{ $receiverAreaInfo->name }}</td>
                </tr>

            	<tr>
            		<td style="font-weight: bold;">Zone</td>
            		<td>{{ $senderInfo->zone_name }}</td>
            		<td>{{ $receiverInfo->zone_name }}</td>
            	</tr>

            	<tr>
            		<td style="font-weight: bold;">Address</td>
            		<td>{{ $bookedOrder->sender_address }}</td>
            		<td>{{ $bookedOrder->receiver_address }}</td>
            	</tr>

            	<tr>
            		<td style="font-weight: bold;">Service Name</td>
            		<td>{{ $bookedOrder->serviceName }}</td>
            		<td rowspan="3" style="vertical-align: middle;">
            			<span style="font-weight: bold;">Total Delivery Charge:</span> {{ $bookedOrder->delivery_charge }} Taka
                        @if ($bookedOrder->cod == 'Yes')
                            <span style="color: red;">(Cash On Delivery: {{ $bookedOrder->cod_amount }} Taka)</span>
                        @endif
            			<br>
            			@php
            				$inWords = \App\HelperClass::numberToWords($bookedOrder->delivery_charge);
            			@endphp
            			<span style="font-weight: bold;">In Words:</span> {{ $inWords }} Taka Only
            		</td>
            	</tr>

            	<tr>
            		<td style="font-weight: bold;">Service Type</td>
            		<td>{{ $bookedOrder->serviceTypeName }}</td>
            	</tr>

                <tr>
                    <td style="font-weight: bold;">Delivery Type</td>
                    <td>{{ $bookedOrder->deliveryTypeName }}</td>
                </tr>

                <tr>
                    <td style="font-weight: bold;">Remarks</td>
                    <td colspan="2" style="text-align: justify;">{{ $bookedOrder->remarks }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- <div style="padding: 10px;"></div> --}}

    <div class="row" style="padding: 10px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-right">                    
                    <button id="print" class="btn btn-outline-info btn-lg" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                </div>

                <div class="card-body printableArea">
                    <style type="text/css">
                        .chalan {
                            padding: 30px 5px 30px 5px;
                        }

                        .chalan-container {
                            width: 100%;
                            margin: auto;
                            padding: 10px;
                        }

                        .chalan-type {
                            width: 30%;
                            height: 35px;
                            line-height: 35px;
                            float: left;
                            text-align: center;
                            border: 1px solid black;
                        }

                        .chalan-date {
                            width: 30%;
                            margin-left: 70%;
                            height: 35px;
                            line-height: 35px;
                            text-align: center;
                            border: 1px solid black;
                        }

                        .chalan-from {
                            font-weight: bold;
                            font-family: sans-serif;
                            margin-bottom: 0;
                        }

                        .chalan-from h4 {
                            margin-bottom: 5px;
                            font-weight: bold;
                            height: 45px;
                            line-height: 45px;
                        }

                        .chalan-from p {
                            margin-top: -20px;
                            margin-bottom: -5px;
                            padding: 0px;
                            height: 45px;
                            line-height: 45px;
                        }

                        .chalan-to {
                            font-family: sans-serif;
                            margin-bottom: 0;
                        }

                        .chalan-to h4 {
                            margin-bottom: 5px;
                            font-weight: bold;
                            height: 45px;
                            line-height: 45px;
                        }

                        .chalan-to p {
                            margin: -23px 0px 0px 12px;
                            padding: 0px;
                            height: 45px;
                            line-height: 45px;
                            text-align: left;
                        }

                        .chalan-to span {
                            font-weight: bold;
                        }

                        .chalan-cod, .chalan-order-no, .chalan-area {
                            margin: auto;
                            margin-bottom: 10px;
                            width: 70%;
                            height: 35px;
                            line-height: 35px;
                            font-size: 16px;
                            font-weight: bold;
                            text-align: center;
                            border: 1px solid black;
                        }
                    </style>

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="chalan text-center">
                                        <div class="chalan-from">
                                            <h4>{{ $bookedOrder->sender_name }}</h4>
                                            <p>Contact Number : {{ $bookedOrder->sender_phone }}</p>
                                        </div>

                                        <div class="chalan-container">
                                            <div class="chalan-type">
                                                {{ $bookedOrder->deliveryTypeName }}
                                            </div>

                                            <div class="chalan-date">
                                                {{ $bookedOrder->date }}
                                            </div>
                                        </div>

                                        <div class="chalan-to">
                                            <h4>Client Info</h4>
                                            <p><span>Name :</span> {{ $bookedOrder->receiver_name }}</p>
                                            <p><span>Address :</span> {{ $bookedOrder->receiver_address }}</p>
                                            <span><p>Contact Number: {{ $bookedOrder->receiver_phone }}</p></span>
                                        </div>

                                        <div class="chalan-cod">
                                            Cash On Delivery : {{ $bookedOrder->cod_amount }} Taka
                                        </div>

                                        <div class="chalan-order-no">
                                            Order No : {{ $bookedOrder->order_no }}
                                        </div>

                                        <div class="chalan-area">
                                            Area : {{ $receiverAreaInfo->name }}
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="chalan text-center">
                                        <div class="chalan-from">
                                            <h4>{{ $bookedOrder->sender_name }}</h4>
                                            <p>Contact Number : {{ $bookedOrder->sender_phone }}</p>
                                        </div>

                                        <div class="chalan-container">
                                            <div class="chalan-type">
                                                {{ $bookedOrder->deliveryTypeName }}
                                            </div>

                                            <div class="chalan-date">
                                                Area : {{ $bookedOrder->date }}
                                            </div>
                                        </div>

                                        <div class="chalan-to">
                                            <h4>Client Info</h4>
                                            <p><span>Name :</span> {{ $bookedOrder->receiver_name }}</p>
                                            <p><span>Address :</span> {{ $bookedOrder->receiver_address }}</p>
                                            <span><p>Contact Number: {{ $bookedOrder->receiver_phone }}</p></span>
                                        </div>

                                        <div class="chalan-cod">
                                            Cash On Delivery : {{ $bookedOrder->cod_amount }} Taka
                                        </div>

                                        <div class="chalan-order-no">
                                            Order No : {{ $bookedOrder->order_no }}
                                        </div>

                                        <div class="chalan-area">
                                            Area : {{ $receiverAreaInfo->name }}
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="chalan text-center">
                                        <div class="chalan-from">
                                            <h4>{{ $bookedOrder->sender_name }}</h4>
                                            <p>Contact Number : {{ $bookedOrder->sender_phone }}</p>
                                        </div>

                                        <div class="chalan-container">
                                            <div class="chalan-type">
                                                {{ $bookedOrder->deliveryTypeName }}
                                            </div>

                                            <div class="chalan-date">
                                                {{ $bookedOrder->date }}
                                            </div>
                                        </div>

                                        <div class="chalan-to">
                                            <h4>Client Info</h4>
                                            <p><span>Name :</span> {{ $bookedOrder->receiver_name }}</p>
                                            <p><span>Address :</span> {{ $bookedOrder->receiver_address }}</p>
                                            <span><p>Contact Number: {{ $bookedOrder->receiver_phone }}</p></span>
                                        </div>

                                        <div class="chalan-cod">
                                            Cash On Delivery : {{ $bookedOrder->cod_amount }} Taka
                                        </div>

                                        <div class="chalan-order-no">
                                            Order No : {{ $bookedOrder->order_no }}
                                        </div>

                                        <div class="chalan-area">
                                            {{ $receiverAreaInfo->name }}
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="chalan text-center">
                                        <div class="chalan-from">
                                            <h4>{{ $bookedOrder->sender_name }}</h4>
                                            <p>Contact Number : {{ $bookedOrder->sender_phone }}</p>
                                        </div>

                                        <div class="chalan-container">
                                            <div class="chalan-type">
                                                {{ $bookedOrder->deliveryTypeName }}
                                            </div>

                                            <div class="chalan-date">
                                                {{ $bookedOrder->date }}
                                            </div>
                                        </div>

                                        <div class="chalan-to">
                                            <h4>Client Info</h4>
                                            <p><span>Name :</span> {{ $bookedOrder->receiver_name }}</p>
                                            <p><span>Address :</span> {{ $bookedOrder->receiver_address }}</p>
                                            <span><p>Contact Number: {{ $bookedOrder->receiver_phone }}</p></span>
                                        </div>

                                        <div class="chalan-cod">
                                            Cash On Delivery : {{ $bookedOrder->cod_amount }} Taka
                                        </div>

                                        <div class="chalan-order-no">
                                            Order No : {{ $bookedOrder->order_no }}
                                        </div>

                                        <div class="chalan-area">
                                            {{ $receiverAreaInfo->name }}
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="chalan text-center">
                                        <div class="chalan-from">
                                            <h4>{{ $bookedOrder->sender_name }}</h4>
                                            <p>Contact Number : {{ $bookedOrder->sender_phone }}</p>
                                        </div>

                                        <div class="chalan-container">
                                            <div class="chalan-type">
                                                {{ $bookedOrder->deliveryTypeName }}
                                            </div>

                                            <div class="chalan-date">
                                                {{ $bookedOrder->date }}
                                            </div>
                                        </div>

                                        <div class="chalan-to">
                                            <h4>Client Info</h4>
                                            <p><span>Name :</span> {{ $bookedOrder->receiver_name }}</p>
                                            <p><span>Address :</span> {{ $bookedOrder->receiver_address }}</p>
                                            <span><p>Contact Number: {{ $bookedOrder->receiver_phone }}</p></span>
                                        </div>

                                        <div class="chalan-cod">
                                            Cash On Delivery : {{ $bookedOrder->cod_amount }} Taka
                                        </div>

                                        <div class="chalan-order-no">
                                            Order No : {{ $bookedOrder->order_no }}
                                        </div>

                                        <div class="chalan-area">
                                            {{ $receiverInfo->zone_area }}
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="chalan text-center">
                                        <div class="chalan-from">
                                            <h4>{{ $bookedOrder->sender_name }}</h4>
                                            <p>Contact Number : {{ $bookedOrder->sender_phone }}</p>
                                        </div>

                                        <div class="chalan-container">
                                            <div class="chalan-type">
                                                {{ $bookedOrder->deliveryTypeName }}
                                            </div>

                                            <div class="chalan-date">
                                                {{ $bookedOrder->date }}
                                            </div>
                                        </div>

                                        <div class="chalan-to">
                                            <h4>Client Info</h4>
                                            <p><span>Name :</span> {{ $bookedOrder->receiver_name }}</p>
                                            <p><span>Address :</span> {{ $bookedOrder->receiver_address }}</p>
                                            <span><p>Contact Number: {{ $bookedOrder->receiver_phone }}</p></span>
                                        </div>

                                        <div class="chalan-cod">
                                            Cash On Delivery : {{ $bookedOrder->cod_amount }} Taka
                                        </div>

                                        <div class="chalan-order-no">
                                            Order No : {{ $bookedOrder->order_no }}
                                        </div>

                                        <div class="chalan-area">
                                            {{ $receiverInfo->zone_area }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection