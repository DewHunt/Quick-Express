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
                        <th class="head_name">Date of Birth</th>
                        <td>{{date('d-m-Y',strtotime($profile->birth_date))}}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Address</th>
                        <td>{{$profile->address}}</td>
                        <th class="head_name">NID</th>
                        <td>{{$profile->nid}}</td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
@endsection