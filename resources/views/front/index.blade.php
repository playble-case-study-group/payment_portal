@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
    @include('layouts.front.home-slider')
        <section class="new-product t100 home">
            <hr class="spacing-fix">
            <div class="container">
                <div class="section-title b50">
                    <h2>Learn More about our Simulations</h2>
                </div>
                <div class="card-deck">
                    @foreach ($cat1 as $brand)
                    <div class="card bg-light" style="width: 18rem;">
                        <img class="card-img-top" src="../images/{{ $brand->name }}.png" alt="{{ $brand->name }}">
                        <div class="card-body">
                            <h3 class="card-title">{{ $brand->name }}</h3>
                            <p class="card-text">{{ $brand->snippet }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="simulation/{{$brand->id}}" class="btn btn-primary btn-yellow">Learn More</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    <br>
    <div id="browse-all-btn"> <a class="btn btn-default browse-all-btn" href="{{ route('front.category.slug', 'all-products') }}" role="button">browse all items</a></div>
    <br>
    <br>
    <br>
@endsection