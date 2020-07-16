@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" class="form-control" name="warehouseId" value="{{ $warehouse->id }}">
            </div>
            <div class="col-md-6">
                <input type="hidden" class="form-control" name="userId" value="{{ $warehouse->user_id }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="agent-name">Warehouse Name</label>
                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Warehouse Name" name="name" value="{{ $warehouse->name }}">
                    @if ($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="contact-person-name">Contact Person Name</label>
                <div class="form-group {{ $errors->has('contactPerson') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Contact Person Name" name="contactPerson" value="{{ $warehouse->contact_person }}">
                    @if ($errors->has('contactPerson'))
                        @foreach($errors->get('contactPerson') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <label for="Phone">Phone</label>
                        <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{ $warehouse->phone }}">
                            @if ($errors->has('phone'))
                                @foreach($errors->get('phone') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="email">Email</label>
                        <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $warehouse->email }}">
                            @if ($errors->has('email'))
                                @foreach($errors->get('email') as $error)
                                    <div class="form-control-feedback">{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label for="address">Address</label>
                <div class="form-group {{ $errors->has('address') ? ' has-danger' : '' }}">
                    <textarea class="form-control" rows="5" placeholder="Warehouse's Address" name="address">{{ $warehouse->address }}</textarea>
                    @if ($errors->has('address'))
                        @foreach($errors->get('address') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection