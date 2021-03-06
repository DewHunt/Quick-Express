<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('/public/admin-elite/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Jquery for multi select or choose -->
<script src="{{ asset('/public/admin-elite/dist/js/chosen.jquery.js') }}"></script>

{{-- Page Plugins --}}
<script src="{{ asset('public/admin-elite/assets/node_modules/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>

<!-- date picker jquery -->
{{-- <script src="{{ asset('/public/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script> --}}


<!-- Bootstrap popper Core JavaScript -->
<script src="{{ asset('/public/admin-elite/assets/node_modules/popper/popper.min.js') }}"></script>
<script src="{{ asset('/public/admin-elite/assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('/public/admin-elite/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('/public/admin-elite/dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('/public/admin-elite/dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('/public/admin-elite/dist/js/custom.min.js') }}"></script>

<!-- icheck -->
<script src="{{ asset('public/admin-elite/assets/node_modules/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('public/admin-elite/assets/node_modules/icheck/icheck.init.js') }}"></script>

<!--stickey kit -->
<script src="{{ asset('/public/admin-elite/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ asset('/public/admin-elite/assets/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Sweet-Alert  -->
<script src="{{ asset('/public/admin-elite/assets/node_modules/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('/public/admin-elite/assets/node_modules/sweetalert/jquery.sweet-alert.custom.js') }}"></script>

<!-- switchery  -->
<script src="{{ asset('/public/admin-elite/assets/node_modules/switchery/dist/switchery.min.js') }}"></script>

<!-- Morris graph chart -->
<script src="{{ asset('/public/admin-elite/assets/node_modules/morrisjs/morris.min.js') }}"></script>

<script src="{{ asset('/public/admin-elite/assets/node_modules/morrisjs/morris.js') }}"></script>
<script src="{{ asset('/public/admin-elite/assets/node_modules/morrisjs/raphael.min.js') }}"></script>

<!-- summernote  -->
<script src="{{ asset('/public/admin-elite/assets/node_modules/summernote/dist/summernote.min.js') }}"></script>	

<!-- Summernote with Bootstrap 4  -->
<script src="{{ asset('/public/admin-elite/summernote/summernote-bs4.js') }}"></script>

<!-- tagsinput  -->
<script src="{{ asset('/public/admin-elite/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

<!-- This is Tree Menu JS  -->
<script src="{{ asset('/public/tree-menu/TreeMenu.js') }}"></script>

<!-- This is data table -->
<script src="{{ asset('/public/admin-elite/assets/node_modules/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('/public/admin-elite/js/tinymce/tinymce.min.js') }}"></script>

<!-- Print -->>
<script src="{{ asset('public/admin-elite/dist/js/pages/jquery.PrintArea.js') }}" type="text/JavaScript"></script>

 <script>
    $(document).ready(function () {
        setTimeout(function () { //$(".message").hide('blind', {}, 500)); 
            $(".message").slideUp(1000).hide(1000);
        }, 5000);

        tinymce.init({
            selector: '.tinymce',
            forced_root_block: ''
        });

        $(".chosen-select").chosen({
            search_contains: true,
            // $.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" })
        });

        // For select 2
        $(".select2").select2();
        // $('.selectpicker').selectpicker();

        // For Print Jquery Code
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
</script>


<script>
	$( function() {
		$( ".add_datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'dd-mm-yy',
		}).datepicker('setDate', 'today');

		var date = new Date();
		var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
		// var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

		$("#from_date").datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
        });
		$("#from_date").datepicker("setDate", firstDay);

		$("#to_date").datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
        });
		$("#to_date").datepicker("setDate", 'today');

		$(".datepicker").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'dd-mm-yy',
		});
	} );
</script>

<script>
    $(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });

        var table = $('#dataTable').DataTable( {
            "order": [[0, "asc"]]
        } );

        table.on('order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
        
        // $('[data-toggle="tooltip"]').tooltip();
    });
</script>

{{-- Script For GoBack Link --}}
<script type="text/javascript">
    function GoBack() {
        window.history.go(-1);
    }
</script>
