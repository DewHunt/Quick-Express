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
                <th>Order No</th>
                <th>Client Name</th>
                <th>Delivery Area</th>
                <th width="80px">Charge</th>
                <th width="100px">Status</th>
            </tr>
        </thead>

        <tbody>
            @php
                $sl = 1;
            @endphp
            @foreach ($orderStatements as $orderStatement)
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ date('d-m-Y',strtotime($orderStatement->date)) }}</td>
                    <td>{{ $orderStatement->order_no }}</td>
                    <td>{{ $orderStatement->clientName }}</td>
                    <td>{{ $orderStatement->deliveryAreaName }}</td>
                    <td align="right">{{ $orderStatement->delivery_charge }}</td>
                    <td>
                        @if ($orderStatement->collection_status == 0 || $orderStatement->collection_status == 1 && $orderStatement->delivery_status == 0)
                            Ongoing Order
                        @elseif ($orderStatement->collection_status == 1 && $orderStatement->delivery_status == 1)
                            Order Completed
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
