<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="row gy-5">
            @foreach ($services as $item)
            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="service-item">
                    <div class="img">
                        <img src="{{ $item->image->getUrl() }}" class="img-fluid" alt="">
                    </div>
                    <div class="details position-relative">
                        <div class="icon">
                            {!! $item->icon !!}
                        </div>
                        <a href="/services/{{ $item->id }}/{{ Str::slug($item->title) }}" class="stretched-link">
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