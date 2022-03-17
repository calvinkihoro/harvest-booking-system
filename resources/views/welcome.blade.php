        <!doctype html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <meta charset="utf-8">

            <!--====== Title ======-->
            <title>Harvest Hotel</title>
            <meta name="description"
                content="Geita Harvest Hotel official site. Stay at one of the leading hotels in Geita, centrally located with 5 star service and facilities. Book online now.">
            <meta name="keywords" content="">
            <meta property="og:site_name" content="Geita Harvest Hotel">
            <meta name="robots" content="index, follow">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <!--====== Favicon Icon ======-->
            <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}" type="image/svg">

            <!--====== Animate CSS ======-->
            <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

            <!--====== Magnific Popup CSS ======-->
            <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

            <!--====== Slick CSS ======-->
            <link rel="stylesheet" href="{{ asset('css/slick.css') }}">

            <!--====== Line Icons CSS ======-->
            <link rel="stylesheet" href="{{ asset('css/LineIcons.2.0.css') }}">


            <!--====== Style CSS ======-->
            <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
            <link rel="stylesheet" href="{{ mix('css/app.css') }}">


        </head>

        <body class="font-sans antialiased">

            <!--====== PRELOADER PART START ======-->

            <div class="hidden preloader">
                <div class="loader">
                    <div class="ytp-spinner">
                        <div class="ytp-spinner-container">
                            <div class="ytp-spinner-rotator">
                                <div class="ytp-spinner-left">
                                    <div class="ytp-spinner-circle"></div>
                                </div>
                                <div class="ytp-spinner-right">
                                    <div class="ytp-spinner-circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--====== PRELOADER PART ENDS ======-->

            <!--====== HEADER PART START ======-->
            <header class="header-area">
                <div class="navbar-area">
                    <div class="container relative">
                        <div class="row">
                            <div class="w-full">
                                <nav class="flex items-center justify-between navbar navbar-expand-lg">
                                    <a class="mr-4 navbar-brand" href="{{ url('/') }}">
                                        <img src="{{ asset('images/logo.svg') }}" class="w-1/5" alt="Logo">
                                    </a>
                                    <button class="block navbar-toggler focus:outline-none lg:hidden" type="button"
                                        data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="toggler-icon"></span>
                                        <span class="toggler-icon"></span>
                                        <span class="toggler-icon"></span>
                                    </button>

                                    <div class="absolute left-0 z-20 hidden w-full px-5 py-3 duration-300 bg-white shadow lg:w-auto collapse navbar-collapse lg:block top-100 mt-full lg:static lg:bg-transparent lg:shadow-none"
                                        id="navbarOne">
                                        <ul id="nav"
                                            class="items-center content-start mr-auto lg:justify-end navbar-nav lg:flex">
                                            <li class="nav-item active">
                                                <a class="page-scroll" href="#home">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="page-scroll" href="#features">Features</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="page-scroll" href="#about">About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="page-scroll" href="#facts">Why</a>
                                            </li>
{{--                                            <li class="nav-item">--}}
{{--                                                <a class="page-scroll" href="#team">Gallery</a>--}}
{{--                                            </li>--}}
                                            <li class="nav-item">
                                                <a class="page-scroll" href="#blog">Blog Post</a>
                                            </li>
                                        </ul>
                                    </div> <!-- navbar collapse -->

                                    <div
                                        class="absolute right-0 hidden mt-2 mr-24 navbar-btn sm:inline-block lg:mt-0 lg:static lg:mr-0">
                                        <a class="page-scroll main-btn bg-theme-ben gradient-btn" data-scroll-nav="0"
                                            href="#booknow">Book
                                            Now</a>
                                    </div>
                                </nav> <!-- navbar -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                </div> <!-- navbar area -->

                <div id="home" class="header-hero py-10 sm:py-16"
                    style="background-image: url({{ asset('images/alexander-kaunas-67-sOi7mVIk-unsplash.jpg') }})">
                    <div class="container">
                        <div class="justify-center row">
                            <div class="w-full lg:w-2/3">
                                <div class="pt-32 mb-12 text-center lg:pt-48 header-hero-content">
                                    <h3 class="text-2xl sm:text-4xl font-bold leading-tight text-white header-sub-title wow fadeInUp"
                                        data-wow-duration="1.3s" data-wow-delay="0.2s">WELCOME TO HARVEST HOTEL GEITA
                                    </h3>
                                    <h2 class="mb-6 text-2xl sm:text-4xl font-lighter text-white header-title wow fadeInUp mt-6"
                                        data-wow-duration="1.3s" data-wow-delay="0.5s">Reserve Room for Family

                                        <span class="text-orange-500">Vacation</span>
                                        with
                                        <span>us</span>
                                    </h2>
                                    <p class="mb-8 text-white text wow fadeInUp" data-wow-duration="1.3s"
                                        data-wow-delay="0.8s">
                                        Save with exclusive offers at HARVEST, The Palm including discounts on stays,
                                        unmissable benefits for members and more.
                                    </p>
                                    <a href="#" class="main-btn bg-theme-ben gradient-btn wow fadeInUp"
                                        data-wow-duration="1.3s" data-wow-delay="1.1s">Stay Here</a>
                                </div> <!-- header hero content -->
                            </div>
                        </div> <!-- row -->
                        <div class="justify-center row">
                            <div class="w-full lg:w-2/3">
                                <div class="text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s">
                                    {{-- <img src="{{ asset('images/header-hero.png') }}" alt="hero"> --}}
                                </div> <!-- header hero image -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                    <div id="particles-1" class="particles"></div>
                </div> <!-- header hero -->
            </header>

            <!--====== HEADER PART ENDS ======-->


            <!--====== SERVICES PART START ======-->

            <section id="features" class="services-area pt-120">
                <div class="container">
                    <div class="justify-center row">
                        <div class="w-full lg:w-2/3">
                            <div class="pb-10 text-center section-title">
                                <p class="text-center title my-4 text-theme-color text wow fadeInUp"
                                    data-wow-duration="1.3s" data-wow-delay="0.5s">Stay With Us</p>
                                <div class="m-auto line"></div>
                                <h3 class="title">Your perfect holiday starts here, <span>with a contemporary
                                        Guest Room And Food.</span>
                                </h3>
                            </div> <!-- section title -->
                        </div>
                    </div> <!-- row -->
                    <div class="justify-center row">
                        <div class="w-full sm:w-2/4 lg:w-1/4">
                            <div class="single-services wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                <div class="services-icon">
                                    <img class="shape" src="{{ asset('images/services-shape.svg') }}"
                                        alt="shape">
                                    <img class="shape-1" src="{{ asset('images/services-shape-1.svg') }}"
                                        alt="shape">
                                    <img class="shape-1 w-10 text-white" src="{{ asset('images/swimming21.svg') }}"
                                        alt="shape">
                                </div>
                                <div class="mt-8 services-content">
                                    <h4 class="mb-8 text-xl font-bold text-gray-900">ACCOMMODATION</h4>
                                    <p class="mb-8">We have Guest Room of two kinds Delux Rooms and Normal
                                        Rooms which you can sleep and enjoy your night.
                                    </p>
                                    <a class="duration-300 hover:text-theme-color " href="javascript:void(0)">Book Now
                                        <i class="ml-2 lni lni-chevron-right"></i></a>
                                </div>
                            </div> <!-- single services -->
                        </div>
                        <div class="w-full sm:w-2/4 lg:w-1/4">
                            <div class="mt-8 text-center single-services wow fadeIn" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <div class="services-icon">
                                    <img class="shape" src="{{ asset('images/services-shape.svg') }}"
                                        alt="shape">
                                    <img class="shape-1" src="{{ asset('images/services-shape-2.svg') }}"
                                        alt="shape">
                                    <img class="shape-1 w-10 text-white" src="{{ asset('images/restaurant23.svg') }}"
                                        alt="shape">
                                    {{-- <i class="lni lni-cog"></i> --}}
                                </div>
                                <div class="mt-8 services-content">
                                    <h4 class="mb-8 text-xl font-bold text-gray-900">RESTAURANT</h4>
                                    <p class="mb-8">Our hotel provides best restaurant services which
                                        includes,
                                        best fresh and delicious food which will make you happy.
                                    </p>
                                    <a class="duration-300 hover:text-theme-color" href="javascript:void(0)">Enjoy Our
                                        Food
                                        <i class="ml-2 lni lni-chevron-right"></i></a>
                                </div>
                            </div> <!-- single services -->
                        </div>
                        <div class="w-full sm:w-2/4 lg:w-1/4">
                            <div class="mt-8 text-center single-services wow fadeIn" data-wow-duration="1s"
                                data-wow-delay="0.8s">
                                <div class="services-icon">
                                    <img class="shape" src="{{ asset('images/services-shape.svg') }}"
                                        alt="shape">
                                    <img class="shape-1" src="{{ asset('images/services-shape-3.svg') }}"
                                        alt="shape">
                                    <img class="shape-1 w-10 text-white" src="{{ asset('images/cup74.svg') }}"
                                        alt="shape">
                                </div>
                                <div class="mt-8 services-content">
                                    <h4 class="mb-8 text-xl font-bold text-gray-900">Lounge</h4>
                                    <p class="mb-8">Enjoy drinking in our hotel we have variety of drinks
                                        like,
                                        soda,juice,soft drinks and wine also we have fresh juice and milk.
                                    </p>
                                    <a class="duration-300 hover:text-theme-color" href="javascript:void(0)">Welcome and
                                        Enjoy
                                        <i class="ml-2 lni lni-chevron-right"></i></a>
                                </div>
                            </div> <!-- single services -->
                        </div>
                        <div class="w-full sm:w-2/4 lg:w-1/4">
                            <div class="mt-8 text-center single-services wow fadeIn" data-wow-duration="1s"
                                data-wow-delay="0.8s">
                                <div class="services-icon">
                                    <img class="shape" src="{{ asset('images/services-shape.svg') }}"
                                        alt="shape">
                                    <img class="shape-1" src="{{ asset('images/services-shape-1.svg') }}"
                                        alt="shape">
                                    <img class="shape-1 w-10 text-white" src="{{ asset('images/watu.svg') }}"
                                        alt="shape">
                                </div>
                                <div class="mt-8 services-content">
                                    <h4 class="mb-8 text-xl font-bold text-gray-900">Conference Halls</h4>
                                    <p class="mb-8">Our hotel also has conferencing Hall which are confortable for conducting difference kinds of events with confortable enviroment.

                                    </p>
                                    <a class="duration-300 hover:text-theme-color" href="javascript:void(0)">Join Us
                                        <i class="ml-2 lni lni-chevron-right"></i></a>
                                </div>
                            </div> <!-- single services -->
                        </div>

                    </div> <!-- row -->
                </div> <!-- container -->
            </section>

            <!--====== SERVICES PART ENDS ======-->

            <!--====== ABOUT PART START ======-->

            <section id="about" class="relative pt-20 about-area">
                <div class="container about-fixed">
                    <div class="row">
                        <div class="w-full lg:w-1/2">
                            <div class="mx-4 mt-12 about-content wow fadeInLeftBig" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <div class="mb-4 section-title">
                                    <div class="line"></div>
                                    <h3 class="title text-orange-500">Best Of The Best <span>hotel in Geita.</span>
                                    </h3>
                                </div> <!-- section title -->
                                <p class="mb-8 text-gray-200"><span class="font-bold text-white">Harvest Hotel </span>is
                                    best
                                    hotel located in Geita,
                                    near somjoma's street, we are located 2km from geita Bus stop so we are located at
                                    Geita town center.
                                    Our hotel is new and we focus on providing best services which will make our
                                    customer happy and satisfied so you are welcome to visit our hotel.
                                    We assure you that by visiting to our hotel you will enjoy a great experience which
                                    will make you to remember good moment and memories so your homely welcomed to
                                    Hervest Hotel.


                                </p>
                                <a href="javascript:void(0)" class="main-btn gradient-btn bg-theme-ben">Visit Us</a>
                            </div> <!-- about content -->
                        </div>
                        <div class="w-full lg:w-1/2">
                            <div class="mx-4 mt-12 text-center about-image wow fadeInRightBig" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <img src="{{ asset('images/about1.svg') }}" alt="about">
                            </div> <!-- about image -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
                <div class="about-shape-1">
                    <img src="{{ asset('images/about-shape-1.svg') }}" alt="shape">
                </div>
            </section>

            <!--====== ABOUT PART ENDS ======-->

            <!--====== ABOUT PART START ======-->

            <section class="relative pt-20 about-area">
                <div class="about-shape-2">
                    <img src="{{ asset('images/about-shape-2.svg') }}" alt="shape">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="w-full lg:w-1/2 lg:order-last">
                            <div class="mx-4 mt-12 about-content wow fadeInLeftBig" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <div class="mb-4 section-title">
                                    <div class="line"></div>
                                    <h3 class="title text-orange-500">Standart Rooms</h3>
                                </div> <!-- section title -->
                                <p class="mb-8">Our Standard Room welcomes in the beauty of our
                                    surroundings with glorious views of goog sorroundings or the hotel’s
                                    extensive gardens. Enjoy the warmth and elegance of these rooms
                                    well-appointed with exquisite details such as a marble bathroom, l
                                    arge and comfortable beds and French doors leading out to the gardens.
                                </p>
                                <div class="mx-4 mb-4">
                                    <h2 class="text-xl mb-4 text-center font-bold capitalize text-orange-500 border-2 lg:border-none rounded-lg border-blue-500">in-room amenities</h2>
                                    <div class="">
                                        <ul class="list-disc px-10">
                                            <li>Flat-screen television with cable and satellite channels</li>
                                            <li>Complimentary wireless Internet</li>
                                            <li>One King or two double beds</li>
                                            <li>Bathrobe and slippers</li>
                                            <li>Work desk and chair</li>
                                            <li>24-hour room service</li>
                                        </ul>
                                    </div>
                                </div>
                                <a class="page-scroll main-btn bg-theme-ben gradient-btn" data-scroll-nav="0"  href="#booknow">Book Now</a>
                            </div> <!-- about content -->
                        </div>
                        <div class="w-full lg:w-1/2 lg:order-first">
                            <div class="mx-4 mt-12 text-center about-image wow fadeInRightBig" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <img src="{{ asset('images/about2.svg') }}" alt="about">
                            </div> <!-- about image -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </section>

            <section class="relative pt-20 about-area">
                <div class="container">
                    <div class="row">
                        <div class="w-full lg:w-1/2">
                            <div class="pl-0 mt-12 counter-wrapper lg:pl-16 wow fadeIn" data-wow-duration="1s"
                                 data-wow-delay="0.8s">
                                <div class="counter-content">
                                    <div class="mb-8 section-title">
                                        <div class="line"></div>
                                        <h3 class="title text-orange-500">WEDDING & HONEYMOONS</h3>
                                    </div> <!-- section title -->
                                    <p>
                                        Your wedding celebration is something to remember forever. With a design and ambience reminiscent of a colonial coffee farm, Arusha Serena Hotel, Resort & Spa provides a
                                        timeless and romantic setting for an unforgettable wedding in the African bush. </p>
                                </div> <!-- counter content -->
                                <div class="row no-gutters">
                                    <p>
                                        In this spectacularly beautiful destination, unique venues envelope guests in natural splendour. Exchange vows on the lawn outside our enchanting stone-built restaurant. Host a sunset cocktail party on the shores of
                                        Geita or plan your reception in the safari-style Canvas Room overlooking the environment.  </p>

                                    <p>Whatever your whims, wishes or wants, our wedding planner and catering team will
                                        help you design a wedding celebration that is beyond your expectations. </p>
                                </div> <!-- row -->
                            </div> <!-- counter wrapper -->
                        </div>
                        <div class="w-full lg:w-1/2">
                            <div class="relative pb-8 mt-12 video-content wow fadeIn" data-wow-duration="1s"
                                 data-wow-delay="0.5s">
                                <img class="absolute bottom-0 right-0 -ml-0 dots"
                                     src="{{ asset('images/dots.svg') }}" alt="dots">
                                <div class="relative mr-6 rounded-lg shadow-md video-wrapper">
                                    <div class="video-image">
                                        <img src="{{ asset('images/kindred-hues-photography-_qSPVAv6Ndc-unsplash.jpg') }}" class="rounded-lg" alt="video">
                                    </div>
                                    <div
                                        class="absolute top-0 left-0 flex items-center justify-center w-full h-full bg-blue-900 bg-opacity-25 rounded-lg video-icon">
                                        <a href="https://www.youtube.com/watch?v=r44RKWyfcFw" class="video-popup"><i
                                                class="lni lni-play"></i></a>
                                    </div>
                                </div> <!-- video wrapper -->
                            </div> <!-- video content -->
                        </div>

                    </div> <!-- row -->
                </div>
            </section>


            <!--====== ABOUT PART START ======-->

            <section class="relative pt-20 about-area">
                <div class="container about-fixed2">
                    <div class="row">
                        <div class="w-full lg:w-1/2">
                            <div class="mx-4 mt-12 about-content wow fadeInLeftBig" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <div class="mb-4 section-title">
                                    <div class="line"></div>
                                    <h3 class="title text-orange-500">
                                        BUSINESS MEETINGS & CONFERENCES
                                    </h3>
                                </div> <!-- section title -->
                                <p class="mb-8 text-white">
                                    Look no further than Harvest Hotel.  Whether it is for a banquet, a special occasion, celebrations, a business meeting or conference, Istana is the ideal venue.  With over 920 square metres (9,900 square feet) of flexible space and an alfresco area,
                                    the function areas have been designed with luxury as well as technology in mind.
                                </p>
                                <a href="javascript:void(0)" class="main-btn gradient-btn bg-theme-ben">Book Now</a>
                            </div> <!-- about content -->
                        </div>
                        <div class="w-full lg:w-1/2">
                            <div class="mx-4 mt-12 text-center about-image wow fadeInRightBig" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <img src="{{ asset('images/about3.svg') }}" alt="about">
                            </div> <!-- about image -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
                <div class="about-shape-1">
                    <img src="{{ asset('images/about-shape-1.svg') }}" alt="shape">
                </div>
            </section>

            <!--====== ABOUT PART ENDS ======-->


            <!--====== ABOUT PART ENDS ======-->

            <!--====== VIDEO COUNTER PART START ======-->

            <section id="facts" class="pt-20 video-counter">
                <div class="container">
                    <div class="row">
                        <div class="w-full lg:w-1/2">
                            <div class="relative pb-8 mt-12 video-content wow fadeIn" data-wow-duration="1s"
                                data-wow-delay="0.5s">
                                <img class="absolute bottom-0 left-0 -ml-8 dots"
                                    src="{{ asset('images/dots.svg') }}" alt="dots">
                                <div class="relative mr-6 rounded-lg shadow-md video-wrapper">
                                    <div class="video-image">
                                        <img src="{{ asset('images/kindred-hues-photography-_qSPVAv6Ndc-unsplash.jpg') }}" class="rounded-lg" alt="video">
                                    </div>
                                    <div
                                        class="absolute top-0 left-0 flex items-center justify-center w-full h-full bg-blue-900 bg-opacity-25 rounded-lg video-icon">
                                        <a href="https://www.youtube.com/watch?v=r44RKWyfcFw" class="video-popup"><i
                                                class="lni lni-play"></i></a>
                                    </div>
                                </div> <!-- video wrapper -->
                            </div> <!-- video content -->
                        </div>
                        <div class="w-full lg:w-1/2">
                            <div class="pl-0 mt-12 counter-wrapper lg:pl-16 wow fadeIn" data-wow-duration="1s"
                                data-wow-delay="0.8s">
                                <div class="counter-content">
                                    <div class="mb-8 section-title">
                                        <div class="line"></div>
                                        <h3 class="title text-orange-500">SPECIAL OFFERS</h3>
                                    </div> <!-- section title -->
                                    <p>
                                        As an essential part of your journey to the gateway of Tanzania’s
                                        Northern Safari Circuit, Geita Harvest Hotel, Resort & Spa offers
                                        holiday packages intended to leave you with warm memories long after
                                        you depart. Whether it’s a thoughtfully arranged wedding package or a weekend
                                        getaway with an English breakfast by the Lake Duluti shore, we craft
                                        experiences that add a little more indulgence and value to your stay. Leave modern-day bustle
                                        and distractions far behind and enjoy our exclusive tailor-made deals. </p>
                                </div> <!-- counter content -->
                                <div class="row no-gutters">


                                </div> <!-- row -->
                            </div> <!-- counter wrapper -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </section>

            <!--====== VIDEO COUNTER PART ENDS ======-->

            <!--====== TEAM PART START ======-->

{{--            <section id="team" class="team-area pt-120 overflow-hidden text-gray-700">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="w-full">--}}
{{--                            <div class="mx-4 mt-12 about-content wow fadeInLeftBig" data-wow-duration="1s"--}}
{{--                                 data-wow-delay="0.5s">--}}
{{--                <div class="mb-4 section-title">--}}
{{--                    <div class="line"></div>--}}
{{--                    <h3 class="title text-orange-500">--}}
{{--                        Our Gallery--}}
{{--                    </h3>--}}
{{--                </div> <!-- section title -->--}}


{{--                                <div class="container px-5 py-2 mx-auto lg:pt-24 lg:px-32">--}}
{{--                                    <div class="flex flex-wrap -m-1 md:-m-2">--}}
{{--                                        <div class="flex flex-wrap w-1/2">--}}
{{--                                            <div class="w-1/2 p-1 md:p-2">--}}
{{--                                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"--}}
{{--                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(70).webp">--}}
{{--                                            </div>--}}
{{--                                            <div class="w-1/2 p-1 md:p-2">--}}
{{--                                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"--}}
{{--                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(72).webp">--}}
{{--                                            </div>--}}
{{--                                            <div class="w-full p-1 md:p-2">--}}
{{--                                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"--}}
{{--                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex flex-wrap w-1/2">--}}
{{--                                            <div class="w-full p-1 md:p-2">--}}
{{--                                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"--}}
{{--                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(74).webp">--}}
{{--                                            </div>--}}
{{--                                            <div class="w-1/2 p-1 md:p-2">--}}
{{--                                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"--}}
{{--                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(75).webp">--}}
{{--                                            </div>--}}
{{--                                            <div class="w-1/2 p-1 md:p-2">--}}
{{--                                                <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"--}}
{{--                                                     src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(77).webp">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--             </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}


            <!--====== TEAM PART ENDS ======-->

            <!--====== TESTIMONIAL PART START ======-->



{{--            <section id="testimonial" class="testimonial-area pt-120">--}}
{{--                <div class="container">--}}
{{--                    <div class="justify-center row">--}}
{{--                        <div class="w-full lg:w-2/3">--}}
{{--                            <div class="pb-10 text-center section-title">--}}
{{--                                <div class="m-auto line"></div>--}}
{{--                                <h3 class="title">Users sharing<span> their experience</span></h3>--}}
{{--                            </div> <!-- section title -->--}}
{{--                        </div>--}}
{{--                    </div> <!-- row -->--}}
{{--                    <div class="row testimonial-active wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.8s">--}}
{{--                        <div class="w-full lg:w-1/3">--}}
{{--                            <div class="single-testimonial">--}}
{{--                                <div class="flex items-center justify-between mb-6">--}}
{{--                                    <div class="quota">--}}
{{--                                        <i class="text-4xl duration-300 lni lni-quotation text-theme-color"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="star">--}}
{{--                                        <ul class="flex">--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mb-8">--}}
{{--                                    <p>Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod--}}
{{--                                        tempor--}}
{{--                                        invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam--}}
{{--                                        nonu.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="flex items-center testimonial-author">--}}
{{--                                    <div class="relative author-image">--}}
{{--                                        <img class="shape"--}}
{{--                                            src="{{ asset('images/textimonial-shape.svg') }}" alt="shape">--}}
{{--                                        <img class="author" src="{{ asset('images/author-1.png') }}"--}}
{{--                                            alt="author">--}}
{{--                                    </div>--}}
{{--                                    <div class="author-content media-body">--}}
{{--                                        <h6 class="mb-1 text-xl font-bold text-gray-900">Jenny Deo</h6>--}}
{{--                                        <p>CEO, SpaceX</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div> <!-- single testimonial -->--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4">--}}
{{--                            <div class="single-testimonial">--}}
{{--                                <div class="flex items-center justify-between mb-6">--}}
{{--                                    <div class="quota">--}}
{{--                                        <i class="text-4xl duration-300 lni lni-quotation text-theme-color"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="star">--}}
{{--                                        <ul class="flex">--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mb-8">--}}
{{--                                    <p>Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod--}}
{{--                                        tempor--}}
{{--                                        invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam--}}
{{--                                        nonu.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="flex items-center testimonial-author">--}}
{{--                                    <div class="relative author-image">--}}
{{--                                        <img class="shape"--}}
{{--                                            src="{{ asset('images/textimonial-shape.svg') }}" alt="shape">--}}
{{--                                        <img class="author" src="{{ asset('images/author-2.png') }}"--}}
{{--                                            alt="author">--}}
{{--                                    </div>--}}
{{--                                    <div class="author-content media-body">--}}
{{--                                        <h6 class="mb-1 text-xl font-bold text-gray-900">Marjin Otte</h6>--}}
{{--                                        <p>UX Specialist, Yoast</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div> <!-- single testimonial -->--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4">--}}
{{--                            <div class="single-testimonial">--}}
{{--                                <div class="flex items-center justify-between mb-6">--}}
{{--                                    <div class="quota">--}}
{{--                                        <i class="text-4xl duration-300 lni lni-quotation text-theme-color"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="star">--}}
{{--                                        <ul class="flex">--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mb-8">--}}
{{--                                    <p>Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod--}}
{{--                                        tempor--}}
{{--                                        invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam--}}
{{--                                        nonu.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="flex items-center testimonial-author">--}}
{{--                                    <div class="relative author-image">--}}
{{--                                        <img class="shape"--}}
{{--                                            src="{{ asset('images/textimonial-shape.svg') }}" alt="shape">--}}
{{--                                        <img class="author" src="{{ asset('images/author-3.png') }}"--}}
{{--                                            alt="author">--}}
{{--                                    </div>--}}
{{--                                    <div class="author-content media-body">--}}
{{--                                        <h6 class="mb-1 text-xl font-bold text-gray-900">David Smith</h6>--}}
{{--                                        <p>CTO, Alphabet</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div> <!-- single testimonial -->--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4">--}}
{{--                            <div class="single-testimonial">--}}
{{--                                <div class="flex items-center justify-between mb-6">--}}
{{--                                    <div class="quota">--}}
{{--                                        <i class="text-4xl duration-300 lni lni-quotation text-theme-color"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="star">--}}
{{--                                        <ul class="flex">--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                            <li><i class="lni lni-star-filled text-theme-color"></i></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mb-8">--}}
{{--                                    <p>Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam nonu eirmod--}}
{{--                                        tempor--}}
{{--                                        invidunt labore.Lorem ipsum dolor sit amet,consetetur sadipscing elitr, seddiam--}}
{{--                                        nonu.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="flex items-center testimonial-author">--}}
{{--                                    <div class="relative author-image">--}}
{{--                                        <img class="shape"--}}
{{--                                            src="{{ asset('images/textimonial-shape.svg') }}" alt="shape">--}}
{{--                                        <img class="author" src="{{ asset('images/author-2.png') }}"--}}
{{--                                            alt="author">--}}
{{--                                    </div>--}}
{{--                                    <div class="author-content media-body">--}}
{{--                                        <h6 class="mb-1 text-xl font-bold text-gray-900">Fajar Siddiq</h6>--}}
{{--                                        <p>COO, MakerFlix</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div> <!-- single testimonial -->--}}
{{--                        </div>--}}
{{--                    </div> <!-- row -->--}}
{{--                </div> <!-- container -->--}}
{{--            </section>--}}

            <!--====== TESTIMONIAL PART ENDS ======-->

            <!--====== BLOG PART START ======-->

            <section id="blog" class="blog-area pt-120">
                @if(count(\App\Models\Blog::where('status','public')->get())>0)
                <div class="container">
                    <div class="row">
                        <div class="w-full lg:w-1/2">
                            <div class="pb-8 section-title">
                                <div class="line"></div>
                                <h3 class="title"><span>Our Recent</span> Blog Posts</h3>
                            </div> <!-- section title -->
                        </div>
                    </div> <!-- row -->
                    <div class="justify-center items-center row">
                        @foreach (\App\Models\Blog::where('status','public')->latest()->take(3)->get() as $post)
                        <div class="w-full md:w-2/3 lg:w-1/3">
                            <div class="mx-4 mt-10 single-blog wow fadeIn" data-wow-duration="1s"
                                data-wow-delay="0.2s">
                                <div class="mb-5 overflow-hidden blog-image rounded-xl">
                                    <img class="w-full max-h-[250px] object-cover" src="{{url('storage/posts/'.$post->image)}}" alt="blog">
                                </div>
                                <div class="blog-content">
                                    <ul class="flex mb-5 meta">
                                        <li>Posted By: <a href="javascript:void(0)">{{$post->postedBy}}</a></li>
                                        <li class="ml-12">{{$post->created_at->diffForHumans()}}</li>
                                    </ul>
                                    <p class="mb-6 text-xl leading-snug text-gray-900">{{$post->heading}}</p>
                                    <a class="text-theme-color" href="javascript:void(0)">
                                        Learn More
                                        <i class="ml-2 lni lni-chevron-right"></i>
                                    </a>
                                </div>
                            </div> <!-- single blog -->
                        </div>
                         <!-- row -->
                        @endforeach
                    </div> <!-- row -->
                </div> <!-- container -->

                @else
                    <div class="container">
                        <div class="row">
                            <div class="w-full lg:w-1/2">
                                <div class="pb-8 section-title">
                                    <div class="line"></div>
                                    <h3 class="title"><span>Our Recent</span> Blog Posts</h3>
                                </div> <!-- section title -->
                            </div>
                        </div>
                        <div class="justify-center items-center row">
                            <p class="absolute text-2xl text-orange-500 font-bold">No posts</p>
                            <div class="mb-5 overflow-hidden blog-image rounded-xl">
                                <img class="w-full object-cover" src="{{url('images/about2.svg')}}" alt="blog">
                            </div>
                        </div>
                @endif


            </section>

            <!--====== BLOG PART ENDS ======-->

            <!--====== FOOTER PART START ======-->

            <footer id="footer" class="relative z-10 footer-area pt-120">
                <div class="footer-bg" style="background-image: url({{ asset('images/footer-bg.svg') }});">
                </div>

                {{-- booking cart --}}
                <div class="w-screen px-4 md:px-8 lg:px-12  flex justify-between items-center" id='booknow'>
                    <div class="pt-10 pb-20 mb-12 bg-white rounded-lg shadow-xl subscribe-area wow fadeIn w-full "
                        data-wow-duration="1s" data-wow-delay="0.5s">
                        <h1
                            class="my-6 text-center text-2xl text-theme-color font-bold sm:text-4xl subscribe-title uppercase">
                            Booking
                            Online
                        </h1>
                        @if (session('message'))
                            <h1 class="my-6 text-blue-300 text-center capitalize">
                                {{ session('message') }}</h1>
                        @endif
                        <x-jet-validation-errors class="mb-4" />
                        <form action="{{ route('makeBooking') }}" method="post">
                            @csrf
                            <div class="flex md:flex-row flex-col items-center justify-center">

                                <div class="px-4 md:px-0 mx-4 mt-2 w-full md:w-2/5 flex flex-col justify-center">
                                    <x-jet-label for="checkIn" value="{{ __('Check-in:') }}" />
                                    <x-jet-input id="checkIn" type="date" name="checkIn" :value="old('checkIn')"
                                        required />
                                </div>
                                <div class="px-4 md:px-0 mx-4 mt-2 w-full md:w-2/5 flex flex-col justify-center">
                                    <x-jet-label for="checkOut" value="{{ __('Check-Out:') }}" />
                                    <x-jet-input id="checkOut" type="date" name="checkOut" :value="old('checkOut')"
                                        required />
                                </div>
                            </div>

                            <div class="flex md:flex-row flex-col items-center justify-center w-full">

                                <div class="px-4 md:px-0 mx-4 mt-2 w-full md:w-2/5 flex flex-col justify-center">
                                    <x-jet-label for="adults" value="{{ __('Adults:') }}" />
                                    <x-jet-input id="adult" type="number" name="adult" value="{{ old('adult', 0) }}"
                                        required />
                                </div>
                                <div class="px-4 md:px-0 mx-4 mt-2 w-full md:w-2/5 flex flex-col justify-center">

                                    <x-jet-label for="children" value="{{ __('Children:') }}" />
                                    <x-jet-input id="checkOut" type="number" name="child" :value="old('child',0)"
                                        required />
                                </div>
                            </div> <!-- row -->
                            <div class="flex md:flex-row flex-col items-center justify-center">
                                <div class="px-4 md:px-0 mx-4 mt-2 w-full md:w-2/5 flex flex-col justify-center">
                                    <x-jet-label for="children" value="{{ __('Fullname:') }}" />
                                    <x-jet-input id="checkOut" placeholder="Enter Fullname" type="text" name="fname"
                                        :value="old('fname')" required />
                                </div>
                                <div class="px-4 md:px-0 mx-4 mt-2 w-full md:w-2/5 flex flex-col justify-center">
                                    <x-jet-label for="children" value="{{ __('Email:') }}" />
                                    <x-jet-input id="checkOut" placeholder="Enter Email" type="email" name="email"
                                        :value="old('email')" required />
                                </div>
                            </div>
                            <div class="flex md:flex-row flex-col items-center justify-center">

                                <div class="px-4 md:px-0 mx-4 mt-2 w-full md:w-2/5 flex flex-col justify-center">
                                    <x-jet-label for="children" value="{{ __('Phone:') }}" />
                                    <x-jet-input id="checkOut" placeholder="Enter your mobile number" type="number"
                                        name="phone" :value="old('phone')" required />
                                </div>
                                <div class="px-4 md:px-0 mx-4 mt-2 w-full md:w-2/5 flex flex-col justify-center">

                                <span class="text-gray-700 dark:text-gray-400">
                                                  Booking Type
                                                </span>
                                <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="type" id="type" >
                                    <option value="">Choose Booking Type</option>
                                    <option value="room">Room Booking</option>
                                    <option value="hall">Hall Booking</option>
                                </select>
                                </label>
                                </div>
                            </div>

                            <div class="flex md:flex-row flex-col items-center justify-center my-4 mx-12">

                                <div class="px-4 md:px-0 mx-4 mt-2 w-full flex flex-col justify-center">

                                    <button class="main-btn gradient-btn bg-theme-ben" type="submit">Send Booking Now</button>

                                </div>


                            </div> <!-- row -->
                        </form>


                    </div>
                    {{-- booking cart --}}
                    <!-- row -->
                </div> <!-- subscribe area -->
                <div class="px-4 footer-widget pb-120">
                    <div class="row ">
                        <div class="w-4/5 md:w-3/5 lg:w-2/6">
                            <div class="mt-12 footer-about wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                <a class="inline-block mb-8 logo bg-white rounded-lg" href="/">
                                    <img src="{{ asset('images/logo.svg') }}" alt="logo" class="w-40">
                                </a>
                                <p class="pb-10 pr-10 leading-snug text-white">Harvest Hotel is a beautiful hotel
                                    located on southern part of Tanzania in Geita District, where were you can
                                    visiting.</p>
                                <ul class="flex footer-social">
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-instagram-filled"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a>
                                    </li>
                                </ul>
                            </div> <!-- footer about -->
                        </div>
                        <div class="w-4/5 sm:w-2/3 md:w-3/5 lg:w-2/6">
                            <div class="row">
                                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2">
                                    <div class="mt-12 link-wrapper wow fadeIn" data-wow-duration="1s"
                                        data-wow-delay="0.4s">
                                        <div class="footer-title">
                                            <h4 class="mb-8 text-2xl font-bold text-white">Quick Link</h4>
                                        </div>
                                        <ul class="link">
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                            <li><a href="javascript:void(0)">Refund Policy</a></li>
                                            <li><a href="javascript:void(0)">Terms of Service</a></li>
                                            <li><a href="javascript:void(0)">Pricing</a></li>
                                        </ul>
                                    </div> <!-- footer wrapper -->
                                </div>
                                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2">
                                    <div class="mt-12 link-wrapper wow fadeIn" data-wow-duration="1s"
                                        data-wow-delay="0.6s">
                                        <div class="footer-title">
                                            <h4 class="mb-8 text-2xl font-bold text-white">Resources</h4>
                                        </div>
                                        <ul class="link">
                                            <li><a class="page-scroll" href="#home">Home</a></li>
                                            <li><a class="page-scroll" href="#features">Features</a></li>
                                            <li><a class="page-scroll" href="#about">About Us</a></li>
                                            <li><a class="page-scroll" href="#facts">Why Us</a></li>
                                            <li><a class="page-scroll" href="#booknow">Book Now</a></li>
                                            @auth()
                                                <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <a href="{{ route('logout') }}"
                                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </a>
                                            </form>
                                                </li>
                                                @endauth
                                        </ul>
                                    </div> <!-- footer wrapper -->
                                </div>
                            </div>
                        </div>
                        <div class="w-4/5 sm:w-1/3 md:w-2/5 lg:w-2/6">
                            <div class="mt-12 footer-contact wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                                <div class="footer-title">
                                    <h4 class="mb-8 text-2xl font-bold text-white">Contact Us</h4>
                                </div>
                                <ul class="contact">
                                    <li>+255766635174</li>
                                    <li>info@harvesthotels.com</li>
                                    <li>www.harvesthotels.com</li>
                                    <li>GEITA Stree , United <br> Republic Of Tanzania.</li>
                                </ul>
                            </div> <!-- footer contact -->
                        </div>
                        <div class="w-full mt-4 mx-4 h-[500px] sm:h-[450px]" >
                            <div class="mt-12 flex flex-col justify-center items-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                <div  class='w-4/5 md:w-4/5 lg:w-4/6' id="map ">


                                    <iframe src="https://maps.google.com/maps?q=geita&t=k&z=19&ie=UTF8&iwloc=&output=embed" class="h-[500px] sm:h-[450px]" width="100% " frameborder="0 " style="border:0 " allowfullscreen=""></iframe>
                                </div>
                            </div> <!-- footer about -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- footer widget -->
                <div class="py-8 border-t border-gray-200 footer-copyright">
                    <p class="text-white mx-4">
                        Developed by <a class="duration-300 hover:text-theme-color-2" href="#" rel="nofollow"
                            target="_blank">Kill Plan Company</a>

                    </p>
                </div> <!-- footer copyright -->
                </div> <!-- container -->
                <div id="particles-2" class="particles"></div>
            </footer>

            <!--====== FOOTER PART ENDS ======-->

            <!--====== BACK TOP TOP PART START ======-->

            <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

            <!--====== BACK TOP TOP PART ENDS ======-->

            <!--====== PART START ======-->


            {{-- <section class="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-"></div>
                    </div>
                </div>
            </section> --}}


            <!--====== PART ENDS ======-->




            <!--====== Jquery js ======-->
            <script src="{{ asset('js/vendor/jquery-3.5.1-min.js') }}"></script>
            <script src="{{ asset('js/vendor/modernizr-3.7.1.min.js') }}"></script>

            <!--====== Plugins js ======-->
            <script src="{{ asset('js/plugins.js') }}"></script>

            <!--====== Slick js ======-->
            <script src="{{ asset('js/slick.min.js') }}"></script>

            <!--====== Scrolling Nav js ======-->
            <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
            <script src="{{ asset('js/scrolling-nav.js') }}"></script>

            <!--====== wow js ======-->
            <script src="{{ asset('js/wow.min.js') }}"></script>

            <!--====== Particles js ======-->
            <script src="{{ asset('js/particles.min.js') }}"></script>

            <!--====== Main js ======-->
            <script src="{{ asset('js/main.js') }}"></script>

        </body>

        </html>
