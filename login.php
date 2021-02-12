
<?php
session_start();
ob_start();
if(isset($_SESSION['type'])){
		

	
switch ($_SESSION["type"]) {
	case 1:
		header("location:admin/index.php");
		break;
	case 2:
		header("location:doctor/index.php");
		break;
	case 3:
		header("location:patient/index.php");
      break;
	default:
	header("location:index.php");
		break;
}
}
require_once  'include/DB_Manage.php';
$mng = new DB_Manage();


if(isset($_POST['submit'])){

		$order = $mng->login($_POST['username'],$_POST['password']);

if (!empty($order)) {			

	
if($order['type']==1){
	$_SESSION['type']=1;
	$_SESSION['id']=$order['id'];
	 header("Location:admin/index.php"); 
	
}elseif($order['type']==2){
	$_SESSION['type']=2;
	$_SESSION['id']=$order['id'];
	header("Location:doctor/index.php");
	die(); 
						  }elseif($order['type']==3){
							$_SESSION['type']=3;
	
							$_SESSION['id']=$order['id'];
	header("Location:patient/index.php");
	
	
	
	
}
	
	
	
 }
	
}?> 


<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from doccure-html.dreamguystech.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Feb 2021 01:26:47 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="asset/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="asset/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="asset/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="asset/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="asset/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="asset/js/html5shiv.min.js"></script>
			<script src="asset/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
			
			</header>
			<!-- /Header -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="asset/img/login-banner.png" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login <span></span></h3>
										</div>
										<form  method="post" action="" ><div class="form-group">
<input id="username" name="username" class="form-control" type="text" placeholder="Login">
</div>
<div class="form-group">
<input id="password" name="password" class="form-control" type="password" placeholder="Password">
</div>

<div  class="actions justify-content-between">
<button type="submit" name="submit" class="btn btn-primary">
<span class="btn-icon "></span>Sign in</button>
</div>
</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="asset/img/footer-logo.png" alt="logo">
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Patients</h2>
									<ul>
										<li><a href="search.html">Search for Doctors</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="register.html">Register</a></li>
										<li><a href="booking.html">Booking</a></li>
										<li><a href="patient-dashboard.html">Patient Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Doctors</h2>
									<ul>
										<li><a href="appointments.html">Appointments</a></li>
										<li><a href="chat.html">Chat</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="doctor-register.html">Register</a></li>
										<li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
											+1 315 369 5943
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											doccure@example.com
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0">&copy; 2020 Doccure. All rights reserved.</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.html">Terms and Conditions</a></li>
											<li><a href="privacy-policy.html">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="asset/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="asset/js/popper.min.js"></script>
		<script src="asset/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="asset/js/script.js"></script>
		
	</body>

</html>

<?php  if(isset($_POST['submit'])&&(empty($order))){
    //echo "Username or password are incorect or user not available";
	
	echo "<script>
$(document).ready(function() {
    
     alert('Username or password are incorect');

    
    
    
})

</script>

;";
	
 
}
	

	
?>