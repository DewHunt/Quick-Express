@extends('frontend.customer.index') 

@section('customer_content')
    <div class="card-body">
        <form class="crud_form" action="{{ route($formLink) }}"method="POST" enctype="multipart/form-data" name="form">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <label for="booking-date">Booking Date</label>
                    <div class="form-group">
                        <input  type="text" class="form-control add_datepicker" id="bookingDate" name="bookingDate" placeholder="Select Delivery Date" required="">
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="order-no-name">Order No</label>
                    <div class="form-group {{ $errors->has('orderNo') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" placeholder="Order No" name="orderNo" value="{{ $orderNo }}" readonly>
                        @if ($errors->has('orderNo'))
                            @foreach($errors->get('orderNo') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="sender-name">Sender Name</label>
                            <div class="form-group {{ $errors->has('senderName') ? ' has-danger' : '' }}">
                                <input type="text" class="form-control" placeholder="Sender Name" name="senderName" value="{{ Auth::guard('customer')->user()->name }}" required>
                                @if ($errors->has('senderName'))
                                    @foreach($errors->get('senderName') as $error)
                                        <div class="form-control-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="sender-phone-number">Sender Phone Number</label>
                            <div class="form-group {{ $errors->has('senderPhoneNumber') ? ' has-danger' : '' }}">
                                <input type="number" class="form-control" placeholder="Sender Phone Number" name="senderPhoneNumber" value="{{ Auth::guard('customer')->user()->phone }}" required>
                                @if ($errors->has('senderPhoneNumber'))
                                    @foreach($errors->get('senderPhoneNumber') as $error)
                                        <div class="form-control-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="sender-zone">Sender Zone</label>
                            <div class="form-group {{ $errors->has('senderZone') ? ' has-danger' : '' }}">
                                <select class="form-control chosen-select" name="senderZone" required>
                                    <option value="">Select A Zone</option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->zone_id }},{{ $zone->zone_type }}">{{ $zone->zone_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="Sender-detail-address">Sender Details Address</label>
                            <div class="form-group {{ $errors->has('senderAddress') ? ' has-danger' : '' }}">
                                <textarea class="form-control" rows="3" placeholder="Sender Details Address" name="senderAddress" required>{{ Auth::guard('customer')->user()->address }}</textarea>
                                @if ($errors->has('senderAddress'))
                                    @foreach($errors->get('senderAddress') as $error)
                                        <div class="form-control-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="receiver-name">Receiver Name</label>
                            <div class="form-group {{ $errors->has('receiverName') ? ' has-danger' : '' }}">
                                <input type="text" class="form-control" placeholder="Receiver Name" name="receiverName" value="{{ old('receiverName') }}" required>
                                @if ($errors->has('receiverName'))
                                    @foreach($errors->get('receiverName') as $error)
                                        <div class="form-control-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="receiver-phone-number">Receiver Phone Number</label>
                            <div class="form-group {{ $errors->has('receiverPhoneNumber') ? ' has-danger' : '' }}">
                                <input type="number" class="form-control" placeholder="Receiver Phone Number" name="receiverPhoneNumber" value="{{ old('receiverPhoneNumber') }}" required>
                                @if ($errors->has('receiverPhoneNumber'))
                                    @foreach($errors->get('receiverPhoneNumber') as $error)
                                        <div class="form-control-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="receiver-zone">Receiver Zone</label>
                            <div class="form-group {{ $errors->has('receiverZone') ? ' has-danger' : '' }}">
                                <select class="form-control chosen-select" name="receiverZone" required>
                                    <option value="">Select A Zone</option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->zone_id }},{{ $zone->zone_type }}">{{ $zone->zone_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="receiver-detail-address">Receiver Details Address</label>
                            <div class="form-group {{ $errors->has('receiverAddress') ? ' has-danger' : '' }}">
                                <textarea class="form-control" rows="3" placeholder="Receiver Details Address" name="receiverAddress" required></textarea>
                                @if ($errors->has('receiverAddress'))
                                    @foreach($errors->get('receiverAddress') as $error)
                                        <div class="form-control-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label for="courier-type">Courier Type</label>
                    <div class="form-group {{ $errors->has('courierTypeId') ? ' has-danger' : '' }}">
                        <select class="form-control chosen-select courierType" id="courierType" name="courierType" required>
                            <option value="">Select A Courier Type</option>
                            @foreach ($courierTypes as $courierType)
                                <option value="{{ $courierType->id }}">{{ $courierType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="courier-type-unit">Courier Type Unit</label>
                    <div class="form-group {{ $errors->has('courierTypeUnit') ? ' has-danger' : '' }}">
                        <input type="number" class="form-control" placeholder="Unit Price" id="courierTypeUnit" name="courierTypeUnit" oninput="findDeliveryCharge()" value="0" required>
                        @if ($errors->has('courierTypeUnit'))
                            @foreach($errors->get('courierTypeUnit') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="courier-type">Delivery Type</label>
                    <div class="form-group {{ $errors->has('deliveryTypeId') ? ' has-danger' : '' }}">
                        <select class="form-control chosen-select deliveryType" id="deliveryType" name="deliveryTypeId" required>
                            <option value="">Select A Delivery Type</option>
                            @foreach ($deliveryTypes as $deliveryType)
                                <option value="{{ $deliveryType->id }}">{{ $deliveryType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="delivery-type-unit">Delivery Type Unit</label>
                    <div class="form-group {{ $errors->has('deliveryTypeUnit') ? ' has-danger' : '' }}">
                        <input type="number" class="form-control" placeholder="Unit Price" id="deliveryTypeUnit" name="deliveryTypeUnit" oninput="findDeliveryCharge()" value="0" required readonly>
                        @if ($errors->has('deliveryTypeUnit'))
                            @foreach($errors->get('deliveryTypeUnit') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="qty-kg-lit">Quantity/Kg/Litre</label>
                    <div class="form-group {{ $errors->has('uom') ? ' has-danger' : '' }}">
                        <input type="number" class="form-control" placeholder="Qunatity/KG/Litre" id="uom" name="uom" oninput="findDeliveryCharge()" value="1" required>
                        @if ($errors->has('uom'))
                            @foreach($errors->get('uom') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="delivery-charge">Delivery Charge</label>
                    <div class="form-group {{ $errors->has('deliveryCharge') ? ' has-danger' : '' }}">
                        <input type="number" class="form-control" placeholder="Delivery Charge" id="deliveryCharge" name="deliveryCharge" value="0" required readonly>
                        @if ($errors->has('deliveryCharge'))
                            @foreach($errors->get('deliveryCharge') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="custom-card-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-info" value="Save">
                            <i class="la la-save"></i> {{ $buttonName }}
                        </button>
                    </div>
                </div>              
            </div>
        </form>
    </div>

    @section('custom_js')
        <script type="text/javascript">
            $(document).on('change', '#deliveryType', function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                var deliveryTypeId = $('#deliveryType').val();

                if (deliveryTypeId == "")
                {
                    $('#deliveryTypeUnit').val("0");
                }
                else
                {
                    $.ajax({
                        type:'post',
                        url:'{{ route('bookingOrder.getDeliveryTypeInfo') }}',
                        data:{deliveryTypeId:deliveryTypeId},
                        success:function(data){
                            $('#deliveryTypeUnit').val(data.deliveryTypeUnitPrice);
                            findDeliveryCharge();
                        }
                    });
                }
            });

            function findDeliveryCharge()
            {
                var deliveryCharge;

                var deliveryTypeUnitPrice = parseFloat($("#deliveryTypeUnit").val());
                var courierTypeUnitPrice = parseFloat($("#courierTypeUnit").val());
                var uom = parseFloat($("#uom").val());

                if (uom <= 0)
                {
                    $("#uom").val('1')
                    deliveryCharge = deliveryTypeUnitPrice + courierTypeUnitPrice;
                }
                else
                {
                    deliveryCharge = deliveryTypeUnitPrice + (courierTypeUnitPrice * uom);
                }

                $("#deliveryCharge").val(Math.round(deliveryCharge));
            }
        </script>
    @endsection
@endsection