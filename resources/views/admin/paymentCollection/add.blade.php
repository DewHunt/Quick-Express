@extends('admin.layouts.master')

@section('custom_css')
    <style type="text/css">
        label {
            font-weight: bold;
        }

        .tableFixHead {
            overflow-y: auto;
            height: 380px;
            /*border: 1px solid #00c292;*/
        }

        .tableFixHead thead th {
            position: sticky;
            top: 0;
        }
    </style>
@endsection

@section('content')
    {{-- <div style="padding-bottom: 23px;"></div> --}}
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-5 col-md-3">
                    <form class="form-horizontal" action="{{ route($formLink) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
                        {{ csrf_field() }}
                        <div class="card">
                            <div class="card-body">
                                <label for="client-marchant">Client/Marchant</label>
                                <div class="form-group {{ $errors->has('client') ? ' has-danger' : '' }}">
                                    <select class="select2 form-control custom-select" id="client" name="client">
                                        <option value="">Select A Client/Marchant</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->clientId }},{{ $client->clientType }}">{{ $client->clientName }} ({{ $client->clientType }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="total-cod-amount">Total COD Amount</label>
                                        <div class="form-group {{ $errors->has('totalCodAmount') ? ' has-danger' : '' }}">
                                            <input type="text" class="form-control" id="totalCodAmount" name="totalCodAmount" value="0" required readonly />
                                            @if ($errors->has('totalCodAmount'))
                                                @foreach($errors->get('totalCodAmount') as $error)
                                                    <div class="form-control-feedback">{{ $error }}</div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="payment-date">Payment Date</label>
                                        <div class="form-group">
                                            <input  type="text" class="form-control add_datepicker" id="paymentDate" name="paymentDate" placeholder="Select Payment Date" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="total-delivery-charge">Total Delivery Charge</label>
                                        <div class="form-group {{ $errors->has('totalDeliveryCharge') ? ' has-danger' : '' }}">
                                            <input type="text" class="form-control" id="totalDeliveryCharge" name="totalDeliveryCharge" value="0" required readonly />
                                            @if ($errors->has('totalDeliveryCharge'))
                                                @foreach($errors->get('totalDeliveryCharge') as $error)
                                                    <div class="form-control-feedback">{{ $error }}</div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="balance">Balance</label>
                                        <div class="form-group {{ $errors->has('balance') ? ' has-danger' : '' }}">
                                            <input type="text" class="form-control" id="balance" name="balance" value="0" required readonly />
                                            @if ($errors->has('balance'))
                                                @foreach($errors->get('balance') as $error)
                                                    <div class="form-control-feedback">{{ $error }}</div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <label for=""></label>
                                        <div class="form-group">
                                            <a class="btn btn-outline-info btn-md" href="{{ route($goBackLink) }}">
                                                <i class="fa fa-arrow-circle-left"></i> Go Back
                                            </a>
                                            <button type="submit" class="btn btn-outline-info btn-md waves-effect buttonAddEdit" name="buttonAddEdit" value="Save">
                                                <i class="fa fa-save"></i> {{ $buttonName }}
                                            </button>
                                            <button type="reset" class="btn btn-outline-info btn-md waves-effect buttonAddEdit" name="buttonAddEdit" value="Save" onclick="reset()">
                                                <i class="fa fa-window-close"></i> Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div id="selectedOrders"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-7 col-md-9">
                    <div class="tableFixHead">
                        <table class="table table-bordered table-md {{-- color-table muted-table --}} color-bordered-table success-bordered-table orderInfo">
                            <thead>
                                <tr>
                                    <th>Order No.</th>
                                    <th width="120px">COD Amount</th>
                                    <th width="120px">Delivery Charge</th>
                                    <th width="30px" style="text-align: center;"></th>
                                </tr>
                            </thead>

                            <tbody id="tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script type="text/javascript">
        $(document).on('change', '#client', function()
        {
            $('.block').remove();
            $('#totalCodAmount').val(0);
            $('#totalDeliveryCharge').val(0);
            $('#balance').val(0);
            
            var client = $('#client').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('paymentCollection.getOrderInfo') }}',
                data:{client:client},
                success:function(data){
                    var orderInformations = data.orderInformations;
                    $('.orderInfoRow').remove();
                    for (var orderInformation of orderInformations)
                    {
                        $(".orderInfo tbody").append(
                            '<tr class="orderInfoRow" id="orderInfoRow_'+orderInformation.id+'">'+
                                '<td>'+
                                    orderInformation.order_no+
                                    '<input type="hidden" class="orderNo_'+orderInformation.id+'" id="orderNo_'+orderInformation.id+'" value="'+orderInformation.order_no+'" readonly>'+
                                '</td>'+
                                '<td align="right">'+
                                    orderInformation.cod_amount+
                                    '<input type="hidden" style="text-align: right;" class="codAmount_'+orderInformation.id+'" id="codAmount_'+orderInformation.id+'" value="'+orderInformation.cod_amount+'" readonly>'+
                                '</td>'+
                                '<td align="right">'+
                                    orderInformation.delivery_charge+
                                    '<input type="hidden" style="text-align: right;" class="deliveryCharge_'+orderInformation.id+'" id="deliveryCharge_'+orderInformation.id+'" value="'+orderInformation.delivery_charge+'" readonly>'+
                                '</td>'+
                                '<td align="center">'+
                                    '<input type="checkbox" class="check selectAllColumn" id="orderCheck_'+orderInformation.id+'" value="'+orderInformation.id+'" data-checkbox="icheckbox_square-red" onclick="getPayment('+orderInformation.id+')">'+
                                    '<label for="minimal-checkbox-'+orderInformation.id+'"></label>'+
                                '</td>'+
                            '</tr>'
                        );                        
                    }
                }
            });
        });

        function getPayment(bookingOrderId)
        {
            var orderNo = $('#orderNo_'+bookingOrderId).val();
            var codAmount = parseInt($('#codAmount_'+bookingOrderId).val());
            var deliveryCharge = parseInt($('#deliveryCharge_'+bookingOrderId).val());

            var totalCodAmount = parseInt($('#totalCodAmount').val());
            var totalDeliveryCharge = parseInt($('#totalDeliveryCharge').val());

            if ($('#orderCheck_'+bookingOrderId).is(":checked"))
            {
                totalCodAmount = totalCodAmount + codAmount;
                totalDeliveryCharge = totalDeliveryCharge + deliveryCharge;

                $('#totalCodAmount').val(totalCodAmount);
                $('#totalDeliveryCharge').val(totalDeliveryCharge);

                $("#selectedOrders").append(
                    '<div class="block" id="block_'+bookingOrderId+'">'+
                    '<input type="text" name="orderNo[]" value="'+orderNo+'">'+
                    '<input type="text" name="codAmount[]" value="'+codAmount+'">'+
                    '<input type="text" name="deliveryCharge[]" value="'+deliveryCharge+'">'+
                    '<input type="text" name="orderId[]" value="'+bookingOrderId+'">'+
                    '</div>'
                );
            }
            else
            {
                totalCodAmount = totalCodAmount - codAmount;
                totalDeliveryCharge = totalDeliveryCharge - deliveryCharge;

                $('#totalCodAmount').val(totalCodAmount);
                $('#totalDeliveryCharge').val(totalDeliveryCharge);

                $('#block_'+bookingOrderId).remove();
            }

            var balance = totalCodAmount - totalDeliveryCharge;

            $('#balance').val(balance);
        }
    </script>
@endsection