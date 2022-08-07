<!DOCTYPE html>

<html lang="en" dir="ltr">

	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		{{-- <meta content="Hogo– Creative Admin Multipurpose Responsive Bootstrap4 Dashboard HTML Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author"> --}}
		{{-- <meta name="keywords" content="html admin template, bootstrap admin template premium, premium responsive admin template, admin dashboard template bootstrap, bootstrap simple admin template premium, web admin template, bootstrap admin template, premium admin template html5, best bootstrap admin template, premium admin panel template, admin template"/> --}}

		<!-- Favicon -->
		<link rel="icon" href="{{asset('../assets/images/brand/favicon.ico')}}" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('../assets/images/brand/favicon.ico')}}" />

		<!-- Title -->
		<title>Exam</title>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="{{asset('../assets/plugins/bootstrap/css/bootstrap.min.css')}}">

		<!-- Dashboard css -->
		<link href="{{asset('../assets/css/style.css')}}" rel="stylesheet" />
		<link href="{{asset('../assets/css/boxed.css')}}" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="{{asset('../assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

		<!-- Horizontal-menu css -->
		<link href="{{asset('../assets/plugins/horizontal-menu/dropdown-effects/fade-down.css')}}" rel="stylesheet">
		<link href="{{asset('../assets/plugins/horizontal-menu/horizontalmenu.css')}}" rel="stylesheet">

		<!--Daterangepicker css-->
		<link href="{{asset('../assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

		<!-- Rightsidebar css -->
		<link href="{{asset('../assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

		<!-- Sidebar Accordions css -->
		<link href="{{asset('../assets/plugins/accordion1/css/easy-responsive-tabs.css')}}" rel="stylesheet">

		<!-- Owl Theme css-->
		<link href="{{asset('../assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">

		<!-- Morris  Charts css-->
		<link href="{{asset('../assets/plugins/morris/morris.css')}}" rel="stylesheet" />
		<!---Sweetalert Css-->
		<link href="{{asset('assets/plugins/sweet-alert/jquery.sweet-modal.min.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet" />
		

		<!---Font icons css-->
		<link href="{{asset('../assets/plugins/iconfonts/plugin.css')}}" rel="stylesheet" />
		<link href="{{asset('../assets/plugins/iconfonts/icons.css')}}" rel="stylesheet" />
		<link  href="{{asset('../assets/fonts/fonts/font-awesome.min.css')}}" rel="stylesheet">

		<!-- Data table css -->
		<link href="{{asset('../assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('../assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		

	</head>

	<body class="app sidebar-mini rtl">
	<!-- Jquery js-->
	<script src="{{asset('../assets/js/vendors/jquery-3.2.1.min.js')}}"></script>


		<!--Global-Loader-->
		<div id="global-loader">
			<img src="{{asset('assets/images/icons/loader.svg')}}" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
				@include('theme.header')
				{{-- @include('theme.Horizontal-menu') --}}
				@if(Route::is('admin.index') )
					@include('theme.Header-submenu')

				@endif
					<!-- app-content-->
				<div id="container content-area">

					@yield('content')

				@include('theme.Right-sidebar')
				@include('theme.footer')

				</div>

      			<!-- /#page-wrapper -->

			</div>
    	</div>
		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>



		<!--Bootstrap.min js-->
		<script src="{{asset('../assets/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{asset('../assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Jquery Sparkline js-->
		<script src="{{asset('../assets/js/vendors/jquery.sparkline.min.js')}}"></script>

		<!-- Chart Circle js-->
		<script src="{{asset('../assets/js/vendors/circle-progress.min.js')}}"></script>

		<!-- Star Rating js-->
		<script src="{{asset('../assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!--Moment js-->
		<script src="{{asset('../assets/plugins/moment/moment.min.js')}}"></script>

		<!-- Daterangepicker js-->
		<script src="{{asset('../assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

		<!-- Horizontal-menu js -->
		<script src="{{asset('../assets/plugins/horizontal-menu/horizontalmenu.js')}}"></script>

		<!-- Sidebar Accordions js -->
		<script src="{{asset('../assets/plugins/accordion1/js/easyResponsiveTabs.js')}}"></script>

		<!-- Custom scroll bar js-->
		<script src="{{asset('../assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!--Owl Carousel js -->
		<script src="{{asset('../assets/plugins/owl-carousel/owl.carousel.js')}}"></script>
		<script src="{{asset('../assets/plugins/owl-carousel/owl-main.js')}}"></script>

		<!-- Rightsidebar js -->
		<script src="{{asset('../assets/plugins/sidebar/sidebar.js')}}"></script>

		{{-- <script src="{{asset('../assets/js/rangeslider.js')}}"></script> --}}


		<!-- Charts js-->
		<script src="{{asset('../assets/plugins/chart/chart.bundle.js')}}"></script>
		<script src="{{asset('../assets/plugins/chart/utils.js')}}"></script>

		<!--Time Counter js-->
		<script src="{{asset('../assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
		<script src="{{asset('../assets/plugins/counters/counter.js')}}"></script>

		<!--Morris  Charts js-->
		<script src="{{asset('../assets/plugins/morris/raphael-min.js')}}"></script>
		<script src="{{asset('../assets/plugins/morris/morris.js')}}"></script>


		<!-- Sweet alert js-->
		<script src="{{asset('assets/plugins/sweet-alert/jquery.sweet-modal.min.js')}}"></script>
		<script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
		<script src="{{asset('assets/js/sweet-alert.js')}}"></script>

		<!-- Data tables js-->
		<script src="{{asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/datatable.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/datatable-2.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
		<!-- Tabs css-->
		<link href="{{asset('assets/plugins/tabs/style.css')}}" rel="stylesheet" />


		

		<!-- Custom js-->
		<script src="{{asset('../assets/js/custom.js')}}"></script>

</body>



</html>


