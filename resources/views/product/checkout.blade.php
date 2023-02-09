@extends('layouts.template')
@section('title', 'Checkout')

@section('content')

   <div class="d-flex align-items-center justify-content-center my-4 w-100">
      <h1 class="fw-bold fs-3 mb-0"> Thank you for your Purchase</h1>
   </div>
   <div class="d-flex align-items-center justify-content-center my-4 w-100">
      <h2 class="fw-bold fs-3 mb-0" > Click <a href="{{ route('product.index') }}">here</a> to go back to Homepage</h2>
   </div>
@endsection