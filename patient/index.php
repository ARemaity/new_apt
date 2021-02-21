

<?php
  session_start();

  

require_once '../include/Config.php';




if(isset($_POST['submit'])){



    $patientid=$_SESSION['id'];
    $docid=$_POST['id'];
    $time=$_POST['time'];
    $stmt=  "INSERT INTO `appointment_list`(`id`, `doctor_id`, `patient_id`, `schedule`, `status`, `date_created`) VALUES (Null,'$docid','$patientid','$time',0,NOW())";
    $order = mysqli_query($con,$stmt);
    if($order){

        header("Refresh:0; url=index.php");
        // relaod 
    }


   }

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
     
            <!-- Vertical navbar -->
            <div id="navbar2" class="app-navbar vertical">
            <a href="logout.php" class="btn btn-info" role="button">Logout</a>
			</div>
            <main class="main-content">
                 
                <div class="main-content-wrap">
                    <header class="page-header">
                        <h1 class="page-title">Doctors List</h1>
                    </header>
                    <div class="page-content">
                        
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
    echo "<td id='".$row['id']."'><a href='javascript:void(0);'>".$row['name']."</a></td>";
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
					<form id="myform" action="" method="POST">
                    <input type="hidden"  id="id" name="id" value="">
						<div class="form-group"><input id="name" name="name" class="form-control" type="text" placeholder="Name" value="""  readonly="readonly"></div>
						<div class="form-group"><input id="speciality" name="speciality" class="form-control" type="text" placeholder="Doctor"  readonly="readonly"></div>
						<div class="form-group"><input id="contact" name="contact" class="form-control"   readonly="readonly"></div>
						<div class="form-group"><input id="day" name="day" class="form-control" type="text" placeholder="Date" readonly="readonly"></div>
                        <div class="form-group"><input id="time" name="time" class="form-control" type="text" placeholder="time" readonly="readonly"></div>

				</div>
				<div class="modal-footer d-block">
					<div class="actions justify-content-between"><button type="button" id="delete" class="btn btn-error" data-dismiss="modal">Cancel </button> <button type="Submit" name="submit" class="btn btn-info">Add appointment</button></div>
				</div></form>
			</div>
		</div>
	</div>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

<script>




    jQuery(document).ready(function () {


        $(".tr").click(function () {
            var $row = $(this).closest("tr"),       // Finds the closest row <tr> 
                $tds = $row.find("td");             // Finds all children <td> elements

            // Visits every single <td> element
            // alert($tds.eq(1).text());  
            $('#id').val($tds.eq(0).attr('id'))
            $('#name').val($tds.eq(0).text());
            $('#speciality').val($tds.eq(1).text());
            $('#contact').val($tds.eq(2).text());
            $('#day').val($tds.eq(3).text());
            $('#time').val($tds.eq(4).text()+"-"+$tds.eq(5).text());
            $('#exampleModal').modal('show');       // Prints out the text within the <td>

        });



    });






</script>



</body>

</html>
