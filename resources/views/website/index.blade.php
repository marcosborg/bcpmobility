@extends('layouts.website')
@section('header')
<x-hero-animated />
@endsection
@section('content')
<x-clients />

<x-services-section />

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

<!-- ======= Call To Action Section ======= -->
<section id="cta" class="cta">
    @foreach (\App\Models\Ctum::all() as $item)
    <div class="container" data-aos="zoom-out">

        <div class="row g-5">

            <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
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
            <h2>Contactos</h2>
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
                            <h4>Endereço:</h4>
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
                            <h4>Telefone:</h4>
                            <p>{{ $item->call }}</p>
                        </div>
                    </div><!-- End Info Item -->
                    <div class="info-item d-flex">
                        <i class="bi bi-whatsapp flex-shrink-0"></i>
                        <div>
                            <h4>Whatsapp:</h4>
                            <p><a href="https://wa.me/{{ $item->whatsapp }}" target="_blank" class="btn btn-sm btn-success">Enviar mensagem</a></p>
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
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                            required>
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
@endsection