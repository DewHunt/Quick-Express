@extends('admin.layouts.masterPrint')

@section('custome-css')
    <style type="text/css">
        #report-header{
            font-weight: 100;
        }
    </style>
@endsection

@section('content')
    <table id="report-header">
        <tr>
            <td>Order Status List On {{ date('Y-m-d',strtotime($fromDate)) }} To {{ date('Y-m-d',strtotime($toDate)) }}</td>
        </tr>
    </table>

    <div id="pad-bottom"></div>

    <table id="report-table">
        <thead>
            <tr>
                <th width="20px">Sl</th>
                <th width="110px">Order No</th>
                <th width="150px">Marchant Name</th>
                <th width="150px">Customer Name</th>
                <th>Customer Address</th>
                <th width="100px">Phone No.</th>
                <th width="140px">Delivery Man Name</th>
                <th width="80px">Status</th>
                <th width="60px">COD</th>
            </tr>
        </thead>

        <tbody>
            @php
                $sl = 1;
                $totalCod = 0;
            @endphp
            @foreach ($orderList as $order)
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->sender_name }}</td>
                    <td>{{ $order->receiver_name }}</td>
                    <td>{{ $order->receiver_address }}</td>
                    <td>{{ $order->receiver_phone }}</td>
                    <td>{{ $order->deliveryManName }}</td>
                    <td align="center">{{ $order->order_status == null ? 'No Status' : $order->order_status }}</td>
                    <td align="right">{{ $order->cod_amount }}</td>
                </tr>
                @php
                    $totalCod = $totalCod + $order->cod_amount;
                @endphp
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="8" align="right"><h3>Total COD Amount</h3></td>
                <td align="right"><h3>{{ $totalCod }}</h3></td>
            </tr>
        </tfoot>
    </table>
@endsection
