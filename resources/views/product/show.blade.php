@extends('layouts.template')
@section('title', 'Product')

@section('content')
   <div class="d-flex justify-content-center align-items-center my-4">
      <div class="row">
         <div class="col-md-5">
            <div class="w-100">
               <img src="{{ asset($product->image) }}" class="rounded" alt="product.jpg" width="100%" height="100%">
            </div>
         </div>

         <div class="col-md">
            <h1 class="text-start fs-2"><b>{{ $product->name }}</b></h6>
               <h6 class="fs-5 mb-3">Rp{{ number_format($product->price, 0, ',', '.') }}</h6>
               <div class="text-start fw-bold">DESCRIPTION</div>
               <div class="mb-3">{{ $product->description }}</div>

               <div class="d-flex gap-5 mb-4">
                  <div>
                     <div class="fw-bold">Stock</div>
                     <div>{{ $product->stock }}</div>
                  </div>
                  <div>
                     <div class="fw-bold">Category</div>
                     <div>{{ $product->category->name }}</div>
                  </div>
               </div>

               <form action="{{ route('addToCart', $product->id) }}" method="post">
                  @csrf
                  <div class="mb-2 ">
                     <label for="quantity" class="form-label">Quantity:</label>
                     <input type="number" name="quantity" class="form-control" id="quantity">
                  </div>
                  <div class="mb-2">
                     <button type="submit" class="btn btn-success px-4">Add To Cart</button>
                  </div>
               </form>

               <a href="{{ route('product.index') }}" class="btn btn-warning px-4">Back</a>
         </div>
      </div>
   </div>
@endsection
