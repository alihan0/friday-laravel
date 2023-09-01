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
  <style>
    .clock {
        display: inline-block;
        background-color: #f7f7f7;
        border: 10px solid #222;
        border-radius: 50%;
        width: 300px;
        height: 300px;
        position: relative;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
    }
    
    .clock-inner {
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        background-color: #f7f7f7;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .clock-time {
        font-size: 2em;
        color: #333;
    }
    
    .btn-outline-secondary {
        border-color: #ccc;
        color: #333;
    }
    
    .btn-outline-secondary:hover {
        background-color: #ccc;
    }
</style>

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

		$(document).ready(function () {
			$("#projectSelect").on("change", function () {
				const id = $(this).val();

				const modalContent = `
					<div class="modal fade" id="timeModal" tabindex="-1"  data-bs-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="projectTitle">Çalışma Zamanı</h5>
								</div>
								<div class="modal-body text-center">
									<div class="clock">
										<div class="clock-inner">
											<div class="clock-time">
												<div id="clockStartedAt" class="mb-2 fs-5"></div>
												<span id="timeDifference" class="display-3">00:00:00</span>
											</div>
										</div>
									</div>
									<input type="hidden" id="timeDifferenceInSeconds">
								</div>
								<div class="modal-footer justify-content-end" data-bs-toggle="tooltip" title="Durdur">
									<button type="button" class="btn btn-danger" id="stop">
										<i data-feather="square"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				`;

				$("body").append(modalContent);
				feather.replace();

				const getCurrentTime = () => {
					const now = new Date();
					return now.toLocaleTimeString();
				};

				const formatTime = (hours, minutes, seconds) => {
					return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
				};

				const projectName = $("#projectSelect option:selected").text();
				$("#projectTitle").text(`${projectName} üzerinde çalışıyorsun`);

				let startTimeInSeconds = Math.floor(Date.now() / 1000);
				const updateClockStartedAt = () => {
					const startDate = new Date(startTimeInSeconds * 1000);
					const formattedStartDate = startDate.toLocaleTimeString();
					$("#clockStartedAt").text(`Started at: ${formattedStartDate}`);
				};

				updateClockStartedAt();
				let isPaused = false;
				let updateInterval;

			

				const updateTimeDifference = () => {
					if (!isPaused) {
						const currentTimeInSeconds = Math.floor(Date.now() / 1000);
						const timeDifferenceInSeconds = currentTimeInSeconds - startTimeInSeconds;

						const hours = Math.floor(timeDifferenceInSeconds / 3600);
						const minutes = Math.floor((timeDifferenceInSeconds % 3600) / 60);
						const seconds = timeDifferenceInSeconds % 60;

						$("#timeDifference").text(formatTime(hours, minutes, seconds));
						$("#timeDifferenceInSeconds").val(timeDifferenceInSeconds)
					}
				};

				updateInterval = setInterval(() => {
					updateTimeDifference();
				}, 1000);

				$("#timeModal").modal("show");

				$("#timeModal").on("hidden.bs.modal", function () {
					clearInterval(updateInterval);
					$(this).remove();
				});

				$("#stop").on("click", function () {
				const passedTime = $("#timeDifferenceInSeconds").val();
				const project = $("#projectSelect").val();
				// Axios ile POST isteği yapma
				axios.post('/project/proccess/save', { passedTime: passedTime, project:project })
					.then(function (response) {
					
						if(response.data.status){
							toastr["success"]("Çalışma süresi kaydedildi.");
							$("#timeModal").modal("hide");
							setInterval(() => {
								window.location.reload();
							}, 1000);
						}
						
					})
					.catch(function (error) {
						toastr["error"]("Çalışma Süresi Kaydedilmedi!");
					});
			});

			});
		});



	</script>
</body>
</html>