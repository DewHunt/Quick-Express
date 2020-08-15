@extends('admin.layouts.masterIndex')

@section('custom_css')
    <style type="text/css">
        .table thead th, .table th {
            font-weight: bold;
        }
    </style>
@endsection

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-striped"  name="areaTable">
                        <thead class="thead-light">
                            <tr>
                                <th width="20px">SL</th>
                                <th width="150px">Name</th>
                                <th>Area</th>
                                <th width="20px">Status</th>
                                <th width="80px" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sl = 1;
                            @endphp
                            @foreach ($hubs as $hub)
                                <tr class="row_{{ $hub->id }}">
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $hub->name }}</td>
                                    @php
                                        if ($hub->id)
                                        {
                                            $areas = DB::table('tbl_area')->where('hub_id',$hub->id)->orderBy('name','asc')->get();
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
                                    <td style="text-align: justify;">{{ $areaName }}</td>
                                    <td>
                                        @php
                                            echo \App\Link::status($hub->id,$hub->status);
                                        @endphp
                                    </td>
                                    <td class="text-center">
                                        @php
                                            echo \App\Link::action($hub->id);
                                        @endphp                             
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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

                hubId = $(this).parent().data('id');
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
                            url : "{{ route('hubSetup.delete') }}",
                            data : {hubId:hubId},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+hubId).remove();
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
        function statusChange(hubId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('hubSetup.status') }}",
                data: {hubId:hubId},
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