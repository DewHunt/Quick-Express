@extends('admin.layouts.masterReport')

@section('search_card_body')
    <div class="row">
        <div class="col-md-12 form-group">
            <input class="form-control" type="hidden" name="print" value="print">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <label for="credit-account-head">Merchant</label>
            <div class="form-group">
                <select class="form-control select2" id="merchant" name="merchant">
                    <option value="">Select Merchant Name</option>
                    @foreach ($merchants as $aMerchant)
                        @php
                            $select = "";
                            if ($merchant)
                            {
                                if ($aMerchant->id == $merchant)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }
                            }
                        @endphp
                        <option value="{{ $aMerchant->id }}" {{ $select }}>{{ $aMerchant->name }}</option>
                    @endforeach
                </select>
            </div>  
        </div>

        <div class="col-md-4 form-group">
            <label for="from-date">From Date</label>
            <input  type="text" class="form-control datepicker" id="{{ $print == 'print' ? '' : 'from_date' }}" name="fromDate" value="{{ date('d-m-Y',strtotime($fromDate)) }}" placeholder="Select Date From">
        </div>
        <div class="col-md-4 form-group">
            <label for="to-date">To Date</label>
            <input  type="text" class="form-control datepicker" id="{{ $print == 'print' ? '' : 'to_date' }}" name="toDate" value="{{ date('d-m-Y',strtotime($toDate)) }}" placeholder="Select Date To">
        </div>
    </div>
@endsection

@section('print_card_header')
    <input type="hidden" name="fromDate" value="{{ $fromDate }}">
    <input type="hidden" name="toDate" value="{{ $toDate }}">
    <input type="hidden" name="merchant" value="{{ $merchant }}">
    
    <input type="hidden" id="print_value" name="print" value="{{ $print }}">
@endsection

@section('print_card_body')
    <table id="dataTable" name="productList" class="table table-bordered table-sm">
        <thead>
            <tr>
                @php
                    if ($previousBalances)
                    {
                        $previousBalance = $previousBalances->bookingDeliveryCharge - $previousBalances->paymentDeliveryCharge;
                    }
                    else
                    {
                        $previousBalance = 0;
                    }                                        
                @endphp
                <th colspan="5" style="text-align: right; font-weight: bold;">Previous Balance</th>
                <th style="text-align: right;">{{ $previousBalance }}</th>
            </tr>
            <tr>
                <th width="20px">Sl</th>
                <th width="80px">Date</th>
                <th>Remarks</th>
                <th width="80px">Charge</th>
                <th width="80px">Receive</th>
                <th width="80px">Balance</th>
            </tr>
        </thead>

        <tbody>
            @php
                $sl = 1;
                $balance = 0;
            @endphp
            @foreach ($merchantStatements as $merchantStatement)
                @php
                    if ($sl == 1)
                    {
                        $balance = $previousBalance + $merchantStatement->bookingDeliveryCharge - $merchantStatement->paymentDeliveryCharge;
                    }
                    else
                    {
                        $balance = $balance + $merchantStatement->bookingDeliveryCharge - $merchantStatement->paymentDeliveryCharge; 
                    }
                    $sl++;
                @endphp
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ date('d-m-Y',strtotime($merchantStatement->date)) }}</td>
                    <td>
                        @if ($merchantStatement->statementType == "Payment")
                            Payment Collection
                        @else
                            Total Delivered : 1, Total COD : {{ $merchantStatement->bookingCodAmount }}
                        @endif
                    </td>
                    <td align="right">{{ $merchantStatement->bookingDeliveryCharge }}</td>
                    <td align="right">{{ $merchantStatement->paymentDeliveryCharge }}</td>
                    <td align="right">{{ $balance }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection