@extends('layouts.template')
@section('title', 'Profile')

@section('content')
   <div class="container mb-4">
      <div class="d-flex justify-content-center mb-4 w-100">
         <h1 class="fw-bold fs-3">PROFILE</h1>
      </div>

      <div class="border border-2 rounded-3 mb-3 p-4 row">
         <div class="col-md-3 d-flex justify-content-center">
            <img src="{{ asset($user->profile_picture) }}" alt="" width="200px" height="300px">
         </div>

         <form method="POST" action="{{ route('profile.update', $user->id) }}" class="px-4 col-md"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row">
               <div class="col-md-6">
                  <div class="form-group mb-3">
                     <label for="name" class="form-label required">Name</label>
                     <div>
                        <input type="text" name="name" id="name" class="form-control"
                           value="{{ old('name', $user->name) }}">
                     </div>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group mb-3 ">
                     <label for="profile_picture" class="form-label required">Profile Picture</label>
                     <div>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                     </div>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-6">
                  <div class="form-group mb-3">
                     <label for="phone_number" class="form-label required">Phone Number</label>
                     <div>
                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                           value="{{ old('phone_number', $user->phone_number) }}">
                     </div>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group mb-3">
                     <label for="gender" class="form-label required">Gender</label>
                     <div>
                        <select name="gender" id="gender" aria-label="Default select example" class="form-select">
                           <option value="" hidden></option>
                           <option value="M">Male</option>
                           <option value="F">Female</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>

            <div class="form-group mb-3">
               <label for="address" class="form-label required">Address</label>
               <div>
                  <textarea name="address" id="address" rows="3" class="form-control">{{ old('address', $user->address) }}</textarea>
               </div>
            </div>

            <div class="form-group mb-3">
               <label for="email" class="form-label required">Email</label>
               <div>
                  <input type="text" name="email" id="email" class="form-control"
                     value="{{ old('email', $user->email) }}">
               </div>
            </div>

            <div class="form-group mb-3">
               <label for="password" class="form-label required">Password</label>
               <div>
                  <input type="password" name="password" id="password" class="form-control">
               </div>
            </div>

            <div class="form-group d-flex justify-content-center mt-5">
               <button type="submit" class="btn btn-success px-4 py-2 fs-5">save</button>
            </div>
         </form>
      </div>
   </div>
@endsection

@section('js-extra')
   <script>
      $(document).ready(function() {
         const gender = "{{ old('gender', $user->gender) }}"

         if (gender !== 'empty') {
            $('#gender').val(gender).change()
         }
      })
   </script>
@endsection
