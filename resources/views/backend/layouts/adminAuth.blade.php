<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ env('APP_URL')}}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
  	<title></title>

    <!-- google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

	<link rel="stylesheet" href="{{ asset('admin_assets/assets/css/vendorss.css') }}">
	<link rel="stylesheet" href="{{ asset('admin_assets/assets/css/aiz-core.css') }}">

</head>
<body>
    <div class="main-wrapper d-flex">
        <div class="flex-grow-1">
            @yield('content')
        </div>
    </div>
</body>
</html>
