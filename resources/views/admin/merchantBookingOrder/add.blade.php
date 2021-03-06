@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <input class="form-control" type="hidden" id="senderId" name="senderId" value="{{@$merchant_info->id}}">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="booking-date">Booking Date</label>
                <div class="form-group">
                    <input  type="text" class="form-control add_datepicker" id="bookingDate" name="bookingDate" placeholder="Select Delivery Date">
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
                <label for="cash-on-delivery">Cash On Delivery</label>
                <div class="form-group {{ $errors->has('cod') ? ' has-danger' : '' }}">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" value="Yes" id="yes" name="cod" class="cod" required> Yes
                        </label>
                    </div>

                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" value="No" id="no" name="cod" class="cod"> No
                        </label>
                    </div>
                    @if ($errors->has('cod'))
                        @foreach($errors->get('cod') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="order-no-name">Cash On Delivery Amount</label>
                <div class="form-group {{ $errors->has('codAmount') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Cash On Delivery Amount" id="codAmount" name="codAmount" value="{{ old('codAmount') }}" readonly required>
                    @if ($errors->has('codAmount'))
                        @foreach($errors->get('codAmount') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="sender-phone-number">Sender Phone Number</label>
                <div class="form-group {{ $errors->has('senderPhoneNumber') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Sender Phone Number" id="senderPhoneNumber" name="senderPhoneNumber" value="{{@$merchant_info->contact_person_phone}}" oninput="getClientInfo()" readonly>
                    @if ($errors->has('senderPhoneNumber'))
                        @foreach($errors->get('senderPhoneNumber') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="receiver-phone-number">Receiver Phone Number</label>
                <div class="form-group {{ $errors->has('receiverPhoneNumber') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Receiver Phone Number" id="receiverPhoneNumber" name="receiverPhoneNumber" value="{{ old('receiverPhoneNumber') }}" oninput="getReceiverInfo()" required>
                    @if ($errors->has('receiverPhoneNumber'))
                        @foreach($errors->get('receiverPhoneNumber') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="sender-name">Sender Name</label>
                <div class="form-group {{ $errors->has('senderName') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Sender Name" id="senderName" name="senderName" value="{{@$merchant_info->contact_person_name}}" readonly>
                    @if ($errors->has('senderName'))
                        @foreach($errors->get('senderName') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="receiver-name">Receiver Name</label>
                <div class="form-group {{ $errors->has('receiverName') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Receiver Name" id="receiverName" name="receiverName" value="{{ old('receiverName') }}" required>
                    @if ($errors->has('receiverName'))
                        @foreach($errors->get('receiverName') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="Sender-detail-address">Sender Details Address</label>
                <div class="form-group {{ $errors->has('senderAddress') ? ' has-danger' : '' }}">
                    <textarea class="form-control" rows="3" placeholder="Sender Details Address" id="senderAddress" name="senderAddress" readonly>{{@$merchant_info->address}}</textarea>
                    @if ($errors->has('senderAddress'))
                        @foreach($errors->get('senderAddress') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="receiver-detail-address">Receiver Details Address</label>
                <div class="form-group {{ $errors->has('receiverAddress') ? ' has-danger' : '' }}">
                    <textarea class="form-control" rows="3" placeholder="Receiver Details Address" id="receiverAddress" name="receiverAddress" required></textarea>
                    @if ($errors->has('receiverAddress'))
                        @foreach($errors->get('receiverAddress') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="remarks">Remarks</label>
                <div class="form-group {{ $errors->has('remarks') ? ' has-danger' : '' }}">
                    <textarea class="form-control" rows="3" placeholder="Remarks ( Wirte Other Details Here )" name="remarks"></textarea>
                    @if ($errors->has('remarks'))
                        @foreach($errors->get('remarks') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="sender-area">Sender Area</label>
                <div class="form-group {{ $errors->has('senderArea') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select" id="senderArea" name="senderArea">
                        <option value="">Select A Zone</option>
                        @foreach ($areas as $area)
                            @php
                                if ($area->id == @$merchant_info->area)
                                {
                                    $select = "selected";
                                }
                                else
                                {
                                    $select = "";
                                }                                
                            @endphp
                            <option value="{{ $area->id }}" {{ $select }}>{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" id="senderZoneId" name="senderZoneId" value="{{ @$merchant_info->agentId }}">
                <input type="hidden" id="senderZoneType" name="senderZoneType" value="Agent">
            </div>

            <div class="col-md-6">
                <label for="receiver-area">Receiver Area</label>
                <div class="form-group {{ $errors->has('receiverArea') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select" id="receiverArea" name="receiverArea">
                        <option value="">Select A Zone</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" id="receiverZoneId" name="receiverZoneId" value="">
                <input type="hidden" id="receiverZoneType" name="receiverZoneType" value="Agent">
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label for="service-type">Service Type</label>
                <div class="form-group {{ $errors->has('serviceTypeId') ? ' has-danger' : '' }}">
                    <select class="form-control select2 serviceType" id="serviceType" name="serviceTypeId" onchange="findCharge()">
                        <option value="">Select A Delivery Type</option>
                        @foreach ($serviceTypes as $serviceType)
                            <option value="{{ $serviceType->id }}">{{ $serviceType->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <label for="service-name">Service Name</label>
                <div class="form-group {{ $errors->has('courierType') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select service" id="service" name="courierType" onchange="findCharge()">
                        <option value="">Select A Courier Type</option>
                        @foreach ($services as $services)
                            <option value="{{ $services->id }}">{{ $services->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <label for="charge-name">Charge Name</label>
                <div class="form-group {{ $errors->has('chargeName') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Charge Name" id="chargeName" name="chargeName" readonly>
                    @if ($errors->has('chargeName'))
                        @foreach($errors->get('chargeName') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <label for="delivery-type">Delivery Type</label>
                <div class="form-group {{ $errors->has('deliveryTypeId') ? ' has-danger' : '' }}">
                    <select class="form-control chosen-select" name="deliveryTypeId">
                        <option value="">Select A Delivery Type</option>
                        @foreach ($deliveryTypes as $deliveryType)
                            <option title="{{ $deliveryType->description }}" value="{{ $deliveryType->id }}">{{ $deliveryType->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label for="delivery-type-unit">Delivery Charge Unit</label>
                <div class="form-group {{ $errors->has('deliveryChargeUnit') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Unit Price" id="deliveryChargeUnit" name="deliveryChargeUnit" oninput="findDeliveryCharge()" value="0">
                    @if ($errors->has('deliveryChargeUnit'))
                        @foreach($errors->get('deliveryChargeUnit') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <label for="qty-kg-lit">Kg/Litre</label>
                <div class="form-group {{ $errors->has('uom') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Qunatity/KG/Litre" id="uom" name="uom" oninput="findDeliveryCharge()" value="1" readonly>
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
                    <input type="number" class="form-control" placeholder="Delivery Charge" id="deliveryCharge" name="deliveryCharge" value="0">
                    @if ($errors->has('deliveryCharge'))
                        @foreach($errors->get('deliveryCharge') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script type="text/javascript">
        $(document).on('change', '#senderArea', function()
        {
            var areaId = $('#senderArea').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('bookingOrder.getAgentInfo') }}',
                data:{areaId:areaId},
                success:function(data){
                    $('#senderZoneId').val(data.zoneId);
                    $('#senderZoneType').val(data.zoneType);
                },
            });
        });

        $(document).on('change', '#receiverArea', function()
        {
            var areaId = $('#receiverArea').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('bookingOrder.getAgentInfo') }}',
                data:{areaId:areaId},
                success:function(data){
                    $('#receiverZoneId').val(data.zoneId);
                    $('#receiverZoneType').val(data.zoneType);
                },
            });
        });

        $('.cod').click(function(event) {
            var cod =  $("input[name='cod']:checked").val();

            if(cod == "Yes")
            {
                $("#codAmount").prop('readonly',false);
            }
            else
            {
                $("#codAmount").val(0);
                $("#codAmount").prop('readonly',true);
            }
        })

        function getReceiverInfo()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var receiverPhoneNumber = $('#receiverPhoneNumber').val();

            $.ajax({
                type:'post',
                url:'{{ route('merchantBookingOrder.getReceiverInfo') }}',
                data:{receiverPhoneNumber:receiverPhoneNumber},
                success:function(data){
                    $('#receiverName').val(data.receiverName);
                    $('#receiverAddress').val(data.receiverAddress);
                    $('#receiverZoneId').val(data.receiverAgentId);

                    if (data.receiverName)
                    {
                        $('#receiverName').prop('readonly',true);
                    }
                    else
                    {
                        $('#receiverName').prop('readonly',false);
                    }

                    if (data.receiverAreaId)
                    {
                        $('#receiverArea option').filter(function () {
                            return $(this).val() == "";
                        }).attr('selected', false).trigger('chosen:updated');

                        $('#receiverArea option').filter(function () {
                            return $(this).val() == data.receiverAreaId;
                        }).attr('selected', true).trigger('chosen:updated');
                    }
                    else
                    {
                        $('#receiverArea option').filter(function () {
                            return $(this).val() == $('#receiverArea').val();
                        }).attr('selected', false).trigger('chosen:updated');

                        $('#receiverArea option').filter(function () {
                            return $(this).val() == "";
                        }).attr('selected', true).trigger('chosen:updated');
                    }
                },
            });
        }

        function findCharge()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var serviceTypeId = $('#serviceType').val();
            var serviceId = $('#service').val();
            var clientId = $('#clientId').val();

            $.ajax({
                type:'post',
                url:'{{ route('merchantBookingOrder.getChargeInfo') }}',
                data:{
                    serviceTypeId:serviceTypeId,
                    serviceId:serviceId,
                    clientId:clientId
                },
                success:function(data){
                    $('#deliveryChargeUnit').val(data.charge);
                    $('#chargeName').val(data.chargeName);
                    findDeliveryCharge();
                }
            });
        }

        $(document).on('change', '#service', function()
        {
            var serviceTypeName = $('#service option:selected').text();
            var serviceTypeId = $('#service').val();

            if (serviceTypeName == 'Weighing Scale' || serviceTypeId == 6)
            {
                $("#uom").prop("readonly",false);
            }
            else
            {
                $("#uom").prop("readonly",true);
                $("#uom").val(1);
            }
        });

        function findDeliveryCharge()
        {
            var deliveryCharge;

            var deliveryChargeUnit = parseFloat($("#deliveryChargeUnit").val());
            var uom = parseFloat($("#uom").val());

            if (uom <= 0)
            {
                $("#uom").val('1')
                deliveryCharge = deliveryChargeUnit;
            }
            else
            {
                deliveryCharge = deliveryChargeUnit * uom;
            }

            $("#deliveryCharge").val(Math.round(deliveryCharge));
        }
    </script>
@endsection