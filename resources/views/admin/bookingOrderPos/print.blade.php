@extends('admin.layouts.headerLessMasterPrint')

@section('custome-css')
    <style type="text/css">
        #pos-table {
            /*font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;*/
            font-family: "common", sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #pos-table td, #pos-table th {
            border: 1px solid #ddd;
            padding: 10px;
        }

        h3 {
            color: green;
        }

        h2 {
            color: red;
        }

        p {
            /*padding-left: 5px;*/
        }
    </style>
@endsection

@section('content')
    <div id="pad-bottom"></div>

    <table id="pos-table">
        <tbody>
            @foreach ($bookingOrderPos as $pos)
                <tr>
                    <td>
                        <div style="width: 100%; border: 0px;">                                
                            <h2><u>{{ $WebsiteInformation->website_name }}</u></h2>
                            <p>House #52, Road #16, Block #D, Pallabi, Mirpur, Dhaka #1216</p>
                            <p>{{ $WebsiteInformation->phone_one }}</p>
                        </div>
                        <hr>

                        <div>
                            <h3><u>Merchant Info</u></h3>
                            <p>{{ $pos->sender_name }}</p>
                            <p>{{ $pos->sender_phone }}</p>                            
                        </div>
                        <hr>

                        <div>
                            <h3><u>Customer Info</u></h3>
                            <p>{{ $pos->receiver_name }}</p>
                            <p>{{ $pos->receiver_phone }}</p>
                            <p>{{ $pos->receiver_address }}</p>
                        </div>
                        <hr>

                        <div>
                            <h3><u>Order Summary</u></h3>
                            <p>Order No : {{ $pos->order_no }}</p>
                            <p>Order Date: {{ date('d-m-Y',strtotime($pos->date)) }}</p>
                            <p>Delivery Date: {{ date('d-m-Y',strtotime($pos->delivery_date)) }}</p>
                            <p>Total Amount : {{ $pos->cod_amount }} Taka</p>
                        </div>
                    </td>

                    <td>
                        <div style="width: 100%; border: 0px;">                                
                            <h2><u>{{ $WebsiteInformation->website_name }}</u></h2>
                            <p>House #52, Road #16, Block #D, Pallabi, Mirpur, Dhaka #1216</p>
                            <p>{{ $WebsiteInformation->phone_one }}</p>
                        </div>
                        <hr>

                        <div>
                            <h3><u>Merchant Info</u></h3>
                            <p>{{ $pos->sender_name }}</p>
                            <p>{{ $pos->sender_phone }}</p>                            
                        </div>
                        <hr>

                        <div>
                            <h3><u>Customer Info</u></h3>
                            <p>{{ $pos->receiver_name }}</p>
                            <p>{{ $pos->receiver_phone }}</p>
                            <p>{{ $pos->receiver_address }}</p>
                        </div>
                        <hr>

                        <div>
                            <h3><u>Order Summary</u></h3>
                            <p>Order No : {{ $pos->order_no }}</p>
                            <p>Order Date: {{ date('d-m-Y',strtotime($pos->date)) }}</p>
                            <p>Delivery Date: {{ date('d-m-Y',strtotime($pos->delivery_date)) }}</p>
                            <p>Total Amount : {{ $pos->cod_amount }} Taka</p>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <div style="width: 100%; border: 0px;">                                
                            <h2><u>{{ $WebsiteInformation->website_name }}</u></h2>
                            <p>House #52, Road #16, Block #D, Pallabi, Mirpur, Dhaka #1216</p>
                            <p>{{ $WebsiteInformation->phone_one }}</p>
                        </div>
                        <hr>

                        <div>
                            <h3><u>Merchant Info</u></h3>
                            <p>{{ $pos->sender_name }}</p>
                            <p>{{ $pos->sender_phone }}</p>                            
                        </div>
                        <hr>

                        <div>
                            <h3><u>Customer Info</u></h3>
                            <p>{{ $pos->receiver_name }}</p>
                            <p>{{ $pos->receiver_phone }}</p>
                            <p>{{ $pos->receiver_address }}</p>
                        </div>
                        <hr>

                        <div>
                            <h3><u>Order Summary</u></h3>
                            <p>Order No : {{ $pos->order_no }}</p>
                            <p>Order Date: {{ date('d-m-Y',strtotime($pos->date)) }}</p>
                            <p>Delivery Date: {{ date('d-m-Y',strtotime($pos->delivery_date)) }}</p>
                            <p>Total Amount : {{ $pos->cod_amount }} Taka</p>
                        </div>
                    </td>

                    <td>
                        <div style="width: 100%; border: 0px;">                                
                            <h2><u>{{ $WebsiteInformation->website_name }}</u></h2>
                            <p>House #52, Road #16, Block #D, Pallabi, Mirpur, Dhaka #1216</p>
                            <p>{{ $WebsiteInformation->phone_one }}</p>
                        </div>
                        <hr>

                        <div>
                            <h3><u>Merchant Info</u></h3>
                            <p>{{ $pos->sender_name }}</p>
                            <p>{{ $pos->sender_phone }}</p>                            
                        </div>
                        <hr>

                        <div>
                            <h3><u>Customer Info</u></h3>
                            <p>{{ $pos->receiver_name }}</p>
                            <p>{{ $pos->receiver_phone }}</p>
                            <p>{{ $pos->receiver_address }}</p>
                        </div>
                        <hr>

                        <div>
                            <h3><u>Order Summary</u></h3>
                            <p>Order No : {{ $pos->order_no }}</p>
                            <p>Order Date: {{ date('d-m-Y',strtotime($pos->date)) }}</p>
                            <p>Delivery Date: {{ date('d-m-Y',strtotime($pos->delivery_date)) }}</p>
                            <p>Total Amount : {{ $pos->cod_amount }} Taka</p>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
