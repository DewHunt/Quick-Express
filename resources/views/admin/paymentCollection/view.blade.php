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
                                    <h3> &nbsp;<b class="text-danger">{{ $deliveryManPayment->deliveryManName }}</b></h3>
                                </address>
                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <p>
                                        <b>Payment Date :</b> 
                                        <i class="fa fa-calendar"></i>
                                        {{ $deliveryManPayment->date == "" ? "- - -" : date('d-m-Y', strtotime($deliveryManPayment->date)) }}</p>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-borderless table-hover">
                                    <thead>
                                        <tr>
                                            <th width="50px" class="text-center">#</th>
                                            <th>Order No</th>
                                            <th width="100px" class="text-center">Type</th>
                                            <th class="text-right">Charge</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sl = 1;
                                        @endphp
                                        @foreach ($deliveryManPaymentLists as $deliveryManPaymentList)
                                            <tr>
                                                <td class="text-center">{{ $sl++ }}</td>
                                                <td>{{ $deliveryManPaymentList->order_no }}</td>
                                                <td class="text-center">{{ $deliveryManPaymentList->order_type }}</td>
                                                <td class="text-right">{{ $deliveryManPaymentList->charge }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <hr>
                                <h3><b>Total :</b> ৳&nbsp;{{ $deliveryManPayment->total_charge_amount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="padding-bottom: 10px;"></div>
@endsection