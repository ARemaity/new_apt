<?php
  session_start();
  
  





require_once '../include/Config.php';


if(isset($_POST['add'])){
// ADD USER
$name=$_POST['name'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$username=$_POST['username'];
$password=$_POST['password'];
$type=$_POST['type'];

$stmt = "INSERT INTO `users`(`id`, `name`, `address`, `contact`, `username`, `password`, `type`) VALUES (NULL,'$name','$address','$contact','$username','$password',$type)";
$order = mysqli_query($con, $stmt);
if($order){

    header("Refresh:0; url=doctors.php");
    // relaod 
}
}




    ?>




<!doctype html>
<html lang="en">

<head>
    <base href="../">
    <meta charset="utf-8">
    <title></title>
    <meta name="keywords" content="MedicApp">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1"><!-- Favicon -->

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

</head>

<body class="vertical-layout boxed">

    <div class="page-box">
        <div class="app-container">
            <!-- Horizontal navbar -->

            <div id="navbar2" class="app-navbar vertical">
                <a href="admin/index.php" class="btn btn-info" role="button">Users</a>
                <a href="admin/doctors.php" class="btn btn-info" role="button">Doctors</a>
                <a href="admin/appt.php" class="btn btn-info" role="button">Appointments</a>
                <a href="logout.php" class="btn btn-info" role="button">LOGOUT</a>

            </div><!-- end Vertical navbar -->
            <main class="main-content">

                <div class="main-content-wrap">
                    <header class="page-header">
                        <h1 class="page-title">Doctor List</h1>
                        <button type="button" id="adduser" class="btn ">Add Doctor</button>
                    </header>
                    <div class="page-content">

                        <div class="card mb-0 mt-4">
                            <div class="card-header">All Doctors: </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-hover">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Contact</th>
                                                <th scope="col">username</th>
                                                <th scope="col">Password</th>
                                                <th scope="col">Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php           

$stmt1 = "SELECT * FROM `users` WHERE type = 2";
$order1 = mysqli_query($con, $stmt1);
while($row = mysqli_fetch_array($order1)){
    echo"<tr class='tr'>";
    echo "<td id='".$row['id']."'>".$row['id']."</td>";
    echo "<td  id='".$row['id']."'><a href='javascript:void(0);'>".$row['name']."</a></td>";
    echo "<td  id='".$row['id']."'>".$row['address']."</td>";
    echo "<td  id='".$row['id']."'>".$row['contact']."</td>";
    echo "<td  id='".$row['id']."'>".$row['username']."</td>";
    echo "<td  id='".$row['id']."'>".$row['password']."</td>";
    echo "<td  id='".$row['id']."'>".$row['type']."</td>";
    echo"</tr>";
   
}

                                    
                                                ?>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add new Doctor</h5>

                    </div>
                    <div class="modal-body">
                        <form id="addform" action="" method="POST">
                            <input id="id" name="id" class="form-control" type="hidden" placeholder="Name" value="auto"
                                readonly>
                            <div class="form-group">Name :<input id="name" name="name" class="form-control" type="text"
                                    placeholder="Name" value=""></div>
                            <div class="form-group">Address :<input id="address" name="address" class="form-control"
                                    type="text" placeholder="address"></div>
                            <div class="form-group">Contact : <input id="contact" name="contact" class="form-control">
                            </div>
                            <div class="form-group">Username : <input id="username" name="username"
                                    class="form-control"></div>
                            <div class="form-group">Password : <input id="password" name="password" class="form-control"
                                    type="text" placeholder="password"></div>
                            <input id="type" name="type" class="form-control" type="hidden" placeholder="Date" value="2"
                                readonly>
                            <div class="row">
                                <div class="col-12 col-sm-6">

                                </div>

                            </div>


                    </div>
                    <div class="modal-footer d-block">
                        <div class="actions justify-content-between"><button type="button" class="btn btn-error"
                                data-dismiss="modal">Cancel</button> <button type="Submit" name="add"
                                class="btn btn-info">add Doctor</button></div>
                    </div>

                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

        <script>




            jQuery(document).ready(function () {





                $("#adduser").click(function (e) {

                    $('#exampleModal1').modal('show');

                });

            });






        </script>












</body>

</html>