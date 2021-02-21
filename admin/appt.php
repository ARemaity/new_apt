<!-- inner join users with medical_specialty    with docotor schudele  -->
<!-- modal for insertion to appt tbl  -->
<!-- constraint take valid time between tyhe schedule time  -->

<?php
  session_start();
  ob_start();
  
  
require_once '../include/Config.php';

if (!isset($_SESSION['id'])) {
    header("Location:../index.php");
    die();}



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

    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">

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

    $stmt1 = "SELECT u.name as docn,u.contact as dcontact ,a.schedule,a.status,m.name,m.contact FROM users u INNER JOIN appointment_list a on u.id = a.doctor_id INNER JOIN users m on m.id = a.patient_id";
    $order1 = mysqli_query($con, $stmt1);
    while($row = mysqli_fetch_array($order1)){
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


$stmt1 = "SELECT u.id,u.name , u.contact , d.day , d.time_from ,d.time_to ,m.specialty FROM users u INNER JOIN doctors_schedule d on u.id = d.doctor_id INNER JOIN medical_specialty m on u.id = m.fk_UID ";
$order1 = mysqli_query($con, $stmt1);
while($row = mysqli_fetch_array($order1)){
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

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

<script>









</script>











</body>

</html>
