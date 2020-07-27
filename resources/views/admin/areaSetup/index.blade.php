@extends('admin.layouts.masterIndex')

@section('custom_css')
    <style type="text/css">
        .dataTables_filter input {
            width: 100px;
        }
    </style>
@endsection

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="table-responsive">
                    @php
                        $sl = 0;
                    @endphp

                    <table id="dataTable_00" class="table table-bordered table-striped"  name="areaTable">
                        <thead>
                            <tr>
                                <th width="20px">SL</th>
                                <th>Name</th>
                                <th width="80px">Action</th>
                            </tr>
                        </thead>
                        <tbody id="">
                            @php
                                $sl = 1;
                            @endphp
                            @foreach ($areas_00 as $area_00)
                                <tr class="row_{{ $area_00->id }}">
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $area_00->name }}</td>
                                    <td>
                                        @php
                                            echo \App\Link::action($area_00->id);
                                        @endphp                             
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4">
                <div class="table-responsive">
                    @php
                        $sl = 0;
                    @endphp

                    <table id="dataTable_01" class="table table-bordered table-striped"  name="areaTable">
                        <thead>
                            <tr>
                                <th width="20px">SL</th>
                                <th>Name</th>
                                <th width="80px">Action</th>
                            </tr>
                        </thead>
                        <tbody id="">
                            @php
                                $sl = 1;
                            @endphp
                            @foreach ($areas_01 as $area_01)
                                <tr class="row_{{ $area_01->id }}">
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $area_01->name }}</td>
                                    <td>
                                        @php
                                            echo \App\Link::action($area_01->id);
                                        @endphp                             
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4">
                <div class="table-responsive">
                    @php
                        $sl = 0;
                    @endphp

                    <table id="dataTable_02" class="table table-bordered table-striped"  name="areaTable">
                        <thead>
                            <tr>
                                <th width="20px">SL</th>
                                <th>Name</th>
                                <th width="80px">Action</th>
                            </tr>
                        </thead>
                        <tbody id="">
                            @php
                                $sl = 1;
                            @endphp
                            @foreach ($areas_02 as $area_02)
                                <tr class="row_{{ $area_02->id }}">
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $area_02->name }}</td>
                                    <td>
                                        @php
                                            echo \App\Link::action($area_02->id);
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

            var table_00 = $('#dataTable_00').DataTable( {
                "order": [[0, "asc"]]
            } );

            table_00.on('order.dt search.dt', function () {
                table_00.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();

            var table_01 = $('#dataTable_01').DataTable( {
                "order": [[0, "asc"]]
            } );

            table_01.on('order.dt search.dt', function () {
                table_01.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();

            var table_02 = $('#dataTable_02').DataTable( {
                "order": [[0, "asc"]]
            } );

            table_02.on('order.dt search.dt', function () {
                table_02.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();

            //ajax delete code
            $('#dataTable_00 tbody').on( 'click', 'i.fa-trash', function () {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                areaId = $(this).parent().data('id');
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
                            url : "{{ route('areaSetup.delete') }}",
                            data : {areaId:areaId},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+areaId).remove();
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

            //ajax delete code
            $('#dataTable_01 tbody').on( 'click', 'i.fa-trash', function () {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                areaId = $(this).parent().data('id');
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
                            url : "{{ route('areaSetup.delete') }}",
                            data : {areaId:areaId},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+areaId).remove();
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

            //ajax delete code
            $('#dataTable_02 tbody').on( 'click', 'i.fa-trash', function () {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                areaId = $(this).parent().data('id');
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
                            url : "{{ route('areaSetup.delete') }}",
                            data : {areaId:areaId},
                           
                            success: function(response) {
                                swal({
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Deleted Successfully!",
                                    timer: 1000,
                                    html: true,
                                });
                                $('.row_'+areaId).remove();
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
        function statusChange(areaId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('areaSetup.status') }}",
                data: {areaId:areaId},
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