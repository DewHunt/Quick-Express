@extends('admin.layouts.master')

@section('title')
    <title>{{ $title }}</title>
@endsection

@section('custom-css')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
	<div class="card">
		<div class="card-body">
			@if ($userRole == 2)
				<h1 style="text-align: center">Super User</h1>
			@elseif ($userRole == 3)
				<h1 style="text-align: center">Admin</h1>
			@elseif ($userRole == 4)
				<h1 style="text-align: center">User</h1>
			@elseif ($userRole == 8)
				<h1 style="text-align: center">Agent</h1>
				{{-- @include('admin/customerRegistraionSetup/element/add/personal_information') --}}
			@elseif ($userRole == 10)
				<h1 style="text-align: center">Subagent</h1>
			@elseif ($userRole == 11)
				<h1 style="text-align: center">Warehouse</h1>
			@elseif ($userRole == 12)
				<h1 style="text-align: center">Marchant</h1>
			{{-- @else --}}
			@endif
		</div>
	</div>
{{-- @endsection --}}