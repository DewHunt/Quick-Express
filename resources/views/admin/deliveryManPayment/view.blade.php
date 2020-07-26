@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="custom-card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="custom-card-title">{{ $title }}</h4></div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-outline-info btn-lg" href="{{ route($goBackLink) }}">
                        <i class="fa fa-arrow-circle-left"></i> Go Back
                    </a>
                    <button id="print" class="btn btn-outline-info btn-lg" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-bottom: 10px;"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="card printableArea">
                <div class="card-header">
                    <h4 style="font-weight: bold;">Payment Information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">{{ $paymentCollection->clientName }}</b></h3>
                                </address>
                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <p>
                                        <b>Payment Date :</b> 
                                        <i class="fa fa-calendar"></i>
                                        {{ $paymentCollection->date == "" ? "- - -" : date('d-m-Y', strtotime($paymentCollection->date)) }}</p>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Order No</th>
                                            <th class="text-right">COD Amount</th>
                                            <th class="text-right">Delivery Charge</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sl = 1;
                                        @endphp
                                        @foreach ($paymentCollectionLists as $paymentCollectionList)
                                            <tr>
                                                <td class="text-center">{{ $sl++ }}</td>
                                                <td>{{ $paymentCollectionList->order_no }}</td>
                                                <td class="text-right">{{ $paymentCollectionList->cod_amount }}</td>
                                                <td class="text-right">{{ $paymentCollectionList->delivery_charge }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <p>Total COD Amount: ৳&nbsp;{{ $paymentCollection->total_cod_amount }}</p>
                                <p>Total Delivery Charge: ৳&nbsp;{{ $paymentCollection->total_delivery_charge_amount }}</p>
                                <hr>
                                <h3><b>Balance :</b> ৳&nbsp;{{ $paymentCollection->balance }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-bottom: 10px;"></div>
@endsection