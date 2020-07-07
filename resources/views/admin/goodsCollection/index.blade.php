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
                    @foreach ($pendingCollections as $pendingCollection)
                        <div class="col-md-4 py-2">
                            <div class="card h-100">
                                <div class="card-header" style="background: #c7bdbd;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span style="font-weight: bold;">Order No: </span>
                                            <span style="font-weight: bold; color: green;">{{ $pendingCollection->order_no }}</span>                                
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body" style="background: #ececec;">
                                    <table class="table table-borderless table-sm" style="margin: 0px;">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Name</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $pendingCollection->sender_name }}</td>
                                            </tr>

                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Phone</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $pendingCollection->sender_phone }}</td>
                                            </tr>

                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Address</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $pendingCollection->sender_address }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer" style="background: #c7bdbd;">
                                    <div style="text-align: right;">
                                        <button class="btn btn-outline-dark btn-sm" onclick="approveCollection({{ $pendingCollection->id }})" id="btnStatus">Approve</button>

                                        <a class="btn btn-outline-dark btn-sm" href="{{ route('goodsCollection.view',$pendingCollection->id) }}">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="approveSection">
                <div class="row">
                    @foreach ($approvedCollections as $approvedCollection)
                        <div class="col-md-4 py-2">
                            <div class="card h-100">
                                <div class="card-header" style="background: #c7bdbd;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span style="font-weight: bold;">Order No: </span>
                                            <span style="font-weight: bold; color: green;">{{ $approvedCollection->order_no }}</span>                                
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body" style="background: #ececec;">
                                    <table class="table table-borderless table-sm" style="margin: 0px;">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Name</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $approvedCollection->sender_name }}</td>
                                            </tr>

                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Phone</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $approvedCollection->sender_phone }}</td>
                                            </tr>

                                            <tr>
                                                <td style="font-weight: bold;" width="80px">Address</td>
                                                <td style="font-weight: bold;" width="10px">:</td>
                                                <td style="color: blue;">{{ $approvedCollection->sender_address }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer" style="background: #c7bdbd;">
                                    <div style="text-align: right;">
                                        <button class="btn btn-outline-dark btn-sm" onclick="approveCollection({{ $approvedCollection->id }})" id="btnStatus">Refuse</button>

                                        <a class="btn btn-outline-dark btn-sm" href="{{ route('goodsCollection.view',$approvedCollection->id) }}">
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

        function approveCollection(bookedOrderId)
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('goodsCollection.approveOrRefuseCollection') }}',
                data:{bookedOrderId:bookedOrderId},
                success: function(response) {
                    swal({
                        title: "<small class='text-success'>Success!</small>", 
                        type: "success",
                        text: "Collection "+response.msg+" Successfully!",
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