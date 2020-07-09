@extends('frontend.biker.index') 

@section('biker_content')
    <div class="card-body">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6 text-right">
                    <a style="font-size: 16px;" class="btn btn-info" href="{{ route('biker.editProfile') }}">
                        <i class="las la-plus-circle"></i> Edit Profile
                    </a>                  
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                @if(file_exists($profile->image))
                    <img src="{{ asset($profile->image) }}" style="height: 120px;">
                @endif
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-sm booking_info">
                <tbody>
                    <thead>
                        <tr>
                            <th colspan="6" class="text-center">Profile Information</th>
                        </tr>
                    </thead>
                    <tr>
                        <th class="head_name">Name</th>
                        <td>{{$profile->name}}</td>
                        <th class="head_name">Phone No</th>
                        <td>{{$profile->phone}}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Email Address</th>
                        <td>{{$profile->email}}</td>
                        <th class="head_name">NID</th>
                        <td>{{$profile->nid}}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Driving Licence</th>
                        <td>{{$profile->driving_licence}}</td>
                        <th class="head_name">Bike Registration</th>
                        <td>{{$profile->bike_registration_no}}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Address</th>
                        <td>{{$profile->address}}</td>
                        <th class="head_name">Preferred Area</th>
                        <td>{{$profile->area_id}}</td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
@endsection