@extends('layouts.template')
@section('title', 'Electrify')

@section('content')

   <div class="container">
      <table id="cart" class="table table-hover table-condensed">
         <thead>
         <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
         </tr>
         </thead>
         <tbody>
         @if($cart != null)
            @foreach($cart as $cart)
               <tr>
                  <td data-th="Product">
                     <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="{{ asset($cart->product->image) }}" width="100" height="100" class="img-responsive"/></div>
                        <div class="col-sm-9">
                           <h4 class="nomargin">{{ $cart->product->name }}</h4>
                        </div>
                     </div>
                  </td>
                  <td data-th="Price">Rp{{ number_format($cart->product->price, 0, ',', '.') }}</td>
                  <td data-th="Quantity">
                     {{ $cart->quantity }}
                  </td>
                  <td data-th="Subtotal" class="text-center">Rp{{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</td>
                  <td class="actions" data-th="">
                     <form method="post" action="{{route('deleteCart', $cart->id)}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="delete">Delete</button>
                     </form>

                  </td>
               </tr>
            @endforeach
         @else
            <a>Cart Is Empty!!</a>
         @endif


         </tbody>
         <tfoot>

         <tr>
            <td><a href="{{ route('product.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>

            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total Rp{{ number_format($total, 0, ',', '.') }}</strong></td>
            <td><a href="{{route('checkout')}}" class="btn btn-warning"> CheckOut </a></td>
         </tr>
         </tfoot>
      </table>
   </div>
   <br>
@endsection