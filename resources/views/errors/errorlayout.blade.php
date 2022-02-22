<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body>
    <div class="position-absolute top-50 start-50 translate-middle error text-center">
        <h1>
            @yield('error')
        </h1>
        <h3 class="py-2">@yield('errordescription')</h3>
        <a href="{{route('admin.apartments.index')}}">
        <button class="btn mb-2 mb-md-0  btn-block btn-round btn-custom">Return to Homepage</button></a>
    </div>
</body>

</html>