@extends('admin.layouts.masterPrint')

@section('content')
    <table id="report-header">
        <tr>
            <td>Order Statement On {{ date('Y-m-d',strtotime($fromDate)) }} To {{ date('Y-m-d',strtotime($toDate)) }}</td>
        </tr>
    </table>

    <div id="pad-bottom"></div>

    <table id="report-table">
        <thead>
            <tr>
                <th width="20px">Sl</th>
                <th width="80px">Date</th>
                <th width="80px">Order No</th>
                <th>Client Name</th>
                <th width="100px">Delivery Area</th>
                <th>Delivery Address</th>
                <th width="100px">Status</th>
            </tr>
        </thead>

        <tbody>
            @php
                $sl = 1;
            @endphp
            @foreach ($returnHistories as $returnHistory)
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ date('d-m-Y',strtotime($returnHistory->date)) }}</td>
                    <td>{{ $returnHistory->order_no }}</td>
                    <td>{{ $returnHistory->clientName }}</td>
                    <td>{{ $returnHistory->deliveryAreaName }}</td>
                    <td>{{ $returnHistory->sender_address }}</td>
                    <td>
                        @if ($returnHistory->return_to_client_status == 1)
                            Back To Cleint
                        @else
                            Returned
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>

{{--         <tfoot>
            <tr>
                <td colspan="4" align="right"><b>Total</b></td>
                <td align="right">{{ $totalDebit }}</td>
                <td align="right">{{ $totalCredit }}</td>
                <td align="right">{{ $balance > 0 ? $balance : '('.abs($balance).')' }}</td>
            </tr>
        </tfoot> --}}
    </table>
@endsection
