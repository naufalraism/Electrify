@extends('layouts.template')
@section('title', 'Register Account')

@section('content')
   <div class="container my-5">
      <div class="border border-2 rounded-3 mb-3 p-4">
         <div class="d-flex justify-content-center my-4 w-100">
            <h1 class="fw-bold fs-3">REGISTER</h1>
         </div>

         <form method="POST" action="{{ route('register.store') }}" class="px-4" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group mb-3 row">
                     <label for="name" class="form-label required">Name</label>
                     <div>
                        <input type="text" name="name" id="name"
                           class="form-control" value="{{ old('name') }}">
                     </div>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group mb-3 row">
                     <label for="gender" class="form-label required">Gender</label>
                     <div>
                        <select name="gender" id="gender" aria-label="Default select example"
                           class="form-select">
                           <option value="" hidden></option>
                           <option value="M">Male</option>
                           <option value="F">Female</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-6">
                  <div class="form-group mb-3 row">
                     <label for="phone_number" class="form-label required">Phone Number</label>
                     <div>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}">
                     </div>
                  </div>
               </div>
               
               <div class="col-md-6">
                  <div class="form-group mb-3 row">
                     <label for="profile_picture" class="form-label required">Profile Picture</label>
                     <div>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                     </div>
                  </div>
               </div>
            </div>

            <div class="form-group mb-3 row">
               <label for="address" class="form-label required">Address</label>
               <div>
                  <textarea name="address" id="address" rows="3" class="form-control">{{ old('address') }}</textarea>
                  @error('address')
                     <span class="invalid-feedback" role="alert">
                        {{ $message }}
                     </span>
                  @enderror
               </div>
            </div>

            <div class="form-group mb-3 row">
               <label for="email" class="form-label required">Email</label>
               <div>
                  <input type="text" name="email" id="email"
                     class="form-control" value="{{ old('email') }}">
               </div>
            </div>

            <div class="form-group mb-3 row">
               <label for="password" class="form-label required">Password</label>
               <div>
                  <input type="password" name="password" id="password"
                     class="form-control">
               </div>
            </div>

            <div class="form-group w-100 mt-5">
               <button type="submit" class="btn btn-success px-4 w-100 py-2 fs-5">Register</button>
            </div>

            <div class="d-flex justify-content-center mt-3">
               <h3 class="fs-6">Already have an account? <a href="{{ route('login') }}">Login here</a></h3>
            </div>
         </form>
      </div>
   </div>
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         const gender = "{{ old('gender', 'empty') }}"

         if (gender !== 'empty') {
            $('#gender').val(gender).change()
         }
      })
   </script>
@endsection
