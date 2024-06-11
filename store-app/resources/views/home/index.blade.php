@php use Illuminate\Support\Facades\Auth; @endphp
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Cafe Baran</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets(1)/assets/img/favicon.png" rel="icon">
    <link href="/assets(1)/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/asset(1)/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets(1)/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets(1)/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets(1)/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets(1)/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets(1)/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets(1)/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets(1)/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Restaurantly
    * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
    * Updated: Mar 17 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>
<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
            <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 11AM - 23PM</span></i>
        </div>

        <div class="languages d-none d-md-flex align-items-center">
            <ul>
                <li>En</li>
                <li><a href="#">De</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0"><a href="index.html">Cafe Baran</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
                <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button ><a class="nav-link scrollto" >Logout</a></button>
                </form>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="get" action="{{route('home')}}">
                <input type="text" name="search" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Cart</a>

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8">
                <h1>Welcome to <span>Cafe Baran</span></h1>
                <h2>Delivering great coffee for more than 18 years!</h2>

                <div class="btns">
                    <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
                    <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Cart</a>
                </div>
            </div>

        </div>
    </div>
</section><!-- End Hero -->

<!-- ======= Menu Section ======= -->
<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Menu</h2>
            <p>Check Our Tasty Menu</p>
        </div>


        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex ">
                <ul class="menu-flters">


                    <a href="{{route('home')}}">
                        <li class="filter-active">All</li>
                    </a>
                    @foreach($categories as $category)
                        <a href='{{route('home',['category' => $category->category_id])}}'>
                            <li>{{$category->title}}</li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

        @foreach($products as $product)
            <div class="col-lg-6 menu-item filter-starters">
                <img src="{{asset('storage/'.$product->image)}}" class="menu-img" alt="">
                <div class="menu-content">
                    <a href="#">{{$product->title}}</a><span>{{$product->price}}</span>
                </div>
                <div class="menu-ingredients">
                    {{$product->description}}
                </div>
        @endforeach


    </div>
</section><!-- End Menu Section -->

</body>
<!-- Vendor JS Files -->
<script src="/assets(1)/assets/vendor/aos/aos.js"></script>
<script src="/assets(1)/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets(1)/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets(1)/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets(1)/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets(1)/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assets(1)/assets/js/main.js"></script>


</html>
