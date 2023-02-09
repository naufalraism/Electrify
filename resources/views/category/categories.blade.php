@extends('layouts.template')
@section('title', 'Categories')

@section('content')
<div class="container">
        <div class="d-flex align-items-center justify-content-left my-4 w-100">
            <h1 class="fw-bold fs-3 mb-0"> Now Showing : {{ $category->name }}</h1>
        </div>

        <div class="row d-flex justify-content-center mb-4">
            @foreach ($productCategory as $product)
                <div class="col-sm-3 mb-4">
                    <div class="card" style="height: 500px">
                        <div class="w-100" style="height: 300px">
                            <img src="{{ asset($product->image) }}" class="img-fluid w-100" style="height: 200px;"
                                 alt="">
                        </div>

                        <div class="card-body">
                            <div class="mb-3">
                                <h2 class="card-title fs-4">{{ $product->name }}</h2>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <p>{{ $product->stock }} stock(s) available</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="card-text">{{ $product->sold }} sold</p>
                                    </div>
                                    <h3 class="fs-6">Rp. {{ $product->price }}</h3>
                                </div>
                            </div>

                            <div class="mb-2">

                                <a href="{{ route('product.view', $product->id) }}" class="btn btn-primary px-4">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    {{ $productCategory->links() }}
    </div>
@endsection
