<!doctype html>
<html lang="en">

<head>

	<!-- Basic Page Needs
================================================== -->
	<title>Hireo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<!-- CSS
================================================== -->
	<link rel="stylesheet" href="{{ asset("/assets/frontsite/css/style.css") }}">
	<link rel="stylesheet" href="{{ asset("/assets/frontsite/css/colors/blue.css") }}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="gray">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header Container
================================================== -->
        @include('layouts.header')
		<div class="clearfix"></div>
		<!-- Header Container / End -->


		<!-- Dashboard Container -->
		<div class="dashboard-container">

			<!-- Dashboard Sidebar
	================================================== -->
			<div class="dashboard-sidebar">
				<div class="dashboard-sidebar-inner" data-simplebar>
					<div class="dashboard-nav-container">

						<!-- Responsive Navigation Trigger -->
						<a href="{{ url("#") }}" class="dashboard-responsive-nav-trigger">
							<span class="hamburger hamburger--collapse">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</span>
							<span class="trigger-title">Dashboard Navigation</span>
						</a>

						<!-- Navigation -->
						<div class="dashboard-nav">
							<div class="dashboard-nav-inner">

								<ul data-submenu-title="Start">
									<li class="active"><a href="{{ route('user.dashboard') }}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
									<li><a href="{{ url("dashboard-messages.html") }}"><i class="icon-material-outline-question-answer"></i> Messages <span class="nav-tag">2</span></a></li>
									<li><a href="{{ url("dashboard-bookmarks.html") }}"><i class="icon-material-outline-star-border"></i> Bookmarks</a></li>
									<li><a href="{{ url("dashboard-reviews.html") }}"><i class="icon-material-outline-rate-review"></i> Reviews</a></li>
								</ul>

								<ul data-submenu-title="Organize and Manage">

									<li><a href="{{ url("#") }}"><i class="icon-material-outline-assignment"></i> Projects</a>
										<ul>
											<li><a href="{{ route("user.projects.index") }}">Manage Projects <span class="nav-tag">2</span></a></li>
											<li><a href="{{ url("dashboard-manage-bidders.html") }}">Manage Bidders</a></li>
											<li><a href="{{ route("user.projects.create") }}">Post a Project</a></li>
										</ul>
									</li>
								</ul>

								<ul data-submenu-title="Account">
									<li><a href="{{ route('user.settings')  }}"><i class="icon-material-outline-settings"></i> Settings</a></li>
									<li>
                                        <a href="{{ route('logout') }}" class="nav-link"
                                           onclick="event.preventDefault(); document.getElementById('logout').submit();"><i
                                                class="icon-material-outline-power-settings-new"></i>
                                            Logout
                                        </a>
                                        <form action="{{ route('logout') }}" method="post" style="display: none;"
                                              id="logout">
                                            @csrf
                                            <input type="hidden" value="admin" name="guard">
                                        </form>
                                    </li>
								</ul>

							</div>
						</div>
						<!-- Navigation / End -->

					</div>
				</div>
			</div>
			<!-- Dashboard Sidebar / End -->

			<!-- Dashboard Content
	================================================== -->
			<div class="dashboard-content-container" data-simplebar>
				<div class="dashboard-content-inner">


					@yield('content')
					<!-- Footer -->
					<div class="dashboard-footer-spacer"></div>
					<div class="small-footer margin-top-15">
						<div class="small-footer-copyrights">
							© 2018 <strong>Hireo</strong>. All Rights Reserved.
						</div>
						<ul class="footer-social-links">
							<li>
								<a href="#" title="Facebook" data-tippy-placement="top">
									<i class="icon-brand-facebook-f"></i>
								</a>
							</li>
							<li>
								<a href="#" title="Twitter" data-tippy-placement="top">
									<i class="icon-brand-twitter"></i>
								</a>
							</li>
							<li>
								<a href="#" title="Google Plus" data-tippy-placement="top">
									<i class="icon-brand-google-plus-g"></i>
								</a>
							</li>
							<li>
								<a href="#" title="LinkedIn" data-tippy-placement="top">
									<i class="icon-brand-linkedin-in"></i>
								</a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<!-- Footer / End -->

				</div>
			</div>
		</div>
		<!-- Dashboard Container / End -->

	</div>
	<!-- Wrapper / End -->


	<!-- Apply for a job popup
================================================== -->
	<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

		<!--Tabs -->
		<div class="sign-in-form">

			<ul class="popup-tabs-nav">
				<li><a href="{{ url("#tab") }}">Add Note</a></li>
			</ul>

			<div class="popup-tabs-container">

				<!-- Tab -->
				<div class="popup-tab-content" id="tab">

					<!-- Welcome Text -->
					<div class="welcome-text">
						<h3>Do Not Forget 😎</h3>
					</div>

					<!-- Form -->
					<form method="post" id="add-note">

						<select class="selectpicker with-border default margin-bottom-20" data-size="7" title="Priority">
							<option>Low Priority</option>
							<option>Medium Priority</option>
							<option>High Priority</option>
						</select>

						<textarea name="textarea" cols="10" placeholder="Note" class="with-border"></textarea>

					</form>

					<!-- Button -->
					<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="add-note">Add Note <i class="icon-material-outline-arrow-right-alt"></i></button>

				</div>

			</div>
		</div>
	</div>
	<!-- Apply for a job popup / End -->


	<!-- Scripts
================================================== -->
	<script src="{{ asset("/assets/frontsite/js/jquery-3.3.1.min.js") }}"></script>
	<script src="{{ asset("/assets/frontsite/js/jquery-migrate-3.0.0.min.js") }}"></script>
	<script src="{{ asset("/assets/frontsite/js/mmenu.min.js") }}"></script>
	<script src="{{ asset("/assets/frontsite/js/tippy.all.min.js") }}"></script>
	<script src="{{ asset("/assets/frontsite/js/simplebar.min.js") }}"></script>
	<script src="{{ asset("/assets/frontsite/js/bootstrap-slider.min.js") }}"></script>
	<script src="{{ asset("/assets/frontsite/js/bootstrap-select.min.js") }}"></script>
	<script src="{{ asset("/assets/frontsite/js/snackbar.js") }}"></script>
	<script src="{{ asset("/assets/frontsite/js/clipboard.min.js") }}"></script>
	<script src="{{ asset("/assets/frontsite/js/counterup.min.js") }}"></script>
	<script src="{{ asset("/assets/frontsite/js/magnific-popup.min.js") }}"></script>
	<script src="{{ asset("/assets/frontsite/js/slick.min.js") }}"></script>
	<script src="{{ asset("/assets/frontsite/js/custom.js") }}"></script>


	<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
	<script>
		// Snackbar for user status switcher
		$('#snackbar-user-status label').click(function() {
			Snackbar.show({
				text: 'Your status has been changed!',
				pos: 'bottom-center',
				showAction: false,
				actionText: "Dismiss",
				duration: 3000,
				textColor: '#fff',
				backgroundColor: '#383838'
			});
		});
	</script>

	<!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
	<script src="{{ asset("/assets/frontsite/js/chart.min.js") }}"></script>
	<script>
		Chart.defaults.global.defaultFontFamily = "Nunito";
		Chart.defaults.global.defaultFontColor = '#888';
		Chart.defaults.global.defaultFontSize = '14';

		var ctx = document.getElementById('chart').getContext('2d');

		var chart = new Chart(ctx, {
			type: 'line',

			// The data for our dataset
			data: {
				labels: ["January", "February", "March", "April", "May", "June"],
				// Information about the dataset
				datasets: [{
					label: "Views",
					backgroundColor: 'rgba(42,65,232,0.08)',
					borderColor: '#2a41e8',
					borderWidth: "3",
					data: [196, 132, 215, 362, 210, 252],
					pointRadius: 5,
					pointHoverRadius: 5,
					pointHitRadius: 10,
					pointBackgroundColor: "#fff",
					pointHoverBackgroundColor: "#fff",
					pointBorderWidth: "2",
				}]
			},

			// Configuration options
			options: {

				layout: {
					padding: 10,
				},

				legend: {
					display: false
				},
				title: {
					display: false
				},

				scales: {
					yAxes: [{
						scaleLabel: {
							display: false
						},
						gridLines: {
							borderDash: [6, 10],
							color: "#d8d8d8",
							lineWidth: 1,
						},
					}],
					xAxes: [{
						scaleLabel: {
							display: false
						},
						gridLines: {
							display: false
						},
					}],
				},

				tooltips: {
					backgroundColor: '#333',
					titleFontSize: 13,
					titleFontColor: '#fff',
					bodyFontColor: '#fff',
					bodyFontSize: 13,
					displayColors: false,
					xPadding: 10,
					yPadding: 10,
					intersect: false
				}
			},


		});
	</script>

@yield('scripts')
</body>

</html>
