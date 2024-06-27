@extends('layouts.website')
@section('header')
<div class="container text-center mt-5 p-5">
    <h1>{{ $option->title }}</h1>
</div>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $option->image->getUrl() }}" class="img-thumbnail">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <small>{{ $option->text }}</small>
                </div>
            </div>
            <div class="mt-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus metus lacus, ultrices nec dapibus
                vitae, tincidunt a nisl. In arcu diam, laoreet sollicitudin ligula in, posuere finibus mi. Maecenas
                lacus velit, volutpat non feugiat non, sodales eu tellus. Sed finibus mi sed ligula congue dapibus.
                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum
                ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus posuere lorem nec
                fringilla malesuada. Sed ac nunc tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                tincidunt ac felis feugiat efficitur. Vestibulum tristique iaculis tellus at dapibus. Nam dapibus urna
                tellus, et porta sapien mollis vitae. Ut convallis ante eros, mattis cursus orci congue a. Suspendisse
                sit amet euismod quam.
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            {!! $option->longtext !!}
        </div>
    </div>
</div>
@endsection
<script>
    console.log({!! $option !!})
</script>