@extends('admin.layouts.masterReport')

@section('search_card_body')
    <div class="row">
        <div class="col-md-12 form-group">
            <input class="form-control" type="hidden" name="print" value="print">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="client-marchant">Client/Marchant</label>
            <div class="form-group {{ $errors->has('client') ? ' has-danger' : '' }}">
                <select class="form-control custom-select select2 select-multiple" id="client" name="client[]" multiple>
                    @foreach ($clients as $aClient)
                        @php
                            $select = "";
                            if ($clientId)
                            {
                                if (in_array($aClient->clientId, $clientId) && in_array($aClient->clientType,$clientType))
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }
                            }
                        @endphp
                        <option value="{{ $aClient->clientId }},{{ $aClient->clientType }}" {{ $select }}>{{ $aClient->clientName }} ({{ $aClient->clientType }})</option>
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

    @if ($clientId)
        @foreach ($clientId as $aClientId)
            <input type="hidden" name="clientId[]" value="{{ $aClientId }}">
        @endforeach
    @endif

    @if ($clientType)
        @foreach ($clientType as $aClientType)
            <input type="hidden" name="clientType[]" value="{{ $aClientType }}">
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
                <th width="100px">Client Type</th>
                <th width="150px">Client Name</th>
                <th>Order No</th>
                <th width="80px">Amount</th>
            </tr>
        </thead>

        <tbody>
            @php
                $sl = 1;
            @endphp
            @foreach ($collectionHistories as $collectionHistory)
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ date('d-m-Y',strtotime($collectionHistory->paymentDate)) }}</td>
                    <td>{{ $collectionHistory->clientType }}</td>
                    <td>{{ $collectionHistory->clientName }}</td>
                    <td>{{ $collectionHistory->orderNo }}</td>
                    <td align="right">{{ $collectionHistory->delivery_charge }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection