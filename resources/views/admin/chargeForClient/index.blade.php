@extends('admin.layouts.masterIndex')

@section('card_body')
    <div class="card-body">
        <div class="table-responsive">
            @php
                $sl = 0;
            @endphp

            <table id="dataTable" class="table table-bordered table-striped" width="100%" name="areaTable">
                <thead>
                    <tr>
                        <th width="20px">SL</th>
                        <th>Name</th>
                        <th width="60px">Charge</th>
                        <th width="120px">Charge Per Kg</th>
                        <th width="20px">Status</th>
                        <th width="50px">Action</th>
                    </tr>
                </thead>
                <tbody id="">
                	@php
                		$sl = 1;
                	@endphp
                    @foreach ($clientCharges as $clientCharge)
                		<tr class="row_{{ $clientCharge->id }}">
                			<td>{{ $sl++ }}</td>
                            <td>{{ $clientCharge->name }}</td>
                            <td class="text-right">{{ $clientCharge->charge }}</td>
                            <td class="text-right">{{ $clientCharge->charge_per_uom == "" ? 0 : $clientCharge->charge_per_uom }}</td>
                			<td>
                                @php
                                    echo \App\Link::status($clientCharge->id,$clientCharge->status);
                                @endphp
                			</td>
                			<td>
                    			@php
                    				echo \App\Link::action($clientCharge->id);
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

                chargeId = $(this).parent().data('id');
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
                            url : "{{ route('chargeForClient.delete') }}",
                            data : {chargeId:chargeId},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+chargeId).remove();
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
        function statusChange(chargeId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('chargeForClient.status') }}",
                data: {chargeId:chargeId},
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