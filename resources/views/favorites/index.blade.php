@extends('layout.master')

@section('content')
    <div class="container">
        <h1>Favorite Products</h1>
        <div class="row">
            @foreach($favoriteProducts as $product)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('product.show', ['id' => $product->id]) }}">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                <h3>{{ $product->name }}</h3>
                            </a>
                            <!-- Other details -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
