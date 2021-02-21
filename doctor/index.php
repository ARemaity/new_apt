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



    $status;
    switch ($row['status']) {
        case 0:
            $status='Pending';
            break;
            case 1:
                $status='Confirmed';
                break;
                case 2:
                    $status='Rejected';
                    break;
        default:
        $status='Pending';
            break;
    }
    echo"<tr class='tr'>";
    echo "<td id='".$row['id']."'><a href='javascript:void(0);'>".$row['name']."</a></td>";
    echo "<td  id='".$row['id']."'>".$row['contact']."</td>";
    echo "<td  id='".$row['id']."'>".$row['schedule']."</td>";
    echo "<td  id='".$row['id']."'>".$status."</td>";
    echo "<td  id='".$row['id']."'>".$row['date_created']."</td>";
    echo"</tr>";
    $status=0;
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
					<h5 class="modal-title"> appointment Action </h5>
				</div>
				<div class="modal-body">
				
                    <input type="hidden"  id="id" name="id" value="">
						
						
                    </form>
					
				</div>
				<div class="modal-footer d-block">
					<div class="actions justify-content-between"><button type="button" class="btn btn-error" data-dismiss="modal">Cancel</button> <button id="reject"  class="btn btn-danger">Reject appointment</button> <button id="accept"  class="btn btn-info">Confirm appointment</button></div>
				</div>
			</div>
		</div>
	</div>
  
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

<script>




jQuery(document).ready(function() {
 
var idd;


        $(".tr").click(function() {
            var $row = $(this).closest("tr"),       // Finds the closest row <tr> 
             $tds = $row.find("td");             // Finds all children <td> elements
    $('#id').val($tds.eq(0).attr('id'))
idd=$tds.eq(0).attr('id');
    $('#exampleModal').modal('show');       // Prints out the text within the <td>

});



// $("#accept").click(function(e) {
// $.ajax({   
//                             url: "doctor/action.php",
//                             type: "POST",
// 							data: { id:idd,st:1},
//                             dataType: 'json',
//                             success: function (response) {
//                               if(response!='0'){
								
// 								location.reload(); }else{alert("Error");}
//                             },
//                           });
//                         });


//                         $("#reject").click(function(e) {
// $.ajax({   
//                             url: "doctor/action.php",
//                             type: "POST",
// 							data: { id:idd,st:2},
//                             dataType: 'json',
//                             success: function (response) {
//                               if(response!='0'){
								
// 								location.reload(); }else{alert("Error");}
//                             },
//                           });
//                         });







    });






</script>


<?php 

include 'info.php';
?>










</body>

</html>
