@extends('admin.layouts.master')

@section('custom_css')
    <style type="text/css">        
        .table-borderless th, .table-borderless td, .table-borderless thead th, .table-borderless tbody + tbody {
            border: 0;
        }

        .custom-radio-lebel {
            font-weight: bold;
            font-size: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="card" id="content_div_id">
        <div class="custom-card-header">
            <div class="row">
                <div class="col-md-7"><h4 class="custom-card-title" id="title">{{ $title }}</h4></div>

                <div class="col-md-5" style="text-align: right;">
                    <div class="form-check-inline">
                        <label class="form-check-label custom-radio-lebel">
                            <input type="radio" class="form-check-input orderOption" value="Pending Order" name="orderOption" checked>Pending Order
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label custom-radio-lebel">
                            <input type="radio" class="form-check-input orderOption" value="Collected Order" name="orderOption">Collected Order
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div id="pendingSection">
                <div class="row">
                    @foreach ($pendingDeliveries as $pendingDelivery)
                        <div class="col-md-4 py-2">
                            <div class="card h-100">
                                <div class="card-header" style="background: #c7bdbd;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span style="font-weight: bold;">Order No: </span>
                                            <span style="font-weight: bold; color: green;">{{ $pendingDelivery->order_no }}</span>                                
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body" style="background: #ececec;">
                                    <table class="table table-borderless table-sm" style="margin: 0px;">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Name</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $pendingDelivery->sender_name }}</td>
                                            </tr>

                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Phone</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $pendingDelivery->sender_phone }}</td>
                                            </tr>

                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Address</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $pendingDelivery->sender_address }}</td>
                                            </tr>

                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Type</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $pendingDelivery->deliveryTypeName }}</td>
                                            </tr>

                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Charge</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $pendingDelivery->delivery_charge }} {{ $pendingDelivery->cod == 'Yes' ? '(Cash On Delivery)' : '' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer" style="background: #c7bdbd;">
                                    <div style="text-align: right;">
                                        <button class="btn btn-outline-dark btn-sm" onclick="showModal({{ $pendingDelivery->id }});">Approve</button>

                                        <a class="btn btn-outline-dark btn-sm" href="{{ route('returnDelivery.view',$pendingDelivery->id) }}">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" style="font-weight: bold;">Return Date</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <label for="date">Date</label> --}}
                                            <div class="form-group">
                                                <input  type="text" class="form-control add_datepicker" id="date" name="date" placeholder="Select Re-Schedule Date">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button class="btn btn-outline-success btn-sm" id="rescheduleSaveBtn">Return Save</button>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="approveSection">
                <div class="row">
                    @foreach ($approvedDeliveries as $approvedDelivery)
                        <div class="col-md-4 py-2">
                            <div class="card h-100">
                                <div class="card-header" style="background: #c7bdbd;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span style="font-weight: bold;">Order No: </span>
                                            <span style="font-weight: bold; color: green;">{{ $approvedDelivery->order_no }}</span>                                
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body" style="background: #ececec;">
                                    <table class="table table-borderless table-sm" style="margin: 0px;">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Name</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $approvedDelivery->sender_name }}</td>
                                            </tr>

                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Phone</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $approvedDelivery->sender_phone }}</td>
                                            </tr>

                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Address</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $approvedDelivery->sender_address }}</td>
                                            </tr>

                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Type</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $approvedDelivery->deliveryTypeName }}</td>
                                            </tr>

                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Charge</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $approvedDelivery->delivery_charge }} {{ $approvedDelivery->cod == 'Yes' ? '(Cash On Delivery)' : '' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer" style="background: #c7bdbd;">
                                    <div style="text-align: right;">
                                        {{-- <button class="btn btn-outline-dark btn-sm" onclick="approveCollection({{ $approvedDelivery->id }})" id="btnStatus">Refuse</button> --}}

                                        <a class="btn btn-outline-dark btn-sm" href="{{ route('returnDelivery.view',$approvedDelivery->id) }}">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="card-pad"></div>
@endsection

@section('custom-js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#approveSection').hide();

            $('.orderOption').click(function(event) {
                var orderOption =  $("input[name='orderOption']:checked").val();

                if(orderOption == "Pending Order")
                {
                    $('#title').html('All Pending Collection')
                    $('#approveSection').hide();
                    $('#pendingSection').show();
                }

                if(orderOption == "Collected Order")
                {
                    $('#title').html('All Collected Collection')
                    $('#approveSection').show();
                    $('#pendingSection').hide();
                }
            })
        });

        function showModal(bookingOrderId)
        {
            $("#rescheduleSaveBtn").attr("onclick","returnDelivery("+bookingOrderId+")");
            $('#myModal').modal('show');
        }

        function returnDelivery(bookedOrderId)
        {
            var date = $('#date').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('returnDelivery.approveOrRefuseDelivery') }}',
                data:{bookedOrderId:bookedOrderId,date:date},
                success: function(response) {
                    swal({
                        title: "<small class='text-success'>Success!</small>", 
                        type: "success",
                        text: "Delivery "+response.msg+" Successfully!",
                        timer: 1000,
                        html: true,
                    });
                    setTimeout(function(){  // wait for 1 secs(2)
                        location.reload(true); // then reload the page.(3)
                    }, 1000)
                },
                error: function(response) {
                    error = "Failed.";
                    swal({
                        title: "<small class='text-danger'>Error!</small>", 
                        type: "error",
                        text: error,
                        timer: 2000,
                        html: true,
                    });
                }
            });
        }
    </script>
@endsection