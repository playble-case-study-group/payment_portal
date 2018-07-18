@extends('layouts.front.app')

@section('content')
    <div class="container">
        <hr>
        <h1>{{ $brand->name }}</h1>
        <small>
            {{ $brand->snippet }}
        </small>
        <p>
            {{ $brand->about }}
        </p>
    </div>
@endsection