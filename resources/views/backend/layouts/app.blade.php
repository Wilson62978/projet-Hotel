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
	<link rel="stylesheet" href="{{ asset('admin_assets/assets/css/vendorss.css') }}">
	<link rel="stylesheet" href="{{ asset('admin_assets/assets/css/aiz-core.css') }}">

    <style>
        body {
            font-size: 12px;
        }
    </style>
	<script>
    	var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: '{{ ('Rien de sélectionné') }}',
            nothing_found: '{{ ('Rien de trouvé') }}',
            choose_file: '{{ ('Choisir le fichier') }}',
            file_selected: '{{ ('Fichier sélectionné') }}',
            files_selected: '{{ ('Fichiers sélectionnés') }}',
            add_more_files: '{{ ('Ajouter plus de fichiers') }}',
            adding_more_files: '{{ ('Ajouter plus de fichiers') }}',
            drop_files_here_paste_or: '{{ ('Déposez les fichiers ici') }}',
            browse: '{{ ('Parcourir') }}',
            upload_complete: '{{ ('Téléchargement complet') }}',
            upload_paused: '{{ ('Téléchargement interrompue') }}',
            resume_upload: '{{ ('Reprendre le téléchargement') }}',
            pause_upload: '{{ ('Suspendre le téléchargement') }}',
            retry_upload: '{{ ('Réessayez de télécharger') }}',
            cancel_upload: '{{ ('Annuler le téléchargement') }}',
            uploading: '{{ ('Téléchargement') }}',
            processing: '{{ ('Traitement') }}',
            complete: '{{ ('Compléter') }}',
            file: '{{ ('Fichier') }}',
            files: '{{ ('fichiers') }}',
        }
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
			</div><!-- .main-content -->
		</div><!-- .content-wrapper -->
	</div><!-- .main-wrapper -->

    @yield('modal')


	<script src="{{ asset('admin_assets/assets/js/vendors.js') }}" ></script>
	<script src="{{ asset('admin_assets/assets/js/aiz-core.js') }}" ></script>

    @yield('script')

    <script type="text/javascript">
	    @foreach (session('flash_notification', collect())->toArray() as $message)
	        AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
	    @endforeach

    </script>

</body>
</html>
