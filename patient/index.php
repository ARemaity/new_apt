<?php

include "database.php";
$db=new db();

if(!isset($_GET['id'])){
	header("Location: sign-in.php");
	die();
}
else{
   
$stmt = $db->conn->prepare("SELECT * FROM `users` WHERE id =".$_GET['id']);        
 if ($stmt->execute()) {			
     $order = $stmt->get_result()->fetch_assoc();
     $stmt->close();
    
	 
	 
	 
 } else {
    return NULL;
 }



	
	
	
	
}











?>




<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>MedicApp - Medical &amp; Hospital HTML5/Bootstrap admin template</title>
	<meta name="keywords" content="MedicApp">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1"><!-- Favicon -->
	<link rel="shortcut icon" href="http://medic-app-html.type-code.pro/assets/img/favicon.ico"><!-- Plugins CSS -->
	<link rel="stylesheet" href="patient_files/bootstrap.css">
	<link rel="stylesheet" href="patient_files/icofont.css">
	<link rel="stylesheet" href="patient_files/simple-line-icons.css">
	<link rel="stylesheet" href="patient_files/jquery.css">
	<link rel="stylesheet" href="patient_files/datatables.css">
	<link rel="stylesheet" href="patient_files/bootstrap-select.css">
	<link rel="stylesheet" href="patient_files/Chart.css">
	<link rel="stylesheet" href="patient_files/morris.css">
	<link rel="stylesheet" href="patient_files/leaflet.css"><!-- Theme CSS -->
	<link rel="stylesheet" href="patient_files/style.css">
</head>

<body class="vertical-layout boxed loaded scrolled">
	<div class="app-loader main-loader">
		<div class="loader-box">
			<div class="bounceball"></div>
			<div class="text">Medic<span>app</span></div>
		</div>
	</div><!-- .main-loader -->
	<div class="page-box">
		<div class="app-container">
			<!-- Horizontal navbar -->
			<div id="navbar1" class="app-navbar horizontal">
				<div class="navbar-wrap"><button class="no-style navbar-toggle navbar-open d-lg-none"><span></span><span></span><span></span></button>
					<form class="app-search d-none d-md-block">
						<div class="form-group typeahead__container with-suffix-icon mb-0">
							<div class="typeahead__field">
								<div class="typeahead__query"><span class="typeahead__cancel-button">×</span><span class="typeahead__cancel-button">×</span>
									<div class="suffix-icon icofont-search"></div>
								</div>
							</div>
						</div>
					</form>
					<div class="app-actions">
						<div class="dropdown item"><button class="no-style dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0, 12"> </button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-w-280" x-placement="bottom-end" style="position: absolute; transform: translate3d(-280px, 12px, 0px); top: 0px; left: 0px; will-change: transform;">
								<div class="menu-header">
									<h4 class="h5 menu-title mt-0 mb-0">Notifications</h4><a href="#" class="text-danger">Clear All</a>
								</div>
								<ul class="list">
									<li><a href="#"><span class="icon icofont-heart"></span>
											<div class="content"><span class="desc">Sara Crouch liked your photo</span> <span class="date">17 minutes ago</span></div>
										</a></li>
									<li><a href="#"><span class="icon icofont-users-alt-6"></span>
											<div class="content"><span class="desc">New user registered</span> <span class="date">23 minutes ago</span></div>
										</a></li>
									<li><a href="#"><span class="icon icofont-share"></span>
											<div class="content"><span class="desc">Amanda Lie shared your post</span> <span class="date">25 minutes ago</span></div>
										</a></li>
									<li><a href="#"><span class="icon icofont-users-alt-6"></span>
											<div class="content"><span class="desc">New user registered</span> <span class="date">32 minutes ago</span></div>
										</a></li>
									<li><a href="#"><span class="icon icofont-ui-message"></span>
											<div class="content"><span class="desc">You have a new message</span> <span class="date">58 minutes ago</span></div>
										</a></li>
								</ul>
								<div class="menu-footer"><button class="btn btn-primary btn-block">View all notifications <span class="btn-icon ml-2 icofont-tasks-alt"></span></button></div>
							</div>
						</div>
						<div class="dropdown item"><button class="no-style dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0, 10"><span class="d-flex align-items-center"> </span></button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-w-180">
								<ul class="list">
									<li><a href="#" class="align-items-center"><span class="icon icofont-ui-home"></span> Edit account</a></li>
									<li><a href="#" class="align-items-center"><span class="icon icofont-ui-user"></span> User profile</a></li>
									<li><a href="#" class="align-items-center"><span class="icon icofont-ui-calendar"></span> Calendar</a></li>
									<li><a href="#" class="align-items-center"><span class="icon icofont-ui-settings"></span> Settings</a></li>
									<li><a href="#" class="align-items-center"><span class="icon icofont-logout"></span> Log Out</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="navbar-skeleton horizontal">
						<div class="left-part d-flex align-items-center"><span class="navbar-button bg animated-bg d-lg-none"></span> <span class="sk-logo bg animated-bg d-none d-lg-block"></span> <span class="search d-none d-md-block bg animated-bg"></span></div>
						<div class="right-part d-flex align-items-center">
							<div class="icon-box"><span class="icon bg animated-bg"></span> <span class="badge"></span></div><span class="avatar bg animated-bg"></span>
						</div>
					</div>
				</div>
			</div><!-- end Horizontal navbar -->
			<!-- Vertical navbar -->
			<div id="navbar2" class="app-navbar vertical">
				<div class="navbar-wrap"><button class="no-style navbar-toggle navbar-close icofont-close-line d-lg-none"></button>
					<div class="app-logo">
						<div class="logo-wrap"><img src="patient_files/logo.svg" alt="" class="logo-img" width="147" height="33"></div>
					</div>
					<div class="main-menu">
						<nav class="main-menu-wrap">
							<ul class="menu-ul">
								<li class="menu-item"><span class="group-title">Medicine</span></li>
								<li class="menu-item"><a class="item-link" href="file:///C:/xampp/htdocs/appointment/dist/index-2.html"> <span class="link-text">Doctors</span></a></li>
								<li class="menu-item"><a class="item-link" href="file:///C:/xampp/htdocs/appointment/dist/appointments.html"> <span class="link-text">INFO.</span></a></li>
								<li class="menu-item"><a class="item-link" href="file:///C:/xampp/htdocs/appointment/dist/doctors.html"> <span class="link-text">Doctors</span></a></li>
							</ul>
						</nav>
					</div>
					<div class="assistant-menu"></div>
					<div class="navbar-skeleton vertical">
						<div class="top-part">
							<div class="sk-logo bg animated-bg"></div>
							<div class="sk-menu"><span class="sk-menu-item menu-header bg-1 animated-bg"></span> <span class="sk-menu-item bg animated-bg w-75"></span> <span class="sk-menu-item bg animated-bg w-80"></span> <span class="sk-menu-item bg animated-bg w-50"></span> <span class="sk-menu-item bg animated-bg w-75"></span> <span class="sk-menu-item bg animated-bg w-50"></span> <span class="sk-menu-item bg animated-bg w-60"></span></div>
							<div class="sk-menu"><span class="sk-menu-item menu-header bg-1 animated-bg"></span> <span class="sk-menu-item bg animated-bg w-60"></span> <span class="sk-menu-item bg animated-bg w-40"></span> <span class="sk-menu-item bg animated-bg w-60"></span> <span class="sk-menu-item bg animated-bg w-40"></span> <span class="sk-menu-item bg animated-bg w-40"></span> <span class="sk-menu-item bg animated-bg w-40"></span> <span class="sk-menu-item bg animated-bg w-40"></span></div>
							<div class="sk-menu"><span class="sk-menu-item menu-header bg-1 animated-bg"></span> <span class="sk-menu-item bg animated-bg w-60"></span> <span class="sk-menu-item bg animated-bg w-50"></span></div>
							<div class="sk-button animated-bg w-90"></div>
						</div>
						<div class="bottom-part">
							<div class="sk-menu"><span class="sk-menu-item bg-1 animated-bg w-60"></span> <span class="sk-menu-item bg-1 animated-bg w-80"></span></div>
						</div>
						<div class="horizontal-menu"><span class="sk-menu-item bg animated-bg"></span> <span class="sk-menu-item bg animated-bg"></span> <span class="sk-menu-item bg animated-bg"></span> <span class="sk-menu-item bg animated-bg"></span> <span class="sk-menu-item bg animated-bg"></span> <span class="sk-menu-item bg animated-bg"></span></div>
					</div>
				</div>
			</div><!-- end Vertical navbar -->
			<main class="main-content">
				<div class="app-loader"><i class="icofont-spinner-alt-4 rotate"></i></div>
				<div class="main-content-wrap">
					<header class="page-header">
						<h1 class="page-title">Patient profile page</h1>
					</header>
					<div class="page-content">
						<div class="row">
							<div class="col col-12 col-md-6 mb-4">
								<form><label>Photo</label>
									<div class="form-group avatar-box d-flex align-items-center"><img src="patient_files/user-400-3.jpg" alt="" class="rounded-500 mr-4" width="100" height="100"> </div>
									<div class="form-group"><label>Full name</label> <input class="form-control" type="text" placeholder="Full name" value="<?php echo $order['name']; ?>" readonly="readonly"></div>
									<div class="form-group"><label>Id</label> <input class="form-control" type="text" placeholder="Id" value="<?php echo $order['id']; ?>" readonly="readonly"></div>
									<div class="row">
										<div class="col-12 col-sm-6">
											<div class="form-group"> </div>
										</div>
									</div>
									<div class="form-group"><label>Phone number</label> <input class="form-control" type="number" placeholder="Phone number" value="<?php echo $order['number']; ?>" readonly="readonly"></div>
									<div class="form-group"><label>Address</label> <textarea class="form-control" placeholder="Address"  readonly="readonly"><?php echo $order['address']; ?></textarea></div>
								</form>
							</div>
							<div class="col col-12 col-md-6 mb-4">
								<div class="v-timeline dots">
									<div class="line"></div>
									<div class="timeline-box"></div>
								</div>
							</div>
						</div>
						<div class="card mb-0 mt-4">
							<div class="card-header">Billings</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr class="bg-primary text-white">
												<th scope="col" class="text-nowrap">Bill NO</th>
												<th scope="col">Patient</th>
												<th scope="col">Doctor</th>
												<th scope="col">Date</th>
												<th scope="col">Charger</th>
												<th scope="col">Tax</th>
												<th scope="col">Discount</th>
												<th scope="col">Total</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="text-muted">138</div>
												</td>
												<td>Liam Jouns</td>
												<td>
													<div class="text-nowrap">Dr. Sophie</div>
												</td>
												<td>
													<div class="text-nowrap text-muted">18 Dec 2019</div>
												</td>
												<td>$155</td>
												<td>10%</td>
												<td>$5</td>
												<td>$160</td>
											</tr>
											<tr>
												<td>
													<div class="text-muted">137</div>
												</td>
												<td>Liam Jouns</td>
												<td>
													<div class="text-nowrap">Dr. Liam</div>
												</td>
												<td>
													<div class="text-nowrap text-muted">5 Oct 2019</div>
												</td>
												<td>$155</td>
												<td>10%</td>
												<td>$5</td>
												<td>$160</td>
											</tr>
											<tr>
												<td>
													<div class="text-muted">136</div>
												</td>
												<td>Liam Jouns</td>
												<td>
													<div class="text-nowrap">Dr. Noah</div>
												</td>
												<td>
													<div class="text-nowrap text-muted">1 Oct 2019</div>
												</td>
												<td>$155</td>
												<td>10%</td>
												<td>$5</td>
												<td>$160</td>
											</tr>
											<tr>
												<td>
													<div class="text-muted">135</div>
												</td>
												<td>Liam Jouns</td>
												<td>
													<div class="text-nowrap">Dr. Sophie</div>
												</td>
												<td>
													<div class="text-nowrap text-muted">23 Sep 2019</div>
												</td>
												<td>$155</td>
												<td>10%</td>
												<td>$5</td>
												<td>$160</td>
											</tr>
											<tr>
												<td>
													<div class="text-muted">134</div>
												</td>
												<td>Liam Jouns</td>
												<td>
													<div class="text-nowrap">Dr. Emma</div>
												</td>
												<td>
													<div class="text-nowrap text-muted">10 Jul 2019</div>
												</td>
												<td>$155</td>
												<td>10%</td>
												<td>$5</td>
												<td>$160</td>
											</tr>
											<tr>
												<td>
													<div class="text-muted">133</div>
												</td>
												<td>Liam Jouns</td>
												<td>
													<div class="text-nowrap">Dr. Emma</div>
												</td>
												<td>
													<div class="text-muted">9 Jul 2019</div>
												</td>
												<td>$155</td>
												<td>10%</td>
												<td>$5</td>
												<td>$160</td>
											</tr>
											<tr>
												<td>
													<div class="text-muted">132</div>
												</td>
												<td>Liam Jouns</td>
												<td>
													<div class="text-nowrap">Dr. Sophie</div>
												</td>
												<td>
													<div class="text-muted">30 Mar 2019</div>
												</td>
												<td>$155</td>
												<td>10%</td>
												<td>$5</td>
												<td>$160</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
			<div class="app-footer">
				<div class="footer-wrap">
					<div class="row h-100 align-items-center">
						<div class="col-12 col-md-6 d-none d-md-block">
							<ul class="page-breadcrumbs">
								<li class="item"><a href="#" class="link">Medicine</a> <i class="separator icofont-thin-right"></i></li>
								<li class="item"><a href="#" class="link">Patient</a> <i class="separator icofont-thin-right"></i></li>
								<li class="item"><a href="#" class="link">Liam Jouns</a> <i class="separator icofont-thin-right"></i></li>
							</ul>
						</div>
						<div class="col-12 col-md-6 text-right">
							<div class="d-flex align-items-center justify-content-center justify-content-md-end"><span>Version 1.0.0</span> <button class="no-style ml-2 settings-btn" data-toggle="modal" data-target="#settings"><span class="icon icofont-ui-settings text-primary"></span></button></div>
						</div>
					</div>
					<div class="footer-skeleton">
						<div class="row align-items-center">
							<div class="col-12 col-md-6 d-none d-md-block">
								<ul class="page-breadcrumbs">
									<li class="item bg-1 animated-bg"></li>
									<li class="item bg animated-bg"></li>
								</ul>
							</div>
							<div class="col-12 col-md-6">
								<div class="info justify-content-center justify-content-md-end">
									<div class="version bg animated-bg"></div>
									<div class="settings animated-bg"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content-overlay"></div>
		</div>
	</div><!-- Add patients modals -->
	<div class="modal fade" id="add-patient" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add new patient</h5>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group avatar-box d-flex"><img src="patient_files/anonymous-400.jpg" alt="" class="rounded-500 mr-4" width="40" height="40"> <button class="btn btn-outline-primary" type="button">Select image<span class="btn-icon icofont-ui-user ml-2"></span></button></div>
						<div class="form-group"><input class="form-control" type="text" placeholder="Name"></div>
						<div class="form-group"><input class="form-control" type="number" placeholder="Number"></div>
						<div class="row">
							<div class="col-12 col-sm-6">
								<div class="form-group"><input class="form-control" type="number" placeholder="Age"></div>
							</div>
							<div class="col-12 col-sm-6">
								<div class="form-group">
									<div class="dropdown bootstrap-select"><select class="selectpicker" title="Gender" tabindex="-98">
											<option class="bs-title-option" value=""></option>
											<option class="d-none" selected="selected">Gender</option>
											<option>Male</option>
											<option>Female</option>
										</select><button type="button" class="form-control dropdown-toggle" data-toggle="dropdown" role="combobox" aria-owns="bs-select-3" aria-haspopup="listbox" aria-expanded="false" title="Gender">
											<div class="filter-option">
												<div class="filter-option-inner">
													<div class="filter-option-inner-inner">Gender</div>
												</div>
											</div>
										</button>
										<div class="dropdown-menu ">
											<div class="inner show" role="listbox" id="bs-select-3" tabindex="-1">
												<ul class="dropdown-menu inner show" role="presentation"></ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group mb-0"><textarea class="form-control" placeholder="Address" rows="3"></textarea></div>
					</form>
				</div>
				<div class="modal-footer d-block">
					<div class="actions justify-content-between"><button type="button" class="btn btn-error" data-dismiss="modal">Cancel</button> <button type="button" class="btn btn-info">Add patient</button></div>
				</div>
			</div>
		</div>
	</div><!-- end Add patients modals -->
	<!-- Add patients modals -->
	<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Application's settings</h5>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group"><label>Layout</label>
							<div class="dropdown bootstrap-select"><select class="selectpicker" title="Layout" id="layout" tabindex="-98">
									<option class="bs-title-option" value=""></option>
									<option value="horizontal-layout">Horizontal</option>
									<option value="vertical-layout" selected="selected">Vertical</option>
								</select><button type="button" class="form-control dropdown-toggle" data-toggle="dropdown" role="combobox" aria-owns="bs-select-4" aria-haspopup="listbox" aria-expanded="false" data-id="layout" title="Vertical">
									<div class="filter-option">
										<div class="filter-option-inner">
											<div class="filter-option-inner-inner">Vertical</div>
										</div>
									</div>
								</button>
								<div class="dropdown-menu ">
									<div class="inner show" role="listbox" id="bs-select-4" tabindex="-1">
										<ul class="dropdown-menu inner show" role="presentation"></ul>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group"><label>Light/dark topbar</label>
							<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" id="topbar"> <label class="custom-control-label" for="topbar"></label></div>
						</div>
						<div class="form-group"><label>Light/dark sidebar</label>
							<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" id="sidebar"> <label class="custom-control-label" for="sidebar"></label></div>
						</div>
						<div class="form-group mb-0"><label>Boxed/fullwidth mode</label>
							<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" id="boxed" checked="checked"> <label class="custom-control-label" for="boxed"></label></div>
						</div>
					</form>
				</div>
				<div class="modal-footer d-block">
					<div class="actions justify-content-between"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> <button id="reset-to-default" type="button" class="btn btn-error">Reset to default</button></div>
				</div>
			</div>
		</div>
	</div><!-- end Add patients modals -->
	<script src="patient_files/jquery-3.js"></script>
	<script src="patient_files/jquery-migrate-1.js"></script>
	<script src="patient_files/popper.js"></script>
	<script src="patient_files/bootstrap.js"></script>
	<script src="patient_files/jquery.js"></script>
	<script src="patient_files/datatables.js"></script>
	<script src="patient_files/bootstrap-select.js"></script>
	<script src="patient_files/jquery_002.js"></script>
	<script src="patient_files/Chart.js"></script>
	<script src="patient_files/raphael-min.js"></script>
	<script src="patient_files/morris.js"></script>
	<script src="patient_files/echarts.js"></script>
	<script src="patient_files/echarts-gl.js"></script>
	<script src="patient_files/main.js"></script>
</body>

</html>