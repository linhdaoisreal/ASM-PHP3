<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('tittle')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   @include('client.layout.css')

</head>

<body>

    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            @include('client.layout.header-top')
            
            @include('client.layout.header-nav')
        </header>

        @yield('content')
        
        @include('client.layout.footer')
        
    </div>

    @include('client.layout.js')

    

</body>

</html>
