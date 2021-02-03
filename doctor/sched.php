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
                <div class="app-loader"><i class="icofont-spinner-alt-4 rotate"></i></div>
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
$order1=$mng->getsched();

    
                 
foreach($order1 as $row) {
    echo"<tr class='tr'>";
    echo "<td id='".$row['id']."'>".$row['name']."</td>";
    echo "<td  id='".$row['id']."'>".$row['contact']."</td>";
    echo "<td  id='".$row['id']."'>".$row['schedule']."</td>";
    if($row['status'])
    echo "<td  id='".$row['id']."'>Confirmed</td>";
    else{echo "<td  id='".$row['id']."'>Pending</td>";}
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
            <div class="app-footer">
                <div class="footer-wrap">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-6 d-none d-md-block">
                            <ul class="page-breadcrumbs">
                                <li class="item"><a href="#" class="link">Medicine</a> <i
                                        class="separator icofont-thin-right"></i></li>
                                <li class="item"><a href="#" class="link">Patient</a> <i
                                        class="separator icofont-thin-right"></i></li>
                                <li class="item"><a href="#" class="link">Liam Jouns</a> <i
                                        class="separator icofont-thin-right"></i></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6 text-right">
                            <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                <span>Version 1.0.0</span> <button class="no-style ml-2 settings-btn"
                                    data-toggle="modal" data-target="#settings"><span
                                        class="icon icofont-ui-settings text-primary"></span></button></div>
                        </div>
                    </div>
                    <div class="footer-skeleton">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6 d-none d-md-block">
                                <ul class="page-breadcrumbs">
                                    <li class="item bg-1 animated-bg"></li>
                                    <li class="item bg animated-bg"></li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="info justify-content-center justify-content-md-end">
                                    <div class="version bg animated-bg"></div>
                                    <div class="settings animated-bg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Confirm appointment ? </h5>
				</div>
				<div class="modal-body">
				
                    <input type="hidden"  id="id" name="id" value="">
						
						
                    </form>
					
				</div>
				<div class="modal-footer d-block">
					<div class="actions justify-content-between"><button type="button" class="btn btn-error" data-dismiss="modal">Cancel</button> <button id="dmbt"  class="btn btn-info">Confirm appointment</button></div>
				</div>
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




jQuery(document).ready(function() {
 
var idd;

$("#myform").on('submit', function (event) {
        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action"); //get form action url
        var form_data = $(this).serialize(); //Encode form elements for submission

        $.post(post_url, form_data, function (response) {


            if (response == '1') {
                console.log('nice');

            } else {

                console.log("there is an error");
            }
        });
    });
        $(".tr").click(function() {
            var $row = $(this).closest("tr"),       // Finds the closest row <tr> 
             $tds = $row.find("td");             // Finds all children <td> elements

              // Visits every single <td> element
    // alert($tds.eq(1).text());  
    $('#id').val($tds.eq(0).attr('id'))
idd=$tds.eq(0).attr('id');
    
    $('#exampleModal').modal('show');       // Prints out the text within the <td>

});



$("#dmbt").click(function(e) {
$.ajax({   
                            url: "doctor/action.php",
                            type: "POST",
							data: { id:idd},
                            dataType: 'json',
                            success: function (response) {
                              if(response!='0'){
								
								location.reload(); }else{alert("Error");}
                            },
                          });
                        });









    });






</script>


<?php 

include 'info.php';
?>










</body>

</html>
