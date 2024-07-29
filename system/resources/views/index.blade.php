<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MONAS - Monitoring Aset Dinas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{url('public/assets/img/icons/ktp.png')}}" rel="icon" type="image/png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url('public')}}/landing/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{url('public')}}/landing/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('public')}}/landing/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{url('public')}}/landing/css/style.css" rel="stylesheet">
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
        <a href="index.html" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
            <h2 class="mb-2 text-white">MONAS</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative mb-5">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{url('public')}}/landing/img/carousel-1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Aplikasi</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Monitoring Aset Dinas<br>    <span class="text-primary">MONAS</span> </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">   </p>
                                <a href="{{url('login')}}" class="btn btn-primary py-md-3 px-md-5 animated slideInRight">Masuk Aplikasi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{url('public')}}/landing/img/about.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-3">Tentang</h6>
                    <h1 class="mb-5">Aplikasi Monitoring Aset Dinas (MONAS)</h1>
                    <p class="mb-5">Penggunaan sistem seperti MONAS dalam manajemen aset dinas tidak hanya meningkatkan efisiensi, tetapi juga memastikan informasi yang akurat dan tepat waktu untuk mendukung pengambilan keputusan yang lebih baik.</p>
                    
                    <a href="{{url('login')}}" class="btn btn-primary py-3 px-5">Masuk Ke Aplikasi</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>JL Letjen S. Parman, Kantor, Kec. Delta Pawan, Kabupaten Ketapang, Kalimantan Barat</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>053432501</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>dinaspendidikan@ketapangkab.go.id</p>
                 
                </div>
                <div class="col-lg-8 col-md-6">
                    <h4 class="text-light mb-4">Maps</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.777519063772!2d109.97614107484442!3d-1.832651736467067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e0518178cebfebb%3A0x198a8530770d0b03!2sDinas%20Pendidikan%20Kab.%20Ketapang!5e0!3m2!1sen!2sid!4v1721839101394!5m2!1sen!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Monitoring Aset Dinas</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Politeknik Negeri Ketapang
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
<script src="{{url('public')}}/landing/lib/wow/wow.min.js"></script>
<script src="{{url('public')}}/landing/lib/easing/easing.min.js"></script>
<script src="{{url('public')}}/landing/lib/waypoints/waypoints.min.js"></script>
<script src="{{url('public')}}/landing/lib/counterup/counterup.min.js"></script>
<script src="{{url('public')}}/landing/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="{{url('public')}}/landing/js/main.js"></script>
</body>

</html>