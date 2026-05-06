<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Damas Hotel - @yield('title', 'Luxury Stay')</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
    
    <!-- Font Awesome 6.4.0 (Icons for Nav) & 4.7.0 (Template Support) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        .wrap {
            background: #1a1a1a !important;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .wrap .phone a, .wrap .phone i {
            color: #fff !important;
            font-size: 13px;
        }
        .wrap .phone i {
            color: #fd7792 !important;
            margin-right: 5px;
        }
        .social-media a {
            color: #fff !important;
            background: rgba(255,255,255,0.1) !important;
            border-radius: 4px;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            display: inline-block;
            transition: 0.3s;
        }
        .social-media a:hover {
            background: #fd7792 !important;
            transform: translateY(-3px);
        }
        .navbar-brand {
            color: #1a1a1a !important;
            font-weight: 800 !important;
            text-transform: uppercase;
        }
        .navbar-brand span {
            color: #fd7792 !important;
        }
        .ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
            color: #444 !important;
            font-weight: 500;
            display: flex;
            align-items: center;
        }
        .ftco-navbar-light .navbar-nav > .nav-item > .nav-link i {
            color: #fd7792 !important;
            margin-right: 7px;
            font-size: 14px;
        }
        .ftco-navbar-light .navbar-nav > .nav-item.active > a {
            color: #fd7792 !important;
        }
        .btn-book {
            background: #fd7792 !important;
            border: 1px solid #fd7792 !important;
            color: #fff !important;
            padding: 10px 25px !important;
            border-radius: 5px;
            font-weight: 700;
            transition: 0.3s all ease;
            margin-top: 25% !important; /* تم تعديله ليتناسب مع النافيجيشن */
        }
        .btn-book:hover {
            background: #e0607a !important;
            transform: scale(1.05);
        }
        .footer {
            background: #1a1a1a !important;
            padding: 7em 0;
        }
        .footer .footer-heading {
            color: #fff;
            font-size: 20px;
            font-weight: 700;
        }
        .footer .footer-heading .logo {
            color: #fff;
        }
        .footer .footer-heading .logo span {
            color: #fd7792;
        }
        .footer p {
            color: rgba(255,255,255,0.7);
        }
        .footer .list-unstyled li a {
            color: rgba(255,255,255,0.7);
        }
        .footer .list-unstyled li a i {
            color: #fd7792;
        }
        .footer .list-unstyled li a:hover {
            color: #fd7792;
        }
        .footer .block-23 ul li, .footer .block-23 ul li a, .footer .block-23 ul li span {
            color: rgba(255,255,255,0.7) !important;
        }
        .footer .block-23 ul li .fa {
            color: #fd7792 !important;
        }
        .ftco-footer-social li a {
            background: rgba(255,255,255,0.1) !important;
            color: #fff !important;
        }
        .ftco-footer-social li a:hover {
            background: #fd7792 !important;
        }
        .footer .border-top {
            border-color: rgba(255,255,255,0.1) !important;
        }
        .footer .copyright {
            color: rgba(255,255,255,0.4);
        }
        .ftco-navbar-light .navbar-nav > .nav-item > .nav-link:before {
            background: #fd7792 !important;
        }
    </style>
</head>
<body>
    
    <div class="wrap">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col d-flex align-items-center">
                    <p class="mb-0 phone">
                        <i class="fa fa-phone"></i> <a href="tel://1234567">+00 1234 567</a> 
                        <span class="mx-2">|</span>
                        <i class="fa fa-envelope"></i> <a href="mailto:info@damashotel.com">info@damashotel.com</a>
                    </p>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="social-media">
                        <p class="mb-0 d-flex">
                            <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-whatsapp"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Navigation -->
    @include('layouts.navigation')

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <h2 class="footer-heading"><a href="#" class="logo">Damas<span>Hotel</span></a></h2>
                    <p>Experience the ultimate luxury in the heart of the city. Your comfort is our priority.</p>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <h2 class="footer-heading">Quick Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-1 d-block"><i class="fa fa-chevron-right mr-2" style="font-size: 10px;"></i> About Us</a></li>
                        <li><a href="#" class="py-1 d-block"><i class="fa fa-chevron-right mr-2" style="font-size: 10px;"></i> Our Rooms</a></li>
                        <li><a href="#" class="py-1 d-block"><i class="fa fa-chevron-right mr-2" style="font-size: 10px;"></i> Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <h2 class="footer-heading">Contact Info</h2>
                    <div class="block-23 mb-3">
                      <ul>
                        <li><span class="fa fa-map-marker mr-3"></span><span class="text">198 West 21th Street, NY</span></li>
                        <li><a href="#"><span class="fa fa-phone mr-3"></span><span class="text">+2 392 3929 210</span></a></li>
                        <li><a href="#"><span class="fa fa-paper-plane mr-3"></span><span class="text">info@damashotel.com</span></a></li>
                      </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4">
                    <h2 class="footer-heading">Follow Us</h2>
                    <ul class="ftco-footer-social p-0 mt-2">
                        <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="fa fa-whatsapp"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-100 mt-5 border-top py-4 text-center">
            <div class="container">
                <p class="copyright">Copyright &copy; 2026 All rights reserved | Damas Hotel</p>
            </div>
        </div>
    </footer>

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

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
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>