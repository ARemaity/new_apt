<!-- inner join users with medical_specialty    with docotor schudele  -->
<!-- modal for insertion to appt tbl  -->
<!-- constraint take valid time between tyhe schedule time  -->

<?php
  session_start();
  ob_start();
  
  
require_once dirname(__FILE__, 2) . '/include/DB_Manage.php';
$mng = new DB_Manage();

if (!isset($_SESSION['id'])) {
    header("Location:../index.php");
    die();}
// } else {

//     $stmt = $mng->db->prepare("SELECT * FROM `users` WHERE id =" .$_SESSION['id']);
//     if ($stmt->execute()) {
//         $order = $stmt->get_result()->fetch_assoc();
//         $stmt->close();
//     }

    ?>





<!doctype html>
<html lang="en">

<head><base href="../">
    <meta charset="utf-8">
    <title>MedicApp - Medical & Hospital HTML5/Bootstrap admin template</title>
    <meta name="keywords" content="MedicApp">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1"><!-- Favicon -->
    <link rel="shortcut icon" href="http://medic-app-html.type-code.pro/assets/img/favicon.ico"><!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/css/jquery.typeahead.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/Chart.min.css">
    <link rel="stylesheet" href="assets/css/morris.css">
    <link rel="stylesheet" href="assets/css/leaflet.css"><!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="vertical-layout boxed">
   
    <div class="page-box">
        <div class="app-container">
            <!-- Horizontal navbar -->
     
            <!-- Vertical navbar -->
<?php include("layout/side.php"); ?>
            <main class="main-content">
                 
                <div class="main-content-wrap">
                    <header class="page-header">
                        <h1 class="page-title">Request and schedule schedule</h1>
                    </header>
                    <div class="page-content">
                        
                        <div class="card mb-0 mt-4">
                            <div class="card-header">Request's schedule</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-hover">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th scope="col" >Doctor Name</th>
                                                <th scope="col">Number</th>
                                                <th scope="col">Schedule</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Patient</th>
                                                <th scope="col">Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php           
$order1=$mng->getallapt();

    
                 
foreach($order1 as $row) {
    echo"<tr class='tr'>";
    echo "<td>".$row['docn']."</td>";
    echo "<td>".$row['dcontact']."</td>";
    echo "<td>".$row['schedule']."</td>";
    echo "<td>".$row['status']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['contact']."</td>";

    echo"</tr>";
   
}

                                    
                                                ?>
                                            
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="card mb-0 mt-4">
                            <div class="card-header">Doctors schedule : </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-hover">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th scope="col" >Doctor Name</th>
                                                <th scope="col">Specialty</th>
                                                <th scope="col">Contact</th>
                                                <th scope="col">Day</th>
                                                <th scope="col">From</th>
                                                <th scope="col">To</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php           
$order1=$mng->getdocapt();

    
                 
foreach($order1 as $row) {
    echo"<tr class='tr'>";
    echo "<td id='".$row['id']."'>".$row['name']."</td>";
    echo "<td  id='".$row['id']."'>".$row['specialty']."</td>";
    echo "<td  id='".$row['id']."'>".$row['contact']."</td>";
    echo "<td  id='".$row['id']."'>".$row['day']."</td>";
    echo "<td  id='".$row['id']."'>".$row['time_from']."</td>";
    echo "<td  id='".$row['id']."'>".$row['time_to']."</td>";

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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add new appointment</h5>
				</div>
				<div class="modal-body">
					<form id="myform" action="patient/appt.php" method="POST">
                    <input type="hidden"  id="id" name="id" value="">
						<div class="form-group"><input id="name" name="name" class="form-control" type="text" placeholder="Name" value=""></div>
						<div class="form-group"><input id="speciality" name="speciality" class="form-control" type="text" placeholder="Doctor"></div>
						<div class="form-group"><input id="contact" name="contact" class="form-control"  ></div>
						<div class="form-group"><input id="day" name="day" class="form-control" type="text" placeholder="Date"></div>
						<div class="row">
							<div class="col-12 col-sm-6">
								<div class="form-group"> <input type="datetime-local" id="appt" name="appt">Select time</div>
							</div>
							
						</div>
						
					
				</div>
				<div class="modal-footer d-block">
					<div class="actions justify-content-between"><button type="button" id="delete" class="btn btn-error" data-dismiss="modal">Delete </button> <button type="Submit" class="btn btn-info">Add appointment</button></div>
				</div></form>
			</div>
		</div>
	</div>
  
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.typeahead.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/jquery.barrating.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/raphael-min.js"></script>
    <script src="assets/js/morris.min.js"></script>
    <script src="assets/js/echarts.min.js"></script>
    <script src="assets/js/echarts-gl.min.js"></script>
    <script src="assets/js/main.js"></script>
<script>









</script>


<?php
include 'layout/infoc.php';

?>








</body>

</html>
