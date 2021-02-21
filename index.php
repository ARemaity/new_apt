<?php
session_start();

require_once 'include/Config.php';

if (isset($_POST['submit'])) {

    $stmt = "SELECT `id`,`username`, `password`, `type` FROM `users` WHERE username ='" . $_POST['username'] . "' and password ='" . $_POST['password'] . "'";

    $result = mysqli_query($con, $stmt);

    $order = mysqli_fetch_assoc($result);

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



<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">


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
									<form method="post" action="">
										<div class="form-group">
											<input id="username" name="username" class="form-control" type="text"
												placeholder="Login">
										</div>
										<div class="form-group">
											<input id="password" name="password" class="form-control" type="password"
												placeholder="Password">
										</div>

										<div class="actions justify-content-between">
											<button type="submit" name="submit" class="btn btn-primary">
												<span class="btn-icon "></span>Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>

		</div>
		<!-- /Page Content -->


	</div>
	<!-- /Main Wrapper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>



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