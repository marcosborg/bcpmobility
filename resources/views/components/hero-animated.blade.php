@foreach ($heros as $item)
<section class="hero-animated d-flex align-items-left" style="background: url({{ $item->image ? $item->image->getUrl() : '/website/assets/img/hero-bg.png' }}) center center;">
    <div class="container d-flex flex-column justify-content-left align-items-left text-left position-relative"
        data-aos="zoom-out">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <h1>{{ $item->title }}</h1>
        <p>{{ $item->text }}</p>
        <div class="d-flex">
            <a href="{{ $item->link }}" class="btn-get-started scrollto m-2">{{ $item->button }}</a>
            <a href="{{ $item->link_2 }}" class="btn-get-started scrollto m-2">{{ $item->button_2 }}</a>
        </div>
    </div>
</section>
@endforeach
<script>
    console.log({!! $heros !!})
</script>