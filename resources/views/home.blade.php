@extends('layouts.template')
@section('title', 'Electrify')

@section('content')
    <div class="container">
        <div id="carouselAutoplaying" class="carousel slide mb-5" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner.jpg') }}" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner.jpg') }}" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner.jpg') }}" class="d-block w-100" alt="">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <h2 class="fw-bold fs-3">Recommendation</h2>
        <div class="grid-layout-5 gap-2 mb-5">
            @foreach ($products as $product)
                <a href="{{ route('product.view', $product->id) }}" class="text-dark text-decoration-none card"
                    style="min-height: 350px">
                    <img src="{{ asset($product->image) }}" class="img-fluid w-100 border-bottom my-5" style="height:200px"
                        alt="">
                    <div class="card-body p-3">
                        <div class="mb-3">
                            <h2 class="card-title fs-5" style="font-weight: 400">{{ $product->name }}</h2>
                            <h3 class="fs-5" style="font-weight: 500;">Rp.
                                {{ number_format($product->price, 0, ',', '.') }}</h3>
                            <div class="d-flex align-items-center gap-1 mb-1">
                                <i class="fas fa-cubes"></i>
                                <p class="m-0">{{ $product->stock }} stock(s) available</p>
                            </div>
                            <p class="card-text text-muted">{{ $product->sold }} sold</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
@endsection
