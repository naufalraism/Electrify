<!DOCTYPE html>
<html lang="en">
@include('layouts.header')

<body style="padding-top:4rem">
    @include('layouts.navbar')
    <div class="content">
        @yield('content')
    </div>
    @include('layouts.footer')
</body>
@yield('js-extra')

</html>