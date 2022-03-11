<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restu Lintas Express</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{asset('style/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('style/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('style/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('style/css/style2.css')}}" rel="stylesheet">

    <!-- Select2 -->
    <link href="{{asset('style/admin/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/admin/vendors/select2-4/dist/css/select2.min.css')}}" rel="stylesheet">
    <style type="text/css">

    </style>
</head>

<body>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
    <a href="/" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
        <img src="{{asset('img/logo.png')}}" width="100%" height="100%" class="d-inline-block align-text-top"/>
{{--        <h2 class="mb-2 text-white">RLX Express</h2>--}}
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href="/about" class="nav-item nav-link {{ request()->is('/about') ? 'active' : '' }}">About</a>
{{--            <a href="/cek-resi" class="nav-item nav-link">Cek Resi</a>--}}
        </div>
        <!-- <h4 class="m-0 pe-lg-5 d-none d-lg-block"><i class="fa fa-headphones text-primary me-3"></i>+012 345 6789</h4> -->
    </div>
</nav>
<!-- Navbar End -->
@yield('main')
<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Address</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>JALAN KEINDAHAN II BLOK AA NO.51, BUMI
                    TAMALANREA PERMAI, TAMALANREA,
                    MAKASSAR, SULAWESI SELATAN, 9024</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>085255514005</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>ptrestulintasekspres@gmail.com</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>ptrestulintasekspres@yahoo.com</p>

            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Operational Hours</h4>
                <p class="mb-2"><i class="fa fa-calendar me-3"></i>Senin - Sabtu</p>
                <p class="mb-2"><i class="fa fa-clock me-3"></i>09:00 - 20:00 Wita</p></p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Quick Links</h4>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Cek Resi</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="hide mb-4">Newsletter</h4>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Restu Lintas Express</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    <!-- Develop By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('style/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('style/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('style/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('style/lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('style/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('style/admin/vendors/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('style/admin/vendors/select2-4/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('style/admin/vendors/select2-4/dist/js/select2.min.js')}}"></script>
<script src="{{asset('style/js/application.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('style/js/main.js')}}"></script>
</body>

</html>
