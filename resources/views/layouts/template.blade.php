<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body style="padding-top:4rem" class="min-vh-100 d-flex flex-column">
   @include('layouts.navbar')
   <div class="my-4" style="flex: 1;">
      @yield('content')
   </div>
   @include('layouts.footer')
   @include('layouts.jssection')
   @yield('js-extra')
</body>

</html>
