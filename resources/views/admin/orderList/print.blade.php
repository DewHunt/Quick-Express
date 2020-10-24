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
            <td align="left"><b>Delivery Man Name : </b>{{ $deliveryManInfo->name }}</td>
            <td align="left"><b>Contact Number : </b>{{ $deliveryManInfo->phone }}</td>
            <td align="right"><b>Date : </b>{{ date('Y-m-d') }}</td>
        </tr>

        <tr>
            <td colspan="3"></td>
        </tr>

        <tr>
            <td align="left" colspan="3"><b>Area Name : </b>{{ $areaName }}</td>
        </tr>
    </table>

    <div id="pad-bottom"></div>

    <table id="report-table">
        <thead>
            <tr>
                <th width="20px">Sl</th>
                <th width="100px">Order No</th>
                <th width="110px">Marchant Name</th>
                <th width="110px">Customer Name</th>
                <th>Customer Address</th>
                <th width="80px">Phone No.</th>
                <th width="80px">Amount</th>
                <th width="80px">Receive Amount</th>
                <th width="100px">Remarks</th>
                <th width="80px">Update</th>
            </tr>
        </thead>

        <tbody>
            @php
                $sl = 1;
                $totalAmount = 0;
            @endphp
            @foreach ($orderList as $order)
                @php
                    $total = $order->cod_amount + $order->cod_charge;
                    $totalAmount += $total;
                @endphp
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->sender_name }}</td>
                    <td>{{ $order->receiver_name }}</td>
                    <td>{{ $order->receiver_address }}</td>
                    <td>{{ $order->receiver_phone }}</td>
                    <td align="right">{{ $total }}</td>
                    <td></td>
                    <td>{{ $order->remarks }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <th colspan="6" style="text-align: right;">Total</th>
                <th style="text-align: right;">{{ $totalAmount }}</th>
                <th colspan="3"></th>
            </tr>
        </tfoot>
    </table>
@endsection
