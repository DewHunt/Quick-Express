@extends('frontend.merchant.index') 

@section('merchant_content')
    <div class="card-body">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6 text-right">
                    <a style="font-size: 16px;" class="btn btn-info" href="{{ route('merchant.editProfile') }}">
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
                        <th class="head_name">Owner Name</th>
                        <td>{{$profile->name}}</td>
                        <th class="head_name">Contact Person Name</th>
                        <td>{{$profile->contact_person_name}}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Contact Person Number</th>
                        <td>{{$profile->contact_person_phone}}</td>
                        <th class="head_name">Contact Person Email</th>
                        <td>{{$profile->contact_person_email}}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Trade Licence</th>
                        <td>{{$profile->trade_licence_no}}</td>
                        <th class="head_name">Address</th>
                        <td>{{$profile->address}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection