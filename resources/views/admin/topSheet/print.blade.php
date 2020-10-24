@extends('admin.layouts.masterPrint')

@section('custome-css')
    <style type="text/css">
        #report-table td {
            font-size: 14px;
            font-weight: bold;
            padding: 10px;
        }
    </style>
@endsection

@section('content')
    <table id="report-header">
        <tr>
            <td class="align-center">Top Sheet</td>
        </tr>

        <tr>
            <td class="align-center" style="font-size: 13px;">{{ date('Y-m-d',strtotime($fromDate)) }} To {{ date('Y-m-d',strtotime($toDate)) }}</td>
        </tr>
    </table>

    <div id="pad-bottom"></div>

    <table id="report-table">
        <tbody>
            <tr>
                <td>Order Qty</td>
                <td class="align-right" width="70px">{{ @@$topSheet->orderQty }}</td>
                <td width="50px" class="align-center">qty</td>
            </tr>

            <tr>
                <td>Order Value</td>
                <td class="align-right" width="70px">{{ @$topSheet->orderValue }}</td>
                <td width="50px" class="align-center">taka</td>
            </tr>

            <tr>
                <td>Return Delivery</td>
                <td class="align-right" width="70px">{{ @$topSheet->returnDelivery }}</td>
                <td width="50px" class="align-center">qty</td>
            </tr>

            <tr>
                <td>Payment Collection</td>
                <td class="align-right" width="70px">{{ @$topSheet->paymentCollection }}</td>
                <td width="50px" class="align-center">taka</td>
            </tr>

            <tr>
                <td>Merchant Payment</td>
                <td class="align-right" width="70px">{{ @$topSheet->merchantPayment }}</td>
                <td width="50px" class="align-center">taka</td>
            </tr>
        </tbody>
    </table>
@endsection
