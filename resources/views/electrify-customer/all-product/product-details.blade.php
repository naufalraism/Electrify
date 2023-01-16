@extends('layouts.template')
@section('title', 'Electrify')

@section('content')

    <div class="container d-flex justify-content-center align-items-center">
        <div>
            <h1>
                {{$product->name}}
            </h1>
            <div class="w-100">
                <div class="mb-3 d-flex align-items-center justify-content-center">
                    <img src="{{ asset($product->image) }}" alt="" class="w-50" >
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" aria-describedby="emailHelp" name="description"
                           disabled value="{{$product->description}}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{$product->stock}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Category</label>
                    <input type="text" class="form-control" id="stock" name="stock" value="{{$product->category->name}}" disabled>
                </div>
            </div>
        </div>
    </div>

@endsection
