@extends('admin.layouts.masterIndex')

@section('card_body')
@php 
    use App\AreaSetup;
@endphp
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
                        <th width="150px">Agent Name</th>
                        <th width="100px">Phone</th>
                        <th>Business Area</th>
                        
                        <th width="20px">Status</th>
                        <th width="80px">Action</th>
                    </tr>
                </thead>
                <tbody id="">
                	@php
                		$sl = 1;
                	@endphp
                	@foreach ($agents as $agent)
                        @php
                            // $getAreaList = AreaSetup::whereIn('id', explode(',', $agent->area))->get();
                            if ($agent->hub_id)
                            {
                                $areas = DB::table('tbl_area')->where('hub_id',$agent->hub_id)->orderBy('name','asc')->get();
                            }
                            else
                            {
                                $areas = [];
                            }
                            
                            $areaArray = [];
                            foreach ($areas as $area)
                            {
                                array_push($areaArray, $area->name);
                            }

                            $areaName = implode(', ', $areaArray);
                        @endphp
                		<tr class="row_{{ $agent->id }}">
                			<td>{{ $sl++ }}</td>
                			<td>{{ $agent->name }}</td>
                            <td>{{ $agent->phone }}</td>
                			<td style="text-align: justify;">{{ $areaName }}</td>
                			<td>
                                @php
                                    echo \App\Link::status($agent->id,$agent->status);
                                @endphp
                			</td>
                			<td>
                    			@php
                    				echo \App\Link::action($agent->id);
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

                agentId = $(this).parent().data('id');
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
                            url : "{{ route('agent.delete') }}",
                            data : {agentId:agentId},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+agentId).remove();
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
        function statusChange(agentId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('agent.status') }}",
                data: {agentId:agentId},
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