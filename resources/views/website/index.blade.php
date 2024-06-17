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

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <img src="/website/assets/img/logo.png" alt="">
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    @foreach (\App\Models\Menu::all() as $item)
                    <li><a class="nav-link scrollto" href="{{ $item->link }}">{{ $item->name }}</a></li>
                    @endforeach
                    <a class="btn-getstarted scrollto" href="index.html#contact">Contacts</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-globe"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach (\App\Models\Lang::all() as $item)
                            <li><a class="dropdown-item text-uppercase" href="#">{{ $item->code }}</a></li>
                            @endforeach
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <section id="hero-animated" class="hero-animated d-flex align-items-left">
        @foreach (\App\Models\Hero::all() as $item)
        <div class="container d-flex flex-column justify-content-left align-items-left text-left position-relative"
            data-aos="zoom-out">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <h1>{{ $item->title }}</h1>
            <p>{{ $item->text }}</p>
            <div class="d-flex">
                <a href="{{ $item->link }}" class="btn-get-started scrollto">{{ $item->button }}</a>
            </div>
        </div>
        @endforeach
    </section>

    <main id="main">

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-out">
                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach (\App\Models\Brand::all() as $item)
                        <div class="swiper-slide"><img src="{{ $item->logo->getUrl() }}" class="img-fluid" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                <div class="row gy-5">
                    @foreach (\App\Models\Option::all() as $item)
                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ $item->image->getUrl() }}" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">
                                <div class="icon">
                                    {!! $item->icon !!}
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>{{ $item->title }}</h3>
                                </a>
                                <p>{{ $item->text }}</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->
                    @endforeach

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            @foreach (\App\Models\About::all() as $item)
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>{{ $item->title }}</h2>
                    <p>{{ $item->subtitle }}</p>
                </div>

                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="{{ $item->image->getUrl() }}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="mt-5">
                            {!! $item->text !!}
                        </div>
                    </div>

                </div>

            </div>
            @endforeach

        </section><!-- End About Section -->

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container">
                <div class="row gy-4">
                    @foreach (\App\Models\Service::all() as $item)
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                        <div class="service-item position-relative text-center">
                            <div class="icon">{!! $item->icon !!}</div>
                            <h4><a href="" class="stretched-link">{{ $item->title }}</a></h4>
                            <p>{{ $item->text }}</p>
                        </div>
                    </div><!-- End Service Item -->
                    @endforeach
                </div>
            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= Call To Action Section ======= -->
        <section id="cta" class="cta">
            @foreach (\App\Models\Ctum::all() as $item)
            <div class="container" data-aos="zoom-out">

                <div class="row g-5">

                    <div
                        class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                        <h3>{{ $item->title }}</h3>
                        <p>{{ $item->text }}</p>
                        <a class="cta-btn align-self-start" href="{{ $item->link }}">{{ $item->button }}</a>
                    </div>

                    <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
                        <div class="img">
                            <img src="{{ $item->image->getUrl() }}" alt="" class="img-fluid">
                        </div>
                    </div>

                </div>

            </div>
            @endforeach

        </section><!-- End Call To Action Section -->

        <!-- ======= On Focus Section ======= -->
        <section id="onfocus" class="onfocus">
            <!-- Slider main container -->
            <div class="swiper swiper-slides">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach (\App\Models\Slide::all() as $item)
                    <div class="swiper-slide">
                        <div class="container-fluid p-0" data-aos="fade-up">
                            <div class="row g-0">
                                <div class="col-md-6"
                                    style="background: url('{{ $item->image->getUrl() }}'); background-size: cover; backgroud-position: center center;">
                                </div>
                                <div class="col-md-6">
                                    <div class="content d-flex flex-column justify-content-center h-100">
                                        <h3>{{ $item->title }}</h3>
                                        <p class="fst-italic">
                                            {{ $item->subtitle }}
                                        </p>
                                        <p>{{ $item->text }}</p>
                                        <a href="{{ $item->link }}" class="read-more align-self-start"><span>{{
                                                $item->button }}</span><i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>

        </section><!-- End On Focus Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-header">
                    <h2>Contact Us</h2>
                    <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad
                        dolores
                        adipisci aliquam.</p>
                </div>

            </div>

            <div class="container">

                <div class="row">
                    @foreach (\App\Models\Contact::all() as $item)
                    <div class="col-md-6 col">
                        <div class="info">
                            <h3>{{ $item->title }}</h3>
                            <p>{{ $item->subtitle }}</p>
                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Location:</h4>
                                    <p>{{ $item->location }}</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>{{ $item->email }}</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Call:</h4>
                                    <p>{{ $item->call }}</p>
                                </div>
                            </div><!-- End Info Item -->
                            <div class="map mt-5">
                                {!! $item->google !!}
                            </div><!-- End Google Maps -->
                        </div>

                    </div>
                    @endforeach
                </div>

            </div>

            <div class="container mt-5">

                <div class="section-header">
                    <h2>Envie o seu pedido</h2>
                    <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad
                        dolores
                        adipisci aliquam.</p>
                </div>

            </div>
            <div class="container mt-5">
                <div class="row justify-content-md-center">
                    <div class="col-md-8">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div><!-- End Contact Form -->
                </div>
            </div>
        </section><!-- End Contact Section -->

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

</body>

</html>