<!doctype html>
<html lang="fr">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="app-url" content="">


	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Favicon -->
	<title></title>

	<!-- google font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

	<!-- aiz core css -->
	<link rel="stylesheet" href="{{ asset('admin_assets/assets/css/vendors.css') }}">
	<link rel="stylesheet" href="{{ asset('admin_assets/assets/css/aiz-core.css') }}">

    <style>
        body {
            font-size: 12px;
        }
    </style>
	<script>
    	var AFRI = AFRI || {};
	</script>

</head>
<body class="">

	<div class="main-wrapper">
        @include('backend.inc.admin_sidenav')
		<div class="content-wrapper">
            @include('backend.inc.admin_nav')
			<div class="main-content">
				<div class="px-15px px-lg-25px">
                    @yield('content')
				</div>
				<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
					<p class="mb-0">&copy; </p>
				</div>
			</div>
		</div>
	</div>

    @yield('modal')


	<script src="{{ asset('admin_assets/assets/js/vendors.js') }}" ></script>
	<script src="{{ asset('admin_assets/assets/js/aiz-core.js') }}" ></script>

    @yield('script')

    <script type="text/javascript">
	    @foreach (session('flash_notification', collect())->toArray() as $message)
	        AFRI.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
	    @endforeach
    </script>

</body>
</html>
