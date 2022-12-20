@extends('layouts.template')
@section('title', 'Electrify')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-center my-4 w-100">
            <img src="{{ asset('images/banner.png') }}" alt="">
        </div>

        <h2>Recommendation</h2>
        <div class="row d-flex justify-content-center my-4">
            @foreach ($products as $product)
                <div class="col-sm-3 mb-4">
                    <div class="card" style="height: 500px">
                        <div class="w-100" style="height: 300px">
                            <img src="{{ asset($product->image) }}" class="img-fluid w-100" style="height: 250px;"  alt="">
                        </div>

                        <div class="card-body">
                            <h2 class="card-title">{{ $product->name }}</h2>
                            <div class="row">
                              <div class="col-sm-7">
                                 <p>{{ $product->stock }} stock(4) available</p>
                              </div>
                              <div class="col-sm-4">
                                 <p class="card-text">{{ $product->sold }} sold</p>
                              </div>
                              <h3 class="fs-6">Rp. {{ $product->price }}</h3>
                            </div>
                        </div>

                        <div class="m-3">
                            {{-- {{ route('product.view', $product->id) }} --}}
                            <a href="" class="btn btn-primary px-4">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
