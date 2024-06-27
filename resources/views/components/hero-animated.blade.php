<section id="hero-animated" class="hero-animated d-flex align-items-left">
    @foreach ($heros as $item)
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