
@extends('layout.master')
@section('content')	 
@foreach($favorites as $favorite)
<div class="col-md-3 py-3 py-md-0">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('product.show', ['id' => $favorite->product->id]) }}">
                <img src="{{ asset($favorite->product->image) }}" alt="{{ $favorite->product->name }}">
                <h3>{{ $favorite->product->name }}</h3>
            </a>
            <p>{{ $favorite->product->description }}</p>
            <div class="star">
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < $favorite->product->rating)
                        <i class="fas fa-star checked"></i>
                    @else
                        <i class="fas fa-star"></i>
                    @endif
                @endfor
            </div>
            <h5>${{ $favorite->product->price }} <strike>$50</strike> 
                <span>
                    <i id="heart-{{ $favorite->product->id }}" class="fa-solid fa-heart text-danger" onclick="toggleFavorite({{ $favorite->product->id }})"></i>
                </span>
            </h5> 
        </div>
    </div>
</div>
@endforeach

@endsection