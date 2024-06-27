<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BCP Mobility</title>
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="/website/assets/img/favicon.png" rel="icon">
    <link href="/website/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/website/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/website/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/website/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/website/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/website/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="/website/assets/css/variables.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/website/assets/css/main.css" rel="stylesheet">

    @yield('styles')

</head>

<body>

    <x-header />

    @yield('header')

    <main id="main">

        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <img src="/website/assets/img/logo-white.png" width="200">
                            @foreach (\App\Models\Contact::limit(1)->get() as $item)
                            <p>
                                {{ $item->loacation }}<br><br>
                                <strong>Phone:</strong> {{ $item->call }}<br>
                                <strong>Email:</strong> {{ $item->email }}<br>
                            </p>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="/">Home</a></li>
                            @foreach (\App\Models\Menu::all() as $item)
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ $item->link }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Services</h4>
                        <ul>
                            @foreach (\App\Models\Option::all() as $item)
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ $item->link }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">


                    </div>

                </div>
            </div>
        </div>

        <div class="footer-legal text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>bcpmobility.com</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        Designed by <a href="https://gestvde.pt">gesTVDE</a>
                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>

            </div>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/website/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/website/assets/vendor/aos/aos.js"></script>
    <script src="/website/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/website/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/website/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/website/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/website/assets/js/main.js"></script>

    @yield('scripts')

</body>

</html>