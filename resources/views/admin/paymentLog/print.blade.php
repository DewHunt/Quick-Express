@extends('admin.layouts.masterPrint')

@section('content')
    <table id="report-header">
        <tr>
            <td>Payment Log On {{ date('Y-m-d',strtotime($fromDate)) }} To {{ date('Y-m-d',strtotime($toDate)) }}</td>
        </tr>
    </table>

    <div id="pad-bottom"></div>

    <table id="report-table">
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
                $totalAmount = 0;
            @endphp
            @foreach ($paymentLogs as $paymentLog)
                @php
                    $totalAmount += $paymentLog->total_balance;
                @endphp
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ date('d-m-Y',strtotime($paymentLog->date)) }}</td>
                    <td>{{ $paymentLog->merchantName }}</td>
                    <td>{{ $paymentLog->remarks }}</td>
                    <td>{{ $paymentLog->deposit_type }}</td>
                    <td align="right">{{ $paymentLog->total_balance }}</td>
                </tr>
            @endforeach

            <tfoot>
                <tr>
                    <th align="center" colspan="5">Total Amount</th>
                    <th align="right">{{ $totalAmount }}</th>
                </tr>
            </tfoot>
        </tbody>
    </table>
@endsection
