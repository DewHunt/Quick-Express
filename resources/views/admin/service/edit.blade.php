@extends('admin.layouts.masterAddEdit')

@section('card_body')
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" class="form-control" name="serviceId" value="{{ $service->id }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="name">Name</label>
                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" placeholder="Courier Type Name" name="name" value="{{ $service->name }}" required>
                    @if ($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-2">
                <label for="weighing-scale">Weighing Scale</label>
                <div class="form-group ">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" value="1" name="weighingScale" required="" {{ $service->weighing_scale == "1" ? 'checked' : '' }}> Yes
                        </label>
                    </div>

                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" value="0" name="weighingScale" {{ $service->weighing_scale == "0" ? 'checked' : '' }}> No
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <label for="upto">Upto</label>
                <div class="form-group {{ $errors->has('upto') ? ' has-danger' : '' }}">
                    <input type="number" min="0" class="form-control" placeholder="Upto Weight" id="upto" name="upto" value="{{ $service->upto }}" {{ $service->weighing_scale == "1" ? '' : 'readonly' }}>
                    @if ($errors->has('upto'))
                        @foreach($errors->get('upto') as $error)
                            <div class="form-control-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-2">
                <label for="order-by">Order By</label>
                <div class="form-group {{ $errors->has('orderBy') ? ' has-danger' : '' }}">
                    <input type="number" class="form-control" placeholder="Order By" name="orderBy" value="{{ $service->order_by }}">
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
                    <textarea class="form-control" rows="5" placeholder="Courier Type Description" name="description">{{ $service->description }}</textarea>
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

@section('custom-js')
    <script type="text/javascript">
        $('.weighingScale').click(function(event) {
            var weighingScale = $("input[name='weighingScale']:checked").val();

            if(weighingScale == 1)
            {
                $("#upto").prop('readonly',false);
            }
            else
            {
                $("#upto").val(0);
                $("#upto").prop('readonly',true);
            }
        })
    </script>
@endsection