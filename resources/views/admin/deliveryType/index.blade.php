@extends('admin.layouts.masterIndex')

@section('card_body')
    <div class="card-body">
        {{-- <div align='center'>
            <font size='7' text-align='center' color='green' face='Comic sans MS'>This Page Is Now Under Construction</font>
        </div> --}}

        <div class="table-responsive">
            @php
                $sl = 0;
            @endphp

            <table id="dataTable" class="table table-bordered table-striped"  name="areaTable">
                <thead>
                    <tr>
                        <th width="20px">SL</th>
                        <th width="200px">Name</th>
                        <th>Description</th>
                        <th width="90px">Order By</th>
                        <th width="20px">Status</th>
                        <th width="80px">Action</th>
                    </tr>
                </thead>
                <tbody id="">
                	@php
                		$sl = 1;
                	@endphp
                	@foreach ($deliveryTypes as $deliveryType)
                		<tr class="row_{{ $deliveryType->id }}">
                			<td>{{ $sl++ }}</td>
                			<td>{{ $deliveryType->name }}</td>
                            <td>{{ $deliveryType->description }}</td>
                			<td>{{ $deliveryType->order_by }}</td>
                			<td>
                                @php
                                    echo \App\Link::status($deliveryType->id,$deliveryType->status);
                                @endphp
                			</td>
                			<td>
                    			@php
                    				echo \App\Link::action($deliveryType->id);
                    			@endphp                				
                			</td>
                		</tr>
                	@endforeach
                </tbody>
            </table>
        </div>
    </div>	
@endsection

@section('custom-js')
    <script>
        $(document).ready(function() {
            var updateThis ;       

            //ajax delete code
            $('#dataTable tbody').on( 'click', 'i.fa-trash', function () {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                deliveryTypeId = $(this).parent().data('id');
                var tableRow = this;
                swal({   
                    title: "Are you sure?",   
                    text: "You will not be able to recover this information!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, delete it!",   
                    cancelButtonText: "No, cancel plx!",   
                    closeOnConfirm: false,   
                    closeOnCancel: false 
                },
                function(isConfirm){   
                    if (isConfirm) {
                        $.ajax({
                            type: "POST",
                            url : "{{ route('deliveryType.delete') }}",
                            data : {deliveryTypeId:deliveryTypeId},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+deliveryTypeId).remove();
                            },
                            error: function(response) {
                                error = "Failed.";
                                swal({
                                    title: "<small class='text-danger'>Error!</small>", 
                                    type: "error",
                                    text: error,
                                    timer: 1000,
                                    html: true,
                                });
                            }
                        });    
                    }
                    else
                    { 
                        swal({
                            title: "Cancelled", 
                            type: "error",
                            text: "This Data Is Safe :)",
                            timer: 1000,
                            html: true,
                        });    
                    } 
                });
            });
        });
                
        //ajax status change code
        function statusChange(deliveryTypeId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('deliveryType.status') }}",
                data: {deliveryTypeId:deliveryTypeId},
                success: function(response) {
                    swal({
                        title: "<small class='text-success'>Success!</small>", 
                        type: "success",
                        text: "Status Successfully Updated!",
                        timer: 1000,
                        html: true,
                    });
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