<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>@yield('title') - {{env('APP_NAME')}}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="/static/assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="/static/assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="/static/assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="/static/assets/css/demo1/style.css">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="/static/assets/images/favicon.png" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"/>

  @yield('style')
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:../../partials/_sidebar.html -->
		
    @include('layout.sidebar')
		<!-- partial -->
	
		<div class="page-wrapper">
				
			<!-- partial:../../partials/_navbar.html -->
			@include('layout.topbar')
			<!-- partial -->

			<div class="page-content">
                @yield('content')
			</div>

			<!-- partial:../../partials/_footer.html -->
			@include('layout.footer')
			<!-- partial -->
	
		</div>
	</div>

	@include('layout.modal')
	<!-- core:js -->
	<script src="/static/assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="/static/assets/vendors/feather-icons/feather.min.js"></script>
	<script src="/static/assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <!-- End custom js for this page -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="/static/assets/js/toastr-init.js"></script>
  	@yield('script')
	<script>
		function changePassword(){
			var password = $("#password").val();
			axios.post('/auth/change-password', {password:password}).then(() =>{
				window.location.assign('/auth/logout');
			})
		}
	</script>
</body>
</html>