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
                        <h1 class="page-title">users List</h1>
                        <button type="button" id="adduser" class="btn " >Add user</button>
                    </header>
                    <div class="page-content">
                        
                        <div class="card mb-0 mt-4">
                            <div class="card-header">All users: </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-hover">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                            <th scope="col">ID</th>
                                                <th scope="col" >Name</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Contact</th>
                                                <th scope="col">username</th>
                                                <th scope="col">Password</th>
                                                <th scope="col">Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php           
$order1=$mng->getusers();

    
                 
foreach($order1 as $row) {
    echo"<tr class='tr'>";
    echo "<td id='".$row['id']."'>".$row['id']."</td>";
    echo "<td  id='".$row['id']."'>".$row['name']."</td>";
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
					<h5 class="modal-title">Edit/Delete user</h5>
                
				</div>
				<div class="modal-body">
					<form id="myform" action="admin/action/ud.php" method="POST">
                        <div class="form-group">ID :<input id="id" name="id" class="form-control" type="text" placeholder="Name" value=""></div>
						<div class="form-group">Name :<input id="name" name="name" class="form-control" type="text" placeholder="Name" value=""></div>
                        <div class="form-group">Address :<input id="address" name="address" class="form-control" type="text" placeholder="address"></div>
                        <div class="form-group">Contact : <input id="contact" name="contact" class="form-control"  ></div>
                        <div class="form-group">Username : <input id="username" name="username" class="form-control"  ></div>
						<div class="form-group">Password : <input id="password" name="password" class="form-control" type="text" placeholder="password"></div>
						<div class="form-group">Type :<input id="type" name="type" class="form-control" type="text" placeholder="Date"></div>
						<div class="row">
							<div class="col-12 col-sm-6">
								
							</div>
							
						</div>
						
					
				</div>
				<div class="modal-footer d-block">
					<div class="actions justify-content-between"><button type="button" id="delete" class="btn btn-error" >Delete User</button> <button type="Submit" name="Submit" class="btn btn-info">Update User</button></div>
				</div>
                
                </form>
			</div>
		</div>
        <!-- 2nd modal for add user  -->
        <div class="content-overlay"></div>
        </div>
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit/Delete user</h5>
                
				</div>
				<div class="modal-body">
					<form id="addform" action="admin/action/adduser.php" method="POST">
                        <div class="form-group">ID :<input id="id" name="id" class="form-control" type="text" placeholder="Name" value="auto" readonly></div>
						<div class="form-group">Name :<input id="name" name="name" class="form-control" type="text" placeholder="Name" value=""></div>
                        <div class="form-group">Address :<input id="address" name="address" class="form-control" type="text" placeholder="address"></div>
                        <div class="form-group">Contact : <input id="contact" name="contact" class="form-control"  ></div>
                        <div class="form-group">Username : <input id="username" name="username" class="form-control"  ></div>
						<div class="form-group">Password : <input id="password" name="password" class="form-control" type="text" placeholder="password" ></div>
						<div class="form-group">Type :<input id="type" name="type" class="form-control" type="text" placeholder="Date" value="3" readonly></div>
						<div class="row">
							<div class="col-12 col-sm-6">
								
							</div>
							
						</div>
						
					
				</div>
				<div class="modal-footer d-block">
					<div class="actions justify-content-between"><button type="button" class="btn btn-error" data-dismiss="modal">Cancel</button> <button type="Submit" name="Submit" class="btn btn-info">add User</button></div>
				</div>
                
                </form>
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


// 

jQuery(document).ready(function() {
 
var did;

$("#myform").on('submit', function (event) {
        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action"); //get form action url
        var form_data = $(this).serialize(); //Encode form elements for submission

        $.post(post_url, form_data, function (response) {


            if (response == '1') {
                location.reload();

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
    $('#id').val($tds.eq(0).text());
    did=$tds.eq(0).text();
    $('#name').val($tds.eq(1).text());
    $('#address').val($tds.eq(2).text());
    $('#contact').val($tds.eq(3).text());
    $('#username').val($tds.eq(4).text());
    $('#password').val($tds.eq(5).text());
    $('#type').val($tds.eq(6).text());
    $('#exampleModal').modal('show');       // Prints out the text within the <td>

});

$("#delete").click(function(e) {
    event.preventDefault();
$.ajax({   
                            url: "admin/action/deleteuser.php",
                            type: "POST",
							data: { id:did},
                            dataType: 'json',
                            success: function (response) {
                              if(response!='0'){
								
								location.reload(); }else{alert("Error");}
                            },
                          });
                        });



$("#adduser").click(function(e) {
    
    $('#exampleModal1').modal('show'); 

    $("#addform").on('submit', function (event) {
        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action"); //get form action url
        var form_data = $(this).serialize(); //Encode form elements for submission

        $.post(post_url, form_data, function (response) {

            if (response == '1') {
                location.reload();

            } else {

                console.log("there is an error");
            }
        });
    });
      







                        });










    });






</script>


<?php
include 'layout/infoc.php';

?>









</body>

</html>
