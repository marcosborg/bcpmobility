<!-- ======= Clients Section ======= -->
<section id="clients" class="clients">
    <div class="container" data-aos="zoom-out">
        <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
                @foreach ($clients as $item)
                <div class="swiper-slide"><img src="{{ $item->logo->getUrl() }}" class="img-fluid" alt="">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section><!-- End Clients Section -->