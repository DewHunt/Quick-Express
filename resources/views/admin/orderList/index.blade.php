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
            <div class="form-group {{ $errors->has('deliveryManId') ? ' has-danger' : '' }}">
                <select class="form-control custom-select select2" id="deliveryManId" name="deliveryManId" required>
                    <option value="">Select Delivery Man</option>
                    @foreach ($deliveryMen as $deliveryMan)
                        @php
                            $select = "";
                            if ($deliveryManId)
                            {
                                if ($deliveryManId == $deliveryMan->id)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }
                            }
                        @endphp
                        <option value="{{ $deliveryMan->id }}" {{ $select }}>{{ $deliveryMan->name }}</option>
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
    <input type="hidden" name="deliveryManId" value="{{ $deliveryManId }}">

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
                <th width="110px">Amount</th>
            </tr>
        </thead>

        <tbody>
            @php
                $sl = 1;
            @endphp
            @foreach ($orderList as $order)
                @php
                    $total = $order->cod_amount + $order->cod_charge;
                @endphp
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->sender_name }}</td>
                    <td>{{ $order->receiver_name }}</td>
                    <td>{{ $order->receiver_address }}</td>
                    <td>{{ $order->receiver_phone }}</td>
                    <td align="right">{{ $total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection