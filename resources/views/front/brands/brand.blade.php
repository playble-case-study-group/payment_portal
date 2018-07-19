@extends('layouts.front.app')

@section('content')
    <div class="container">
        <hr>
        <h1>{{ $brand->name }}</h1>
        <small>
            {{ $brand->snippet }}
        </small>
        <p class="preline">
            {{ $brand->about }}
        </p>
        <br>
        <br>
        @foreach ($products as $product)
            <a class="btn btn-default browse-all-btn" href="{{ route('front.get.product', $product->slug) }}" role="button">{{ $product->name }} Resources</a>
        @endforeach
    </div>
@endsection