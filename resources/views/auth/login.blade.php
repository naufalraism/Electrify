@extends('layouts.template')
@section('title', 'Register Account')

@section('content')
    <div class="container my-5 px-5">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissable fade show" role="alert">
               {{ session('success') }}
               <button type="button" class="btn-close text-end" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissable fade show" role="alert">
               {{ session('loginError') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="border border-2 rounded-3 mb-3 p-4">
            <div class="d-flex justify-content-center my-4 w-100">
                <h1 class="fw-bold fs-3">LOGIN</h1>
            </div>

            <form method="POST" action="{{ route('login.authenticate') }}" class="container px-5">
               @csrf
               <div class="form-group mb-3 row">
                     <label for="email" class="form-label required">Email</label>
                     <div>
                           <input type="text" name="email" id="email"
                              class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

                           @error('email')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                           @enderror
                     </div>
               </div>

               <div class="form-group mb-3 row">
                     <label for="password" class="form-label required">Password</label>
                     <div>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">

                        @error('password')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                           @enderror
                     </div>
               </div>

               <div class="form-group w-100 mt-5">
                  <button type="submit" class="btn btn-success px-4 w-100 py-2 fs-5">Login</button>
               </div>

               <div class="d-flex justify-content-center w-100 mt-3">
                  <h3 class="fs-6">Doesn't have an account? <a href="{{ route('register.index') }}">Register here</a></h3>
               </div>
            </form>
        </div>
    </div>
@endsection

@section('js-extra')

@endsection