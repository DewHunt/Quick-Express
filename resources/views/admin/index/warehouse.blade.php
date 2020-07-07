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
			<h1 style="text-align: center">Warehouse User</h1>
		</div>
	</div>
@endsection