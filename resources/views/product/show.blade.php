@extends('layouts.template')
@section('title', 'Electrify')

@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row" style="margin-top: 100px; margin-bottom: 50px">
            <div class="col">
                <img src="{{ asset($product->image) }}" class="rounded float-end" alt="product.jpg">
            </div>
            <div class="col">
                <h1 class="text-start"><b>{{ $product->name }}</b></h6>
                    <h6>Rp. {{ number_format($product->price, 0, ',', '.') }}</h6>
                    <p class="text-start"><b>DESCRIPTION</b> <br> {{ $product->description }}</p>
                    <div class="row">
                        <div class="col-sm">
                            <p><b>Stock</b></p>
                            <p>{{ $product->stock }}</p>
                        </div>
                        <div class="col-sm">
                            <p><b>Category</b></p>
                            <p>{{ $product->category->name }}</p>
                        </div>
                    </div>
                    <a href="{{ route('product.index') }}" class="btn btn-primary px-4"> Back </a>
            </div>
        </div>

    </div>
@endsection
