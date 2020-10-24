@extends('admin.layouts.masterReport')

@section('search_card_body')
    <div class="row">
        <div class="col-md-12 form-group">
            <input class="form-control" type="hidden" name="print" value="print">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 form-group">
            <label for="from-date">From Date</label>
            <input  type="text" class="form-control datepicker" id="{{ $print == 'print' ? '' : 'from_date' }}" name="fromDate" value="{{ date('d-m-Y',strtotime($fromDate)) }}" placeholder="Select Date From">
        </div>

        <div class="col-md-6 form-group">
            <label for="to-date">To Date</label>
            <input  type="text" class="form-control datepicker" id="{{ $print == 'print' ? '' : 'to_date' }}" name="toDate" value="{{ date('d-m-Y',strtotime($toDate)) }}" placeholder="Select Date To">
        </div>
    </div>
@endsection

@section('print_card_header')
    <input type="hidden" name="fromDate" value="{{ $fromDate }}">
    <input type="hidden" name="toDate" value="{{ $toDate }}">
   
    <input type="hidden" id="print_value" name="print" value="{{ $print }}">
@endsection

@section('print_card_body')
    <table id="dataTable" name="productList" class="table table-bordered table-sm">
        <thead>
            <tr>
                <th width="20px">Sl</th>
                <th width="80px">Date</th>
                <th width="50px">Order Qty</th>
                <th width="50px">Order Value</th>
                <th width="50px">Return Delivery</th>
                <th width="50px">Payment Collection</th>
                <th width="50px">Merchant Payment</th>
            </tr>
        </thead>

        <tbody>
            @php
                $sl = 1;
            @endphp
            <tr>
                <td>{{ $sl }}</td>
                <td>{{ date('d-m-Y',strtotime($fromDate)) }} - {{ date('d-m-Y',strtotime($toDate)) }}</td>
                <td align="right">{{ @@$topSheet->orderQty }}</td>
                <td align="right">{{ @$topSheet->orderValue }}</td>
                <td align="right">{{ @$topSheet->returnDelivery }}</td>
                <td align="right">{{ @$topSheet->paymentCollection }}</td>
                <td align="right">{{ @$topSheet->merchantPayment }}</td>
            </tr>
        </tbody>
    </table>
@endsection