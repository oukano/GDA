<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- Stylesheets -->
  <link href="{{ asset('css/template.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

<div class="container-full">

<div id="wrapper" class="toggled">
			<!-- -------------------------------- Sidebar  ---------------------------------------------------- -->
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav">
					<h2 class="text-center sidebar-title">GDA</h2>
					<li class="sidebar-brand" >
						<a href="#">
							<img src="./public/images/avatar.svg">
							Administrateur
						</a>
					</li>
					<li class="sidebar-line"></li>
					<li class="active">
						<a href="#">Tableau de bord</a>
					</li>
					<li>
						<a href="#">
							<span>Projets</span>
							<span class="glyphicon glyphicon-triangle-bottom sidebar-dropmenu"></span>
						</a>
					</li>
					<li>
						<a href="#">
							<span>Models</span>
							<span class="glyphicon glyphicon-triangle-bottom sidebar-dropmenu"></span>
						</a>
					</li>
					<li>
						<a href="#">
							<span>Documents</span>
							<span class="glyphicon glyphicon-triangle-bottom sidebar-dropmenu"></span>
						</a>
					</li>
					<li>
						<a href="#">
							<span>Clients</span>
							<span class="glyphicon glyphicon-triangle-bottom sidebar-dropmenu"></span>
						</a>
					</li>
				</ul>
			</div>
	<!-- /#sidebar-wrapper -->

		<div class="topbar" >
			<div class="text-right">
				<img src="./public/images/avatar.svg">
				Admin
			</div>
		</div>

		<div  class="container">
				<div class="row">
					<div class=" col-2">
						<div class="stat">
							<h5>Projets en cours</h5>
							<h1 class="data">15</h1>
						</div>
						<div  class="stat-devider"></div>
					</div>

					<div class=" col-2">
						<div class="stat">
							<h5>Projets clôturés</h5>
							<h1 class="data">08</h1>
						</div>
						<div class="stat-devider"></div>
					</div>

					<div class=" col-2">
						<div class="stat">
							<h5>Projets Annulés</h5>
							<h1 class="data">01</h1>
						</div>
						<div class="stat-devider"></div>
					</div>

					<div class=" col-2">
						<div class="stat">
							<h5>Models de documents</h5>
							<h1 class="data">17</h1>
						</div>
						<div class="stat-devider"></div>
					</div>

					<div class=" col-2">
						<div class="stat">
							<h5>Documents remplis</h5>
							<h1 class="data">37</h1>
						</div>
						<div class="stat-devider"></div>
					</div>

					<div class=" col-2">
						<div class="stat">
							<h5>Projets en cours</h5>
							<h1 class="data">21</h1>
						</div>
					</div>
					<div class="clearfix clearfix-margin"></div>
				</div>
		</div>

		<!-- Page Content -->
		
		<!-- /#page-content-wrapper -->

</div>
</div>
</div>



<!-- Bootstrap core JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>


</body>
</html>