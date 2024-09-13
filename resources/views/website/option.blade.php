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
                {!! $option->longtext !!}
            </div>
        </div>
    </div>
</div>
@endsection