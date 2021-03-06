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

            <table id="dataTable" class="table table-bordered table-striped" width="100%" name="areaTable">
                <thead>
                    <tr style="background: #00c292; text-align: center;">
                        <th style="font-weight: bold; vertical-align: middle;" width="10px">SL</th>
                        <th style="font-weight: bold; vertical-align: middle;" width="80px">Date</th>
                        <th style="font-weight: bold; vertical-align: middle;" width="150px">Merchant Name</th>
                        <th style="font-weight: bold; vertical-align: middle;" width="120px">Deposit Type</th>
                        <th style="font-weight: bold; vertical-align: middle;">Remarks</th>
                        <th style="font-weight: bold; vertical-align: middle;" width="140px">Payment Ammount</th>
                        <th style="font-weight: bold; vertical-align: middle;" width="60px">Status</th>
                        <th style="font-weight: bold; vertical-align: middle;" width="70px">Action</th>
                    </tr>
                </thead>
                <tbody id="">
                	@php
                		$sl = 1;
                	@endphp
                    @foreach ($merchantPayments as $merchantPayment)
                		<tr class="row_{{ $merchantPayment->id }}">
                			<td>{{ $sl++ }}</td>
                			<td align="center">{{ $merchantPayment->date == "" ? "- - -" : date('d-m-Y', strtotime($merchantPayment->date)) }}</td>
                            <td>{{ $merchantPayment->merchantName }}</td>
                            <td>{{ $merchantPayment->deposit_type }}</td>
                            <td>{{ $merchantPayment->remarks }}</td>
                            <td align="right">{{ $merchantPayment->total_balance }}</td>
                			<td align="center">
                                @php
                                    echo \App\Link::status($merchantPayment->id,$merchantPayment->status);
                                @endphp
                			</td>
                			<td>
                    			@php
                    				echo \App\Link::action($merchantPayment->id);
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

                merchantPaymentId = $(this).parent().data('id');
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
                            url : "{{ route('merchantPayment.delete') }}",
                            data : {merchantPaymentId:merchantPaymentId},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+merchantPaymentId).remove();
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
        function statusChange(merchantPaymentId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('merchantPayment.status') }}",
                data: {merchantPaymentId:merchantPaymentId},
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