@extends('admin.layouts.masterPrint')

@section('content')
    <table id="report-header">
        <tr>
            <td>Bank Book On {{ date('Y-m-d',strtotime($fromDate)) }} To {{ date('Y-m-d',strtotime($toDate)) }}</td>
        </tr>
    </table>

    <div id="pad-bottom"></div>

    <table id="report-table">
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
                $totalCharge = 0;
                $totalReceive = 0;
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

                    $totalCharge += $merchantStatement->bookingDeliveryCharge;
                    $totalReceive += $merchantStatement->paymentDeliveryCharge;
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

        <tfoot>
            <tr>
                <td colspan="3" align="right"><b>Total</b></td>
                <td align="right">{{ $totalCharge }}</td>
                <td align="right">{{ $totalReceive }}</td>
                <td align="right">{{ $balance > 0 ? $balance : '('.abs($balance).')' }}</td>
            </tr>
        </tfoot>
    </table>
@endsection
