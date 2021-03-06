@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" class="form-control" name="hubId" value="{{ $hub->id }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="name">Name</label>
                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Courier Type Name" name="name" value="{{ $hub->name }}" required>
                    @if ($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label for="order-by">Order By</label>
                <div class="form-group {{ $errors->has('orderBy') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Order By" name="orderBy" value="{{ $hub->order_by }}">
                    @if ($errors->has('orderBy'))
                        @foreach($errors->get('orderBy') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="description">Description</label>
                <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
                    <textarea class="form-control" rows="5" placeholder="Courier Type Description" name="description">{{ $hub->description }}</textarea>
                    @if ($errors->has('description'))
                        @foreach($errors->get('description') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection