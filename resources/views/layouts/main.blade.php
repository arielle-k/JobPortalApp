<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script defer src="{{ asset('js/app.js') }}"  ></script>

    <script  src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <STYLE>
        .img-nav{min-width:44px;width:44px;height:44px}
    </STYLE>


<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

   @include('partials.head')


</head>
<body>
    @include('partials.nav')

        <main class="main py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

