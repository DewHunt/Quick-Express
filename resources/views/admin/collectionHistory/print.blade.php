@extends('admin.layouts.masterPrint')

@section('content')
    <table id="report-header">
        <tr>
            <td>Collection History On {{ date('Y-m-d',strtotime($fromDate)) }} To {{ date('Y-m-d',strtotime($toDate)) }}</td>
        </tr>
    </table>

    <div id="pad-bottom"></div>

    <table id="report-table">
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
                $totalAmount = 0;
            @endphp
            @foreach ($collectionHistories as $collectionHistory)
                @php
                    $totalAmount += $collectionHistory->delivery_charge;
                @endphp
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ date('d-m-Y',strtotime($collectionHistory->paymentDate)) }}</td>
                    <td>{{ $collectionHistory->clientType }}</td>
                    <td>{{ $collectionHistory->clientName }}</td>
                    <td>{{ $collectionHistory->orderNo }}</td>
                    <td align="right">{{ $collectionHistory->delivery_charge }}</td>
                </tr>
            @endforeach

            <tfoot>
                <tr>
                    <td colspan="5" align="center">Total Amount</td>
                    <td align="right">{{ $totalAmount }}</td>
                </tr>
            </tfoot>
        </tbody>
    </table>
@endsection
