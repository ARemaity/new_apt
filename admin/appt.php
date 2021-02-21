<?php
  session_start();

require_once '../include/Config.php';

    ?>

<!doctype html>
<html lang="en">

<head><base href="../">
    <meta charset="utf-8">
    <title></title>
    <meta name="keywords" content="MedicApp">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1"><!-- Favicon -->

      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>


</body>

</html>
