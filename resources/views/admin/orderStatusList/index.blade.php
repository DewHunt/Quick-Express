@extends('admin.layouts.masterReport')

@section('search_card_body')
    <div class="row">
        <div class="col-md-12 form-group">
            <input class="form-control" type="hidden" name="print" value="print">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="delivery Man">Delivery Man</label>
            <div class="form-group {{ $errors->has('orderStatus') ? ' has-danger' : '' }}">
                @php
                    $orderStatusArray = array('Pending' => 'Pending','Delivered' => 'Delivered','Return' => 'Return','NULL' => 'No Status');
                @endphp
                <select class="form-control custom-select select2" id="orderStatus" name="orderStatus" required>
                    <option value="">Select Oder Status</option>
                    @foreach ($orderStatusArray as $key => $value)
                        @php
                            $select = "";
                            if ($orderStatus)
                            {
                                if ($orderStatus == $key)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }
                            }
                        @endphp
                        <option value="{{ $key }}" {{ $select }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3 form-group">
            <label for="from-date">From Date</label>
            <input  type="text" class="form-control datepicker" id="{{ $print == 'print' ? '' : 'from_date' }}" name="fromDate" value="{{ date('d-m-Y',strtotime($fromDate)) }}" placeholder="Select Date From">
        </div>
        <div class="col-md-3 form-group">
            <label for="to-date">To Date</label>
            <input  type="text" class="form-control datepicker" id="{{ $print == 'print' ? '' : 'to_date' }}" name="toDate" value="{{ date('d-m-Y',strtotime($toDate)) }}" placeholder="Select Date To">
        </div>
    </div>
@endsection

@section('print_card_header')
    <input type="hidden" name="fromDate" value="{{ $fromDate }}">
    <input type="hidden" name="toDate" value="{{ $toDate }}">
    <input type="hidden" name="orderStatus" value="{{ $orderStatus }}">

    <input type="hidden" id="print_value" name="print" value="{{ $print }}">
@endsection

@section('print_card_body')
    <table id="dataTable" name="productList" class="table table-bordered table-sm">
        <thead>
            <tr>
                <th width="20px">Sl</th>
                <th width="120px">Order No</th>
                <th width="150px">Marchant Name</th>
                <th width="150px">Customer Name</th>
                <th>Customer Address</th>
                <th width="100px">Phone No.</th>
                <th width="100px">COD Amount</th>
                <th width="130px">Delivery Man Name</th>
                <th width="80px">Status</th>
            </tr>
        </thead>

        <tbody>
            @php
                $sl = 1;
            @endphp
            @foreach ($orderList as $order)
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->sender_name }}</td>
                    <td>{{ $order->receiver_name }}</td>
                    <td>{{ $order->receiver_address }}</td>
                    <td>{{ $order->receiver_phone }}</td>
                    <td align="right">{{ $order->cod_amount }}</td>
                    <td>{{ $order->deliveryManName }}</td>
                    <td align="center">{{ $order->order_status == null ? 'No Status' : $order->order_status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection