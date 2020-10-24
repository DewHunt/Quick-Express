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

    <div class="row">
        <div class="col-md-6">
            <label for="marchant">Marchant</label>
            <div class="form-group {{ $errors->has('merchant') ? ' has-danger' : '' }}">
                <select class="form-control custom-select select2 select-multiple" id="merchant" name="merchant[]" multiple>
                    @foreach ($merchants as $aMerchant)
                        @php
                            $select = "";
                            if ($merchantId)
                            {
                                if (in_array($aMerchant->id, $merchantId))
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

        <div class="col-md-6">
            <label for="payment-type">Payment Type</label>
            <div class="form-group {{ $errors->has('') ? ' has-danger' : '' }}">
                @php
                    $allDepositTypes = array("Cash Payment" => "Cash Payment","Bank Deposit" => "Bank Deposit","Bkash" => "Bkash","Nagad" => "Nagad","Rocket" => "Rocket",)
                @endphp
                <select class="select2 form-control custom-select select2-multiple" id="depositType" name="depositType[]" multiple>
                    @foreach ($allDepositTypes as $key => $value)
                        @php
                            if ($depositType)
                            {
                                if (in_array($key, $depositType))
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
    </div>
@endsection

@section('print_card_header')
    <input type="hidden" name="fromDate" value="{{ $fromDate }}">
    <input type="hidden" name="toDate" value="{{ $toDate }}">

    @if ($merchantId)
        @foreach ($merchantId as $aMerchantId)
            <input type="hidden" name="merchantId[]" value="{{ $aMerchantId }}">
        @endforeach
    @endif

    @if ($depositType)
        @foreach ($depositType as $aDepositType)
            <input type="hidden" name="depositType[]" value="{{ $aDepositType }}">
        @endforeach
    @endif
   
    <input type="hidden" id="print_value" name="print" value="{{ $print }}">
@endsection

@section('print_card_body')
    <table id="dataTable" name="productList" class="table table-bordered table-sm">
        <thead>
            <tr>
                <th width="20px">Sl</th>
                <th width="80px">Date</th>
                <th width="150px">Merchant Name</th>
                <th>Remarks</th>
                <th width="110px">Payment Type</th>
                <th width="80px">Amount</th>
            </tr>
        </thead>

        <tbody>
            @php
                $sl = 1;
            @endphp
            @foreach ($paymentLogs as $paymentLog)
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ date('d-m-Y',strtotime($paymentLog->date)) }}</td>
                    <td>{{ $paymentLog->merchantName }}</td>
                    <td>{{ $paymentLog->remarks }}</td>
                    <td>{{ $paymentLog->deposit_type }}</td>
                    <td align="right">{{ $paymentLog->total_balance }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection