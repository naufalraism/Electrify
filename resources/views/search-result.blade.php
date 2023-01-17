@extends('layouts.template')
@section('title', 'Electrify')

@section('content')
    <div class="container">
        <div class="row">
            <div class="container my-5">
                @if ($productResults->count() == 0)
                    <div class="alert alert-warning">
                        There is no matched product
                    </div>
                    <div class="row d-flex justify-content-center my-4">
                        @foreach ($allProducts as $product)
                            <div class="col-sm-3 mb-4">
                                <div class="card" style="height: 400px">
                                    <div class="w-100" style="height: 250px">
                                        <img src="{{ asset($product->image) }}" class="img-fluid w-100"
                                            style="height: 150px;" alt="">
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
                                            <a href="{{ route('product.view', $product->id) }}"
                                                class="btn btn-primary px-4">
                                                Detail
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $allProducts->links() }}
                @else
                    <div class="alert alert-warning">
                        There is no matched product
                    </div>
                    <div class="row d-flex justify-content-center my-4">
                        @foreach ($productResults as $product)
                            <div class="col-sm-3 mb-4">
                                <div class="card" style="height: 400px">
                                    <div class="w-100" style="height: 250px">
                                        <img src="{{ asset($product->image) }}" class="img-fluid w-100"
                                            style="height: 150px;" alt="">
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
                                            <a href="{{ route('product.view', $product->id) }}"
                                                class="btn btn-primary px-4">
                                                Detail
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $productResults->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
