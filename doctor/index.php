

<?php
  session_start();

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
        <div id="navbar2" class="app-navbar vertical">
		          <a href="logout.php" class="btn btn-info" role="button">Logout</a>
			</div>

            <main class="main-content">
                 
                <div class="main-content-wrap">
                    <header class="page-header">
                        <h1 class="page-title">Patient List</h1>
                    </header>
                    <div class="page-content">
                        
                        <div class="card mb-0 mt-4">
                            <div class="card-header">patients schedule : </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-hover">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th scope="col" >Patient Name</th>
                                                <th scope="col">contact</th>
                                                <th scope="col">Schedule</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Datecreated</th>
                                          
                                            </tr>
                                        </thead>
                                        <tbody>
<?php           

$stmt1 = "SELECT m.id,name,contact,schedule,status,date_created FROM users u INNER JOIN appointment_list m on u.id = m.patient_id  WHERE m.doctor_id =" .$_SESSION['id']. "";


$order1 = mysqli_query($con, $stmt1);




                 
while($row = mysqli_fetch_array($order1)){

    echo"<tr class='tr'>";
    echo "<td id='".$row['id']."'><a href='javascript:void(0);'>".$row['name']."</a></td>";
    echo "<td  id='".$row['id']."'>".$row['contact']."</td>";
    echo "<td  id='".$row['id']."'>".$row['schedule']."</td>";
    echo "<td  id='".$row['id']."'>".$status."</td>";
    echo "<td  id='".$row['id']."'>".$row['date_created']."</td>";
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

<script>

</script>

</body>

</html>
