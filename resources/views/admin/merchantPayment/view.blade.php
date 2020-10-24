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
                    <h4 style="font-weight: bold;">Merchant Payment Receipt</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">{{ $merchantPayment->merchantName }}</b></h3>
                                </address>
                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <p>
                                        <b>Payment Date :</b> 
                                        <i class="fa fa-calendar"></i>
                                        {{ $merchantPayment->date == "" ? "- - -" : date('d-m-Y', strtotime($merchantPayment->date)) }}</p>
                                </address>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th>Order No</th>
                                            <th width="100px" class="text-center">COD Amount</th>
                                            <th width="120px" class="text-center">Service Charge</th>
                                            <th width="100px" class="text-right">balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sl = 1;
                                        @endphp
                                        @foreach ($merchantPaymentLists as $merchantPaymentList)
                                            <tr>
                                                <td class="text-center">{{ $sl++ }}</td>
                                                <td>{{ $merchantPaymentList->order_no }}</td>
                                                <td class="text-right">{{ $merchantPaymentList->cod_amount }}</td>
                                                <td class="text-right">{{ $merchantPaymentList->service_charge }}</td>
                                                <td class="text-right">{{ $merchantPaymentList->balance }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left m-t-10 text-left">
                                <font size="3px"><b>Inwords :</b> {{ \App\HelperClass::numberToWords($merchantPayment->total_balance) }}</font>
                            </div>
                            
                            <div class="pull-right m-t-10 text-right">
                                <font size="3px"><b>Total :</b> ৳&nbsp;{{ $merchantPayment->total_balance }}</font>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-bottom: 10px;"></div>
@endsection