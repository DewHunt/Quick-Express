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
                <form class="form-horizontal" action="#">
                    <div class="form-group {{ $errors->has('cod') ? ' has-danger' : '' }}">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" value="1" name="area" class="area" required checked> Show All Area
                            </label>
                        </div>

                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" value="2" name="area" class="area"> Show Hub Wise Area
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row" id="hubs">
            {{-- <div class="col-md-12">
                <form class="form-horizontal" action="#" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
                    <label for="hubs">Hubs</label>
                    <div class="form-group {{ $errors->has('hub') ? ' has-danger' : '' }}">
                        <select class="form-csontrol select2" id="hub" name="hub" required>
                            <option value="">Show A Hub</option>
                            @foreach ($hubs as $hub)
                                <option value="{{$hub->id}}">{{$hub->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('hub'))
                            @foreach($errors->get('hub') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </form>
            </div>

            <div class="col-md-12" id="showAreas">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td class="text-center">Please Select A Hub</td>
                    </tr>
                </table>
            </div> --}}

            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="#">
                            <label for="hubs">Hubs</label>
                            <div class="form-group {{ $errors->has('hub_01') ? ' has-danger' : '' }}">
                                <select class="form-csontrol select2" id="hub_01" name="hub_01" required>
                                    <option value="">Show A Hub</option>
                                    @foreach ($hubs as $hub)
                                        <option value="{{$hub->id}}">{{$hub->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive" id="area_01">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td class="text-center">Please Select A Hub</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="#">
                            <label for="hubs">Hubs</label>
                            <div class="form-group {{ $errors->has('hub_02') ? ' has-danger' : '' }}">
                                <select class="form-csontrol select2" id="hub_02" name="hub_02" required>
                                    <option value="">Show A Hub</option>
                                    @foreach ($hubs as $hub)
                                        <option value="{{$hub->id}}">{{$hub->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive" id="area_02">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td class="text-center">Please Select A Hub</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="#">
                            <label for="hubs">Hubs</label>
                            <div class="form-group {{ $errors->has('hub_03') ? ' has-danger' : '' }}">
                                <select class="form-csontrol select2" id="hub_03" name="hub_03" required>
                                    <option value="">Show A Hub</option>
                                    @foreach ($hubs as $hub)
                                        <option value="{{$hub->id}}">{{$hub->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive" id="area_03">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td class="text-center">Please Select A Hub</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="#">
                            <label for="hubs">Hubs</label>
                            <div class="form-group {{ $errors->has('hub_04') ? ' has-danger' : '' }}">
                                <select class="form-csontrol select2" id="hub_04" name="hub_04" required>
                                    <option value="">Show A Hub</option>
                                    @foreach ($hubs as $hub)
                                        <option value="{{$hub->id}}">{{$hub->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive" id="area_04">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td class="text-center">Please Select A Hub</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="allArea">
            @php
                $sl = 1;
            @endphp

            <div class="col-md-3">
                <div class="table-responsive">
                    <table id="table_01" class="table table-bordered table-striped areaTable"  name="areaTable">
                        <thead class="thead-light">
                            <tr>
                                <th width="20px">SL</th>
                                <th>Name</th>
                                <th width="60px" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas_01 as $area_01)
                                <tr class="row_{{ $area_01->id }}">
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $area_01->name }}</td>
                                    <td class="text-center">
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

            <div class="col-md-3">
                <div class="table-responsive">
                    <table id="table_02" class="table table-bordered table-striped areaTable"  name="areaTable">
                        <thead class="thead-light">
                            <tr>
                                <th width="20px">SL</th>
                                <th>Name</th>
                                <th width="60px" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas_02 as $area_02)
                                <tr class="row_{{ $area_02->id }}">
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $area_02->name }}</td>
                                    <td class="text-center">
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

            <div class="col-md-3">
                <div class="table-responsive">
                    <table id="table_03" class="table table-bordered table-striped areaTable"  name="areaTable">
                        <thead class="thead-light">
                            <tr>
                                <th width="20px">SL</th>
                                <th>Name</th>
                                <th width="60px" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="">
                            @foreach ($areas_03 as $area_03)
                                <tr class="row_{{ $area_03->id }}">
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $area_03->name }}</td>
                                    <td class="text-center">
                                        @php
                                            echo \App\Link::action($area_03->id);
                                        @endphp                             
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-3">
                <div class="table-responsive">
                    <table id="table_04" class="table table-bordered table-striped areaTable"  name="areaTable">
                        <thead class="thead-light">
                            <tr>
                                <th width="20px">SL</th>
                                <th>Name</th>
                                <th width="60px" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="">
                            @foreach ($areas_04 as $area_04)
                                <tr class="row_{{ $area_04->id }}">
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $area_04->name }}</td>
                                    <td class="text-center">
                                        @php
                                            echo \App\Link::action($area_04->id);
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
        $("#allArea").show();
        $("#hubs").hide(0);

        $('.area').click(function(event) {
            var area =  $("input[name='area']:checked").val();

            if(area == 1)
            {
                $("#allArea").show();
                $("#hubs").hide(0);
            }
            else
            {
                $("#allArea").hide();
                $("#hubs").show(0);
            }
        })

        // $(document).on('change', '#hub', function()
        // {
        //     var hubId = $('#hub').val();

        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         type:'post',
        //         url:'{{ route('areaSetup.getAreaInfo') }}',
        //         data:{hubId:hubId},
        //         success:function(data){
        //             $('#showAreas').html(data);
        //         },
        //     });
        // });

        $(document).on('change', '#hub_01', function()
        {
            var hubId = $('#hub_01').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('areaSetup.getAreaInfo') }}',
                data:{hubId:hubId},
                success:function(data){
                    $('#area_01').html(data);
                },
            });
        });

        $(document).on('change', '#hub_02', function()
        {
            var hubId = $('#hub_02').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('areaSetup.getAreaInfo') }}',
                data:{hubId:hubId},
                success:function(data){
                    $('#area_02').html(data);
                },
            });
        });

        $(document).on('change', '#hub_03', function()
        {
            var hubId = $('#hub_03').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('areaSetup.getAreaInfo') }}',
                data:{hubId:hubId},
                success:function(data){
                    $('#area_03').html(data);
                },
            });
        });

        $(document).on('change', '#hub_04', function()
        {
            var hubId = $('#hub_04').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ route('areaSetup.getAreaInfo') }}',
                data:{hubId:hubId},
                success:function(data){
                    $('#area_04').html(data);
                },
            });
        });

        $(document).ready(function() {
            var updateThis ;

            //ajax delete code
            $('.areaTable tbody').on( 'click', 'i.fa-trash', function () {
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
    </script>
@endsection