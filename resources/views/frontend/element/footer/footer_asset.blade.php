<!-- Jquery Library -->
	<script src="{{ asset('public/frontend/asset/js/jquery-2.min.js') }}"></script>

	<!-- Bootstrap Js -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Jquery for multi select or choose -->
	<script src="{{ asset('/public/admin-elite/dist/js/chosen.jquery.js') }}"></script>

	<script src="{{ asset('public/frontend/asset/js/bootstrap.bundle.js') }}"></script>

	<!-- Owl Carousel js -->
	<script src="{{ asset('public/frontend/asset/js/owl.carousel.min.js') }}"></script>

	<!-- Smooth Scroll Js -->
	<script src="{{ asset('public/frontend/asset/js/smooth-scroll.js') }}"></script>

	<!-- Navigation JS -->
	<script src="{{ asset('public/frontend/asset/js/menumaker.js') }}"></script>

	<!-- Way Points JS -->
	<script src="{{ asset('public/frontend/asset/js/waypoints.min.js') }}"></script>

	<!-- Counter Up JS -->
	<script src="{{ asset('public/frontend/asset/js/jquery.counterup.js') }}"></script>

	<!-- Sticky JS -->
	<script src="{{ asset('public/frontend/asset/js/jquery.sticky.js') }}"></script>

	<!-- Slicknav JS -->
	<script src="{{ asset('public/frontend/asset/js/jquery.slicknav.min.js') }}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>

	<script src="{{ asset('/public/admin-elite/assets/node_modules/sweetalert/sweetalert.min.js') }}"></script>
	<script src="{{ asset('/public/admin-elite/assets/node_modules/sweetalert/jquery.sweet-alert.custom.js') }}"></script>

	<!-- Mail Chimp JS -->
	<script src="{{ asset('public/frontend/asset/vendor/mailchimp/jquery.ajaxchimp.js') }}"></script>
	
	<!-- Main JS -->
	<script src="{{ asset('public/frontend/asset/js/theme.js') }}"></script>

	<!-- This is data table -->
	<script src="{{ asset('/public/admin-elite/assets/node_modules/datatables/jquery.dataTables.min.js') }}"></script>


	<!-- end JS -->
	@yield('custom_js')
	<script>
		$( function() {
			$( ".add_datepicker" ).datetimepicker({
	            format: 'DD-MM-YYYY',
	        	viewMode: 'years'
	       });

			$(".datepicker").datetimepicker({
	            format: 'DD-MM-YYYY',
	            viewMode: 'years'
	        });
		} );
	</script>

	<script type="text/javascript">
		$(".chosen-select").chosen({search_contains: true});
	</script>

	<script>
	    $(document).ready(function() {
	        var updateThis ;

	        // Switchery
	        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
	        $('.js-switch').each(function() {
	            new Switchery($(this)[0], $(this).data());
	        });

	        var table = $('#dataTable').DataTable( {
	            "orderable": false,
	            "bSort" : false,
	            "pageLength": 25,
	        } );
	        table.on( 'order.dt search.dt', function () {
	            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
	                cell.innerHTML = i+1;
	            } );
	        } ).draw();

	    });
	                
</script>