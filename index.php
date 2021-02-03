<?php
session_start();
ob_start();
ob_flush();
require_once  'include/DB_Manage.php';
$mng = new DB_Manage();


if(isset($_POST['submit'])){

		$order = $mng->login($_POST['username'],$_POST['password']);

if (!empty($order)) {			

	
if($order['type']==1){
	$_session['id']=$order['id'];
	 header("Location: admin.php"); 
	
}elseif($order['type']==2){
	$_session['id']=$order['id'];
	header("Location: doctor.php"); 
						  }elseif($order['type']==3){
	
	
	$_session['id']=$order['id'];
	header("Location:patient/index.php");
	
	
	
	
}
	
	
	
 }
	
}?> 


















<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>MedicApp - Medical & Hospital HTML5/Bootstrap admin template</title>
<meta name="keywords" content="MedicApp"><meta name="description" content=""><meta name="author" content=""><meta name="viewport" content="width=device-width,initial-scale=1"><!-- Favicon -->
<link rel="shortcut icon" href="http://medic-app-html.type-code.pro/assets/img/favicon.ico"><!-- Plugins CSS --><link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css"><link rel="stylesheet" href="assets/css/icofont.min.css"><link rel="stylesheet" href="assets/css/simple-line-icons.css"><link rel="stylesheet" href="assets/css/jquery.typeahead.css"><link rel="stylesheet" href="assets/css/datatables.min.css"><link rel="stylesheet" href="assets/css/bootstrap-select.min.css"><link rel="stylesheet" href="assets/css/Chart.min.css"><link rel="stylesheet" href="assets/css/morris.css"><link rel="stylesheet" href="assets/css/leaflet.css"><!-- Theme CSS --><link rel="stylesheet" href="assets/css/style.css"></head>

<body class="public-layout">

<!-- .main-loader --><div class="page-box"><div class="app-container page-sign-in"><div class="content-box"><div class="content-header"><div class="app-logo">
<div class="logo-wrap">
<img src="http://medic-app-html.type-code.pro/assets/img/logo.svg" alt="" width="147" height="33" class="logo-img"></div></div></div>
<div class="content-body">
<div class="w-100">
<h2 class="h4 mt-0 mb-1">Sign in</h2>
<p class="text-muted">Sign in to access your Account</p>
<form  method="post" action="index.php" ><div class="form-group">
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



</div></div></div></div></div><script src="assets/js/jquery-3.3.1.min.js"></script><script src="assets/js/jquery-migrate-1.4.1.min.js"></script><script src="assets/js/popper.min.js"></script><script src="assets/js/bootstrap.min.js"></script><script src="assets/js/jquery.typeahead.min.js"></script><script src="assets/js/datatables.min.js"></script><script src="assets/js/bootstrap-select.min.js"></script><script src="assets/js/jquery.barrating.min.js"></script><script src="assets/js/Chart.min.js"></script><script src="assets/js/raphael-min.js"></script><script src="assets/js/morris.min.js"></script><script src="assets/js/echarts.min.js"></script><script src="assets/js/echarts-gl.min.js"></script><script src="assets/js/main.js"></script>

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


</body>
</html>