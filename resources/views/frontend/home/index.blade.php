@extends('frontend.layouts.master') 

@section('content')
	@include('frontend.home.element.slider')
	@include('frontend.home.element.about')
	@include('frontend.home.element.services')
	@include('frontend.home.element.feature')
	@include('frontend.home.element.total_counter')
	@include('frontend.home.element.testimonial')
	@include('frontend.home.element.blog')
	@include('frontend.home.element.client')
@endsection