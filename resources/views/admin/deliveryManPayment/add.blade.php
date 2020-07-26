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
                                <label for="delivery-men-list">Delivery Men List</label>
                                <div class="form-group {{ $errors->has('deliveryMan') ? ' has-danger' : '' }}">
                                    <select class="select2 form-control" id="deliveryMan" name="deliveryMan">
                                        <option value="">Select A Client/Marchant</option>
                                        @foreach ($deliveryMen as $deliveryMan)
                                            <option value="{{ $deliveryMan->id }}">{{ $deliveryMan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="payment-date">Payment Date</label>
                                        <div class="form-group">
                                            <input  type="text" class="form-control add_datepicker" id="paymentDate" name="paymentDate" placeholder="Select Payment Date" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="total-delivery-charge">Total Delivery Charge</label>
                                        <div class="form-group {{ $errors->has('totalCharge') ? ' has-danger' : '' }}">
                                            <input type="text" class="form-control" id="totalCharge" name="totalCharge" value="0" required readonly />
                                            @if ($errors->has('totalCharge'))
                                                @foreach($errors->get('totalCharge') as $error)
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
                                    <th width="100px">Type</th>
                                    <th width="100px">Charge</th>
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
        $(document).on('change', '#deliveryMan', function()
        {
            $('.block').remove();
            $('#totalCharge').val(0);

            var deliveryMan = $('#deliveryMan').val();
            var type = "";
            var charge;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('deliveryManPayment.getOrderInfo') }}',
                data:{deliveryMan:deliveryMan},
                success:function(data){
                    var orderInformations = data.orderInformations;
                    $('.orderInfoRow').remove();
                    for (var orderInformation of orderInformations)
                    {
                        if (orderInformation.collection_man_id == deliveryMan)
                        {
                            type = "Collection";
                            charge = orderInformation.collection_payment;
                        }

                        if (orderInformation.delivery_man_id == deliveryMan)
                        {
                            type = "Delivery";
                            charge = orderInformation.delivery_payment;
                        }

                        $(".orderInfo tbody").append(
                            '<tr class="orderInfoRow" id="orderInfoRow_'+orderInformation.id+'">'+
                                '<td>'+
                                    orderInformation.order_no+
                                    '<input type="hidden" class="orderNo_'+orderInformation.id+'" id="orderNo_'+orderInformation.id+'" value="'+orderInformation.order_no+'" readonly>'+
                                '</td>'+
                                '<td align="right">'+
                                    type+
                                    '<input type="hidden" style="text-align: right;" class="type_'+orderInformation.id+'" id="type_'+orderInformation.id+'" value="'+type+'" readonly>'+
                                '</td>'+
                                '<td align="right">'+
                                    charge+
                                    '<input type="hidden" style="text-align: right;" class="charge_'+orderInformation.id+'" id="charge_'+orderInformation.id+'" value="'+charge+'" readonly>'+
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
            var type = $('#type_'+bookingOrderId).val();
            var charge = parseInt($('#charge_'+bookingOrderId).val());

            var totalCharge = parseInt($('#totalCharge').val());

            if ($('#orderCheck_'+bookingOrderId).is(":checked"))
            {
                totalCharge = totalCharge + charge;

                $('#totalCharge').val(totalCharge);

                $("#selectedOrders").append(
                    '<div class="block" id="block_'+bookingOrderId+'">'+
                    '<input type="text" name="orderNo[]" value="'+orderNo+'">'+
                    '<input type="text" name="type[]" value="'+type+'">'+
                    '<input type="text" name="charge[]" value="'+charge+'">'+
                    '<input type="text" name="orderId[]" value="'+bookingOrderId+'">'+
                    '</div>'
                );
            }
            else
            {
                totalCharge = totalCharge - charge;

                $('#totalCharge').val(totalCharge);

                $('#block_'+bookingOrderId).remove();
            }
        }
    </script>
@endsection