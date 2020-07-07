<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="MobileOptimized" content="320" />

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="title" content="{{ @$metaTag['meta_title'] }}">
	<meta name="keywords" content="{{ @$metaTag['meta_keyword'] }}">
	<meta name="description" content="{{ @$metaTag['meta_keyword'] }}" />
	<meta name="author" content="{{@$website_information->website_name}}" />

	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

	<!-- Favicon -->
	<link rel="icon" type="image/icon" href="{{ asset('/').@$website_information->fav_icon }}">

	{{-- website title --}}
	<title>
		{{@$website_information->website_name}} 
		@if(@$title) {{@$website_information->prefix_title}} @endif {{ @$title }}
	</title>

	@include('frontend.element.header.header_asset')
</head>

	<body>
		<div class="preloader">
			<div class="spinner">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
		</div>

		@include('frontend.element.header.header_top')
		@include('frontend.element.header.header_menu')

		@yield('content')

		<!-- footer start-->
		<footer id="footer" class="footer-main-block">
			@include('frontend.element.footer.footer_top')
			@include('frontend.element.footer.footer_bottom')
		</footer>

		<!-- Scroll Top Area -->
		<a href="#top" class="go-top" style="display: block;"><i class="las la-angle-up"></i></a>

		@include('frontend.element.footer.footer_asset')
	</body>
</html>