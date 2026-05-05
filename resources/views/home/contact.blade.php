@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<style>
    .contact-wrap {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }
    .form-control {
        height: 50px;
        background: #f8f9fa;
        border: 1px solid transparent;
        border-radius: 5px;
        transition: 0.3s;
    }
    .form-control:focus {
        background: #fff;
        border-color: #fd7792;
        box-shadow: none;
    }
    textarea.form-control {
        height: inherit !important;
    }
    .info-wrap {
        border-radius: 10px;
        background: #1a1a1a !important; /* لون داكن فخم يتناسب مع الهوية */
    }
    .info-wrap .dbox .icon {
        width: 50px;
        height: 50px;
        background: rgba(253, 119, 146, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fd7792;
        transition: 0.3s;
    }
    .info-wrap .dbox:hover .icon {
        background: #fd7792;
        color: #fff;
    }
    .btn-send {
        background: #fd7792;
        border: none;
        padding: 15px 35px;
        border-radius: 5px;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-send:hover {
        background: #e0607a;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(253, 119, 146, 0.3);
    }
</style>

<section class="hero-wrap hero-wrap-2 d-flex align-items-center" 
    style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('assets/images/image_2.jpg') }}') center/cover no-repeat; height: 40vh;">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center text-center">
            <div class="col-md-9 ftco-animate">
                <p class="breadcrumbs mb-2" style="text-transform: uppercase; letter-spacing: 2px; font-size: 13px;">
                    <a href="/" class="text-white opacity-75">Home</a> 
                    <span class="mx-2 text-white">/</span> 
                    <span class="text-white">Contact Us</span>
                </p>
                <h1 class="mb-0 bread display-4 fw-bold text-white">Contact Us</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light py-5">
    <div class="container">
        <div class="row no-gutters justify-content-center mb-5">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-lg-8 col-md-7 d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4 fw-bold">Get in touch</h3>
                                <form method="POST" id="contactForm" class="contactForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="label mb-2" for="name">Full Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter your name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3"> 
                                            <div class="form-group">
                                                <label class="label mb-2" for="email">Email Address</label>
                                                <input type="email" class="form-control" name="email" placeholder="Enter your email">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label class="label mb-2" for="subject">Subject</label>
                                                <input type="text" class="form-control" name="subject" placeholder="Subject">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="form-group">
                                                <label class="label mb-2" for="message">Message</label>
                                                <textarea name="message" class="form-control" cols="30" rows="5" placeholder="Your message..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-send text-white">
                                                    Send Message <i class="fa fa-paper-plane ms-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap w-100 p-md-5 p-4 text-white">
                                <h3 class="mb-4 fw-bold text-white">Let's get in touch</h3>
                                <p class="mb-5 opacity-75">We're open for any suggestion or just to have a chat.</p>
                                
                                <div class="dbox w-100 d-flex align-items-start mb-4">
                                    <div class="icon mr-3"><span class="fa fa-map-marker"></span></div>
                                    <div class="text">
                                        <p class="mb-0"><span class="fw-bold d-block text-white">Address:</span> 198 West 21th Street, New York NY 10016</p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center mb-4">
                                    <div class="icon mr-3"><span class="fa fa-phone"></span></div>
                                    <div class="text">
                                        <p class="mb-0"><span class="fw-bold d-block text-white">Phone:</span> <a href="tel://1234567920" class="text-white-50">+ 1235 2355 98</a></p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center mb-4">
                                    <div class="icon mr-3"><span class="fa fa-paper-plane"></span></div>
                                    <div class="text">
                                        <p class="mb-0"><span class="fw-bold d-block text-white">Email:</span> <a href="mailto:info@damashotel.com" class="text-white-50">info@damashotel.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row no-gutters">
            <div class="col-md-12">
                <div id="map" class="map shadow-sm" style="height: 450px; border-radius: 10px;"></div>
            </div>
        </div>
    </div>
</section>
@endsection