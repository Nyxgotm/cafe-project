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
<!-- ======= End Top Bar ======= -->
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0"><a href="index.html">Cafe Baran</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="{{route('home')}}">Home</a></li>
                <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button ><a class="nav-link scrollto" >Logout</a></button>
                </form>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Cart</a>

    </div>
</header><!-- End Header -->

<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8">
                <section id="menu" class="menu">

                <div class="container" data-aos="fade-up">
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">
                                <table >
                                    <thead>
                                    <tr>
                                        <th scope="col">Preview</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><img src="assets/img/product-1.jpg" class="menu-img" alt=""></td>
                                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                                        <td>$64</td>
                                        <td class="fw-bold">124</td>
                                        <td>$5,828</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>


                </section>

            </div>

        </div>
    </div>
</section><!-- End Hero -->

<!-- ======= Menu Section ======= -->



<!-- End Menu Section -->
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
