@extends('layouts')

@section('content')

<div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="card">
                <div class="">
                    <img src="{{ asset('images/'.$product->image) }}" alt=""  class="rounded shadow-sm img-thumbnail mx-1">
                    <div class="caption mx-3">
                        <h4>{{ $product->name }}</h4>
                        <p>{{ $product->description }}</p>
                        <p><strong>Price: </strong> {{ $product->price }}$</p>
                        <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
            </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
