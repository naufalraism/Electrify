@extends('layouts.template')
@section('title', 'Register Account')

@section('content')
    <div class="container my-5 px-5">
        <div class="border border-2 rounded-3 mb-3 p-4">
            <div class="d-flex justify-content-center my-4 w-100">
                <h1 class="fw-bold fs-3">LOGIN</h1>
            </div>

            <form action="" class="container px-5">
                @csrf
                <div class="form-group mb-3 row">
                    <label for="email" class="form-label required">Email</label>
                    <div>
                        <input type="text" name="email" id="email" class="form-control ml-1">
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <label for="password" class="form-label required">Password</label>
                    <div>
                        <input type="text" name="password" id="password" class="form-control ml-1">
                    </div>
                </div>

                <div class="form-group w-100 mt-5">
                    <button type="submit" class="btn btn-success px-4 w-100 py-2 fs-5">Login</button>
                </div>

                <div class="d-flex justify-content-center w-100 mt-3">
                    <h3 class="fs-6">Doesn't have an account? <a href="{{ route('register') }}">Register here</a></h3>
                </div>
            </form>
        </div>
    </div>
@endsection
