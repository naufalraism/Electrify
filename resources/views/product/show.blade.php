@extends('layouts.template')
@section('title', 'Electrify')

@section('content')
   <div class="d-flex justify-content-center align-items-center mt-4">
      <div class="row">
         <div class="col-md-5">
            <div class="w-100">
               <img src="{{ asset($product->image) }}" class="rounded" alt="product.jpg" width="100%" height="100%">
            </div>
         </div>

         <div class="col-md">
            <h1 class="text-start fs-2"><b>{{ $product->name }}</b></h6>
               <h6 class="fs-5 mb-3">Rp. {{ number_format($product->price, 0, ',', '.') }}</h6>
               <div class="text-start fw-bold">DESCRIPTION</div>
               <div class="mb-3">{{ $product->description }}</div>

               <div class="d-flex gap-5 mb-4">
                  <div>
                     <div class="fw-bold">Stock</div>
                     <div >{{ $product->stock }}</div>
                  </div>
                  <div>
                     <div class="fw-bold">Category</div>
                     <div>{{ $product->category->name }}</div>
                  </div>
               </div>
               <a href="{{ route('product.index') }}" class="btn btn-primary px-4">Back</a>
         </div>
      </div>
   </div>
@endsection
