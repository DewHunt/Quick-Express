@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <label for="merchant-name">Merchant's Name</label>
                <div class="form-group {{ $errors->has('merchant') ? ' has-danger' : '' }}">
                    <select class="form-control select2 merchant" id="merchant" name="merchant" required>
                        <option value="">Select A Merchant's Name</option>
                        @foreach ($merchants as $merchant)
                            <option value="{{ $merchant->id }}">{{ $merchant->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <table class="table table-bordered table-striped gridTable" >
                        <thead>
                            <tr>
                                <th width="170px">Service Type</th>
                                <th width="200px">Service Name</th>
                                <th>Charge Name</th>
                                <th width="90px">Charge</th>
                                <th width="120px">Charge Per Kg</th>
                                <th width="90px">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <td>
                                    <select class="form-control select2 serviceType" id="serviceType_1" name="serviceTypeId[]" onchange="getChargeName(1)" required>
                                        <option value="">Select A Service Type</option>
                                        @foreach ($serviceTypes as $serviceType)
                                            <option value="{{ $serviceType->id }}">{{ $serviceType->name }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <select class="form-control select2 ser" id="service_1" name="serviceId[]" onchange="getChargeName(1)" required>
                                        <option value="">Select A Service Name</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <input type="text" class="form-control chargeName" placeholder="Charge Name" id="chargeName_1" name="chargeName[]" readonly>
                                </td>

                                <td>
                                    <input type="number" class="form-control charge" placeholder="Delivery Charge" id="charge_1" name="charge[]" value="0">
                                </td>

                                <td>
                                    <input type="number" class="form-control chargePerUom" placeholder="Delivery Charge Per Kg" id="chargePerUom_1" name="chargePerUom[]" value="0">
                                </td>

                                <td align="center">
                                    <input type="hidden" class="row-count" value="1">
                                    <span class="btn btn-outline-success btn-sm add-item" onclick="addItem()" style="width: 100%;">
                                        <i class="fa fa-plus-circle"></i>
                                    </span>
                                    {{-- <span class="btn btn-outline-danger btn-sm remove-item" onclick="removeItem()" style="width: 40px;">
                                        <i class="fa fa-minus-circle"></i>
                                    </span> --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script type="text/javascript">
        function addItem()
        {
            var rowcount = $('.row-count').val();
            var total = parseInt(rowcount) + 1;

            $(".gridTable tbody").append(
                '<tr id="itemRow_'+total+'">'+
                    '<td>'+
                        '<div id="service_type_select_menu_'+total+'">'+                                    
                            '<select class="form-control select2 serviceType" id="serviceType_'+total+'" name="serviceTypeId[]" onchange="getChargeName('+total+')" required>'+
                                '<option value="">Select Account Name</option>'+
                            '</select>'+
                        '</div>'+
                    '</td>'+

                    '<td>'+
                        '<div id="service_name_select_menu_'+total+'">'+                                    
                            '<select class="form-control select2 service" id="service_'+total+'" name="serviceId[]" onchange="getChargeName('+total+')" required>'+
                                '<option value="">Select Account Name</option>'+
                            '</select>'+
                        '</div>'+
                    '</td>'+

                    '<td>'+
                        '<input type="text" class="form-control chargeName" placeholder="Charge Name" id="chargeName_'+total+'" name="chargeName[]" readonly>'+
                    '</td>'+

                    '<td>'+
                        '<input type="number" class="form-control charge" placeholder="Delivery Charge" id="charge_'+total+'" name="charge[]" value="0">'+
                    '</td>'+

                    '<td>'+
                        '<input type="number" class="form-control chargePerUom" placeholder="Delivery Charge Per Kg" id="chargePerUom_'+total+'" name="chargePerUom[]" value="0">'+
                    '</td>'+

                    '<td align="center">'+
                        '<span class="btn btn-outline-success btn-sm add-item" onclick="addItem()" style="width: 40px;">'+
                            '<i class="fa fa-plus-circle"></i>'+
                        '</span>'+
                        ' <span class="btn btn-outline-danger btn-sm remove-item" onclick="removeItem('+total+')" style="width: 40px;">'+
                            '<i class="fa fa-minus-circle"></i>'+
                        '</span>'+
                    '</td>'+
                '</tr>'
            );
            $('.row-count').val(total);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('chargeForMerchant.getServiceInfo') }}",
                data:{total:total},
                success: function(data) {
                    $('#service_type_select_menu_'+total).html(data.serviceType);
                    $('#service_name_select_menu_'+total).html(data.serviceName);
                    $(".select2").select2();
                },
                error: function(data) {

                }
            });
        }

        function removeItem(i)
        {
            $('#itemRow_'+i).remove();
        }

        function getChargeName(i)
        {
            var deliveryCharge;

            if ($('#serviceType_'+i).val())
            {
                var serviceTypeName = $('#serviceType_'+i+' option:selected').text();
            }
            else
            {
                var serviceTypeName = '';
            }

            if ($('#service_'+i).val())
            {
                var serviceName = $('#service_'+i+' option:selected').text();
            }
            else
            {
                var serviceName = '';
            }

            var chargeName = serviceTypeName + ' - ' + serviceName;

            $('#chargeName_'+i).val(chargeName);
        }
    </script>
@endsection