<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Kelas Guru Kreatif 4.0</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    {{-- <link href="assets/img/favicon.png" rel="icon" /> --}}
    {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" /> --}}

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: Ninestars
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1 class="text-light">
                    <a href="{{ url('/') }}"><span>Guru Kreatif 4.0</span></a>
                </h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <a class="nav-link scrollto {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="{{ url('/#about') }}">Tentang</a>
                    </li>
                    {{-- <li>
                        <a class="nav-link scrollto" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="#portfolio">Portfolio</a>
                    </li> --}}
                    <li>
                        <a class="nav-link scrollto {{ request()->is('soal') ? 'active' : '' }}"
                            href="https://www.youtube.com/@GuruKreatif40">Youtube</a>
                    </li>
                    {{-- <li>
                        <a class="nav-link scrollto" href="{{ url('beranda') }}">Beranda</a>
                    </li> --}}
                    <li>
                        <a class="getstarted scrollto " href="{{ route('session.login') }}">Login</a>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->
