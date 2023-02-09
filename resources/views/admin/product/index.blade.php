@extends('layouts.template')

@section('title', 'PRODUCT')

@section('content')
   <div class="container mb-5">
      <div class="shadow p-3" style="z-index: 100">
         <div class="text-end">
            <a href="{{ route('admin.product.create') }}" class="btn btn-lg btn-primary">Create</a>
         </div>
         <table class="table table-responsive" style="z-index: 100">
            <thead>
               <th>No</th>
               <th>Product Name</th>
               <th>Product Image</th>
               <th>Product Price</th>
               <th>Total Sold</th>
               <th>Action</th>
            </thead>
            <tbody>
               @foreach ($products as $product)
                  <tr>
                     <td>{{ $loop->index }}</td>
                     <td>{{ $product->name }}</td>
                     <td><img src="{{ asset($product->image) }}" alt="" width="75px" height="75px"></td>
                     <td class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                     <td>{{ $product->sold }}</td>
                     <td class="">
                        <form action="{{ route('admin.product.destroy') }}" class="delete-form d-inline" method="POST">
                           @method('DELETE')
                           @csrf
                           <input type="hidden" name="product_id" value="{{ $product->id }}">
                           <button type="submit" class="btn btn-danger me-2 d-inline">
                              <i class="fas fa-trash-alt"></i>
                           </button>
                        </form>
                        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning">
                           <i class="fas fa-pencil-alt"></i>
                        </a>
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
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
