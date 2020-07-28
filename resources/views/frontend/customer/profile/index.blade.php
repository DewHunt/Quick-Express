@extends('frontend.customer.index') 

@section('customer_content')
    <div class="card-body">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6 text-right">
                    <a style="font-size: 16px;" class="btn btn-info" href="{{ route('user.editProfile') }}">
                        <i class="las la-plus-circle"></i> Edit Profile
                    </a>                  
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-borderless table-sm booking_info">
                <thead>
                    <tr>
                        <th colspan="7" class="text-center">Profile Information</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th class="head_name" style="width: 110px;">Name</th>
                        <td width="10px">:</td>
                        <td>{{$profile->name}}</td>
                        <th class="head_name" style="width: 110px;">Phone No</th>
                        <td width="10px">:</td>
                        <td>{{$profile->phone}}</td>
                        <td rowspan="3" width="120px">
                            @if(file_exists($profile->image))
                                <img src="{{ asset($profile->image) }}" style="height: 120px;">
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="head_name" style="width: 110px;">Email Address</th>
                        <td width="10px">:</td>
                        <td>{{$profile->email}}</td>
                        <th class="head_name" style="width: 110px;">Date of Birth</th>
                        <td width="10px">:</td>
                        <td>{{date('d-m-Y',strtotime($profile->birth_date))}}</td>
                    </tr>

                    <tr>
                        <th class="head_name" style="width: 110px;">Address</th>
                        <td width="10px">:</td>
                        <td>{{$profile->address}}</td>
                        <th class="head_name" style="width: 110px;">NID</th>
                        <td width="10px">:</td>
                        <td>{{$profile->nid}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection