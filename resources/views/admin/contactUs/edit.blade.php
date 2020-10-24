@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" class="form-control" name="contactId" value="{{ $contactInfo->id }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="name">Head / Branch Office Name</label>
                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Head / Branch Office Name" name="name" value="{{ $contactInfo->name }}">
                    @if ($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <label for="contact-person-name">Contact Person Name</label>
                <div class="form-group {{ $errors->has('contactPerson') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Contact Person Name" name="contactPerson" value="{{ $contactInfo->contact_person }}" required>
                    @if ($errors->has('contactPerson'))
                        @foreach($errors->get('contactPerson') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <label for="order-by">Order By</label>
                <div class="form-group {{ $errors->has('orderBy') ? ' has-danger' : '' }}">
                    <input type="number" min="1" class="form-control" placeholder="Contact Person Name" name="orderBy" value="{{ $contactInfo->order_by }}">
                    @if ($errors->has('orderBy'))
                        @foreach($errors->get('orderBy') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label for="phone-number-one">Phone Number One</label>
                <div class="form-group {{ $errors->has('phoneOne') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Phone Number One" name="phoneOne" value="{{ $contactInfo->phone_one }}">
                    @if ($errors->has('phoneOne'))
                        @foreach($errors->get('phoneOne') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <label for="phone-number-two">Phone Number Two</label>
                <div class="form-group {{ $errors->has('phoneTwo') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Phone Number Two" name="phoneTwo" value="{{ $contactInfo->phone_two }}">
                    @if ($errors->has('phoneTwo'))
                        @foreach($errors->get('phoneTwo') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <label for="phone-number-three">Phone Number Three</label>
                <div class="form-group {{ $errors->has('phoneThree') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Phone Number Three" name="phoneThree" value="{{ $contactInfo->phone_three }}">
                    @if ($errors->has('phoneThree'))
                        @foreach($errors->get('phoneThree') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <label for="phone-number-four">Phone Number Four</label>
                <div class="form-group {{ $errors->has('phoneFour') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Phone Number Four" name="phoneFour" value="{{ $contactInfo->phone_four }}">
                    @if ($errors->has('phoneFour'))
                        @foreach($errors->get('phoneFour') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label for="email-one">Email One</label>
                <div class="form-group {{ $errors->has('emailOne') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Email One" name="emailOne" value="{{ $contactInfo->email_one }}">
                    @if ($errors->has('emailOne'))
                        @foreach($errors->get('emailOne') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <label for="email-two">Email Two</label>
                <div class="form-group {{ $errors->has('emailTwo') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Email Two" name="emailTwo" value="{{ $contactInfo->email_two }}">
                    @if ($errors->has('emailTwo'))
                        @foreach($errors->get('emailTwo') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                <label for="email-three">Email Three</label>
                <div class="form-group {{ $errors->has('emailThree') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Email Three" name="emailThree" value="{{ $contactInfo->email_three }}">
                    @if ($errors->has('emailThree'))
                        @foreach($errors->get('emailThree') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                <label for="email-four">Email Four</label>
                <div class="form-group {{ $errors->has('emailFour') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Email Four" name="emailFour" value="{{ $contactInfo->email_four }}">
                    @if ($errors->has('emailFour'))
                        @foreach($errors->get('emailFour') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="address">Address</label>
                <div class="form-group {{ $errors->has('address') ? ' has-danger' : '' }}">
                    <textarea class="form-control" rows="3" placeholder="Warehouse's Address" name="address">{{ $contactInfo->address }}</textarea>
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