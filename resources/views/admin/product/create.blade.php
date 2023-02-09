@extends('layouts.template')

@section('title', 'PRODUCT')

@section('content')
   <div class="container mb-5">
      <form class="shadow p-4" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
         @method('POST')
         @csrf

         <div class="d-flex align-items-center gap-5">
            <img src="{{ asset($product->image) }}" alt="" id="product-image" width="250px" height="250px">
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="name" class="form-label">Name</label>
                     <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                  </div>
               </div>

               <div class="col-md-6">
                  <label for="name" class="form-label">Category</label>
                  <select class="form-select" name="category_id" aria-label="Default select example">
                     @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                           {{ @$product->category_id == old('category_id') ? 'selected' : '' }}>
                           {{ $category->name }}
                        </option>
                     @endforeach
                  </select>
               </div>

               <div class="col-md-3">
                  <div class="mb-3">
                     <label for="price" class="form-label">Price</label>
                     <input type="number" id="price" class="form-control" name="price" value="{{ old('price') }}">
                  </div>
               </div>

               <div class="col-md-3">
                  <div class="mb-3">
                     <label for="stock" class="form-label">Stock</label>
                     <input type="number" id="stock" class="form-control" name="stock" value="{{ old('stock') }}">
                  </div>
               </div>

               <div class="col-md-6">
                  <label for="image" class="form-label">Image</label>
                  <input class="form-control" type="file" id="image" name="image">
               </div>

               <div class="col-md-12">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3"></textarea>
               </div>

            </div>
         </div>

         <div class="d-grid mt-5">
            <button class="btn btn-success">Edit Product</button>
         </div>
      </form>
   </div>

@endsection

@section('js-extra')
   <script>
      $('.delete-form').click(function(e) {
         e.preventDefault();
         swal({
               title: "Are you sure?",
               text: "Once deleted, you will not be able to recover this product!",
               icon: "warning",
               buttons: true,
               dangerMode: true,
            })
            .then((willDelete) => {
               if (willDelete) {
                  this.submit();
               }
            });
      });
   </script>
@endsection
