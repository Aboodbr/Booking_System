<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Booking_system</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Local CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


        <!-- Scripts -->
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            
           
            <!-- Page Content -->
            <main>
                @yield('content')
                
            </main>
        </div>
         <footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3 mb-md-0 mb-4">
						<h2 class="footer-heading"><a href="#" class="logo">Vacation Rental</a></h2>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
						<a href="#">Read more <span class="fa fa-chevron-right" style="font-size: 11px;"></span></a>
					</div>
					<div class="col-md-6 col-lg-3 mb-md-0 mb-4">
						<h2 class="footer-heading">Services</h2>
						<ul class="list-unstyled">
              <li><a href="#" class="py-1 d-block">Map Direction</a></li>
              <li><a href="#" class="py-1 d-block">Accomodation Services</a></li>
              <li><a href="#" class="py-1 d-block">Great Experience</a></li>
              <li><a href="#" class="py-1 d-block">Perfect central location</a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-md-0 mb-4">
						<h2 class="footer-heading">Tag cloud</h2>
						<div class="tagcloud">
	            <a href="#" class="tag-cloud-link">apartment</a>
	            <a href="#" class="tag-cloud-link">home</a>
	            <a href="#" class="tag-cloud-link">vacation</a>
	            <a href="#" class="tag-cloud-link">rental</a>
	            <a href="#" class="tag-cloud-link">rent</a>
	            <a href="#" class="tag-cloud-link">house</a>
	            <a href="#" class="tag-cloud-link">place</a>
	            <a href="#" class="tag-cloud-link">drinks</a>
	          </div>
					</div>
					<div class="col-md-6 col-lg-3 mb-md-0 mb-4">
						<h2 class="footer-heading">Subcribe</h2>
						<form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control rounded-left" placeholder="Enter email address">
                <button type="submit" class="form-control submit rounded-right"><span class="sr-only">Submit</span><i class="fa fa-paper-plane"></i></button>
              </div>
            </form>
            <h2 class="footer-heading mt-5">Follow us</h2>
            <ul class="ftco-footer-social p-0">
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
            </ul>
					</div>
				</div>
			</div>
			<div class="w-100 mt-5 border-top py-5">
				<div class="container">
					<div class="row">
	          <div class="col-md-6 col-lg-8">

	            <p class="copyright mb-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	          </div>
	          <div class="col-md-6 col-lg-4 text-md-right">
	          	<p class="mb-0 list-unstyled">
	          		<a class="mr-md-3" href="#">Terms</a>
	          		<a class="mr-md-3" href="#">Privacy</a>
	          		<a class="mr-md-3" href="#">Compliances</a>
	          	</p>
	          </div>
	        </div>
				</div>
			</div>
		</footer>
   
    </body>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/scrollax.min.js') }}"></script>

<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

<!-- ملف مخصص لخريطة Google -->
<script src="{{ asset('assets/js/google-map.js') }}"></script>

<!-- ملف main -->
<script src="{{ asset('assets/js/main.js') }}"></script>

</html>
