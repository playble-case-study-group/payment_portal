@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
    @include('layouts.front.home-slider')
        <section class="new-product t100 home">
            <div class="container">
                <div class="card-deck">
                    @foreach ($cat1 as $brand)
                    <div class="card bg-light" style="width: 18rem;">
                        <img class="card-img-top" src="../images/{{ $brand->name }}.png" alt="{{ $brand->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $brand->name }}</h5>
                            <p class="card-text">{{ $brand->snippet }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>


    <div id="browse-all-btn"> <a class="btn btn-default browse-all-btn" href="{{ route('front.category.slug', 'all-products') }}" role="button">browse all items</a></div>
    <br>
    <br>
@endsection