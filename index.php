
<?php
session_start();
if (isset($_SESSION['type'])) {

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
require_once 'include/Config.php';

if (isset($_POST['submit'])) {

    $stmt = "SELECT `id`,`username`, `password`, `type` FROM `users` WHERE username ='" . $_POST['username'] . "' and password ='" . $_POST['password'] . "'";

    $result = mysqli_query($con,$stmt);

	$order =mysqli_fetch_assoc($result);


    if (!empty($order)) {

        if ($order['type'] == 1) {
            $_SESSION['type'] = 1;
            $_SESSION['id'] = $order['id'];
            header("Location:admin/index.php");

        } elseif ($order['type'] == 2) {
            $_SESSION['type'] = 2;
            $_SESSION['id'] = $order['id'];
            header("Location:doctor/index.php");
            die();
        } elseif ($order['type'] == 3) {
            $_SESSION['type'] = 3;
            $_SESSION['id'] = $order['id'];
            header("Location:patient/index.php");

        }

    }

}

?>


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
								
									<div class="col-md-6 col-lg-6 ">
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


		</div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
		<script src="asset/js/jquery.min.js"></script>

		<!-- Bootstrap Core JS -->
		<script src="asset/js/popper.min.js"></script>
		<script src="asset/js/bootstrap.min.js"></script>



	</body>

</html>

<?php if (isset($_POST['submit']) && (empty($order))) {
    //echo "Username or password are incorect or user not available";

    echo "<script>
$(document).ready(function() {

     alert('Username or password are incorect');

})

</script>

;";

}

?>