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
                    <a style="font-size: 16px;" class="btn btn-outline-info btn-lg" href="{{ route('bookingOrder.add') }}">
                        <i class="fa fa-plus-circle"></i> Add New
                    </a>
                    <button id="print" class="btn btn-outline-info btn-lg" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                </div>

                <div class="card-body printableArea">
                    <style type="text/css">
                        .company {
                            font-weight: bold;
                            font-family: sans-serif;
                            margin-bottom: -25px;
                            padding: 20px 0px 0px 0px;
                        }

                        .company h2 {
                            margin-bottom: 5px;
                            font-weight: bold;
                            height: 45px;
                            line-height: 45px;
                            color: green;
                        }

                        .company p {
                            margin: -20px 0px 0px 0px;
                            padding: 0px;
                            height: 45px;
                            line-height: 45px;
                        }

                        .chalan {
                            margin-top: -15px;
                            padding: 0px 0px 10px 0px;
                        }

                        .chalan-container {
                            margin: 0 auto;
                            width: 100%;
                            padding: 0px;
                            text-align: center;
                        }

                        .chalan-type {
                            width: 45%;
                            height: 35px;
                            line-height: 35px;
                            float: left;
                            text-align: center;
                            border: 1px solid black;
                        }

                        .chalan-date {
                            width: 45%;
                            margin-left: 53%;
                            height: 35px;
                            line-height: 35px;
                            text-align: center;
                            border: 1px solid black;
                        }

                        .chalan-type span, .chalan-date span {
                            font-weight: bold;
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
                            text-align: left;
                            margin: 0px 10px 25px 0px;
                        }

                        .chalan-to-name {
                            width: 70%;
                            float: left;
                            /*border: 1px solid black;*/
                        }

                        .chalan-to-contact-number {
                            width: 30%;
                            margin-left: 70%;
                            /*border: 1px solid black;*/
                        }

                        .chalan-to-address {
                            width: 100%;
                            float: left;
                            margin: 10px 0px 15px 0px;
                            /*border: 1px solid black;*/
                        }

                        .chalan-to h4 {
                            margin-bottom: 5px;
                            font-weight: bold;
                            height: 45px;
                            line-height: 45px;
                            text-align: center;
                        }

                        .chalan-to p {
                            margin: 0px 0px 0px 5px;
                        }

                        .chalan-to span {
                            font-weight: bold;
                        }

                        .chalan-cod, .chalan-order-no, .chalan-area, .chalan-remarks {
                            width: 100%;
                            margin: auto;
                            float: right;
                            margin-bottom: 10px;
                            padding: 10px;
                            font-weight: bold;
                            text-align: center;
                            border: 1px solid black;
                        }

                        .chalan-cod, .chalan-order-no, .chalan-area, .chalan-remarks p{
                            /*text-align: justify;*/
                        }
                    </style>

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="company text-center">
                                        <h2>{{ $companyInformation->website_name }}</h2>
                                        <p>{{ $companyInformation->address }}</p>
                                        <p>{{ $companyInformation->phone_one }}</p>
                                    </div>
                                    <hr>

                                    <div class="chalan">
                                        <div class="chalan-container">
                                            <div class="chalan-from">
                                                <h4>{{ $bookedOrder->sender_name }}</h4>
                                                <p>Contact Number : {{ $bookedOrder->sender_phone }}</p>
                                            </div>

                                            <div>
                                                <div class="chalan-type">
                                                    <span>Order Date : </span>{{ date('d-m-Y',strtotime($bookedOrder->date)) }}
                                                </div>

                                                <div class="chalan-date">
                                                    <span>Delivery Date : </span>{{ date('d-m-Y',strtotime($bookedOrder->delivery_date)) }}
                                                </div>
                                            </div>

                                            <div class="chalan-to">
                                                <h4>Client Info</h4>
                                                <div class="chalan-to-name">
                                                    <span>Name :</span> <p>{{ $bookedOrder->receiver_name }}</p>
                                                </div>
                                                <div class="chalan-to-contact-number">
                                                    <span>Contact Number: </span><p>{{ $bookedOrder->receiver_phone }}</p>
                                                </div>
                                                <div class="chalan-to-address">
                                                    <span>Address :</span> <p>{{ $bookedOrder->receiver_address }}</p>
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

                                                <div class="chalan-remarks">
                                                    remarks : {{ $bookedOrder->remarks }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="company text-center">
                                        <h2>{{ $companyInformation->website_name }}</h2>
                                        <p>{{ $companyInformation->address }}</p>
                                        <p>{{ $companyInformation->phone_one }}</p>
                                    </div>
                                    <hr>

                                    <div class="chalan">
                                        <div class="chalan-container">
                                            <div class="chalan-from">
                                                <h4>{{ $bookedOrder->sender_name }}</h4>
                                                <p>Contact Number : {{ $bookedOrder->sender_phone }}</p>
                                            </div>

                                            <div>
                                                <div class="chalan-type">
                                                    <span>Order Date : </span>{{ date('d-m-Y',strtotime($bookedOrder->date)) }}
                                                </div>

                                                <div class="chalan-date">
                                                    <span>Delivery Date : </span>{{ date('d-m-Y',strtotime($bookedOrder->delivery_date)) }}
                                                </div>
                                            </div>

                                            <div class="chalan-to">
                                                <h4>Client Info</h4>
                                                <div class="chalan-to-name">
                                                    <span>Name :</span> <p>{{ $bookedOrder->receiver_name }}</p>
                                                </div>
                                                <div class="chalan-to-contact-number">
                                                    <span>Contact Number: </span><p>{{ $bookedOrder->receiver_phone }}</p>
                                                </div>
                                                <div class="chalan-to-address">
                                                    <span>Address :</span> <p>{{ $bookedOrder->receiver_address }}</p>
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

                                                <div class="chalan-remarks">
                                                    remarks : {{ $bookedOrder->remarks }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="company text-center">
                                        <h2>{{ $companyInformation->website_name }}</h2>
                                        <p>{{ $companyInformation->address }}</p>
                                        <p>{{ $companyInformation->phone_one }}</p>
                                    </div>
                                    <hr>

                                    <div class="chalan">
                                        <div class="chalan-container">
                                            <div class="chalan-from">
                                                <h4>{{ $bookedOrder->sender_name }}</h4>
                                                <p>Contact Number : {{ $bookedOrder->sender_phone }}</p>
                                            </div>

                                            <div>
                                                <div class="chalan-type">
                                                    <span>Order Date : </span>{{ date('d-m-Y',strtotime($bookedOrder->date)) }}
                                                </div>

                                                <div class="chalan-date">
                                                    <span>Delivery Date : </span>{{ date('d-m-Y',strtotime($bookedOrder->delivery_date)) }}
                                                </div>
                                            </div>

                                            <div class="chalan-to">
                                                <h4>Client Info</h4>
                                                <div class="chalan-to-name">
                                                    <span>Name :</span> <p>{{ $bookedOrder->receiver_name }}</p>
                                                </div>
                                                <div class="chalan-to-contact-number">
                                                    <span>Contact Number: </span><p>{{ $bookedOrder->receiver_phone }}</p>
                                                </div>
                                                <div class="chalan-to-address">
                                                    <span>Address :</span> <p>{{ $bookedOrder->receiver_address }}</p>
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

                                                <div class="chalan-remarks">
                                                    remarks : {{ $bookedOrder->remarks }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="company text-center">
                                        <h2>{{ $companyInformation->website_name }}</h2>
                                        <p>{{ $companyInformation->address }}</p>
                                        <p>{{ $companyInformation->phone_one }}</p>
                                    </div>
                                    <hr>

                                    <div class="chalan">
                                        <div class="chalan-container">
                                            <div class="chalan-from">
                                                <h4>{{ $bookedOrder->sender_name }}</h4>
                                                <p>Contact Number : {{ $bookedOrder->sender_phone }}</p>
                                            </div>

                                            <div>
                                                <div class="chalan-type">
                                                    <span>Order Date : </span>{{ date('d-m-Y',strtotime($bookedOrder->date)) }}
                                                </div>

                                                <div class="chalan-date">
                                                    <span>Delivery Date : </span>{{ date('d-m-Y',strtotime($bookedOrder->delivery_date)) }}
                                                </div>
                                            </div>

                                            <div class="chalan-to">
                                                <h4>Client Info</h4>
                                                <div class="chalan-to-name">
                                                    <span>Name :</span> <p>{{ $bookedOrder->receiver_name }}</p>
                                                </div>
                                                <div class="chalan-to-contact-number">
                                                    <span>Contact Number: </span><p>{{ $bookedOrder->receiver_phone }}</p>
                                                </div>
                                                <div class="chalan-to-address">
                                                    <span>Address :</span> <p>{{ $bookedOrder->receiver_address }}</p>
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

                                                <div class="chalan-remarks">
                                                    remarks : {{ $bookedOrder->remarks }}
                                                </div>
                                            </div>
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