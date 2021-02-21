<?php
  session_start();
  ob_start();
  


if (!isset($_SESSION['id'])) {
    header("Location:../index.php");
    die();}


require_once '../include/Config.php';


if(isset($_POST['add'])){


$docid=$_POST['docid'];
$speciality=$_POST['speciality'];


$stmt = "INSERT INTO `medical_specialty`(`id`, `fk_UID`, `specialty`) VALUES (NULL,'$doid','$spcl')";
$order = mysqli_query($con, $stmt);
if($order){

    header("Refresh:0; url=users.php");
    // relaod 
}
}


if(isset($_POST['update'])){


    $id=$_POST['id'];
    $docid=$_POST['docid'];
    $speciality=$_POST['speciality'];
$stmt = "UPDATE `medical_specialty` SET `id`=$id,`fk_UID`=$docid,`specialty`='$speciality' WHERE id=$id";
$order = mysqli_query($con, $stmt);
if($order){
    header("Refresh:0; url=users.php");

    // relaod 
}


}



// delete user 
if(isset($_POST['delete'])){
    $id=$_POST['id'];
$stmt = "DELETE FROM `medical_specialty` WHERE id=$id";
$order1 = mysqli_query($con, $stmt);
if($order1){
 
 
    header("Refresh:0; url=users.php"); 
    // relaod 


}

}
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
                        <h1 class="page-title">Speciality List</h1>
                        <button type="button" id="adduser" class="btn " >Add Speciality</button>
                    </header>
                    <div class="page-content">
                        
                        <div class="card mb-0 mt-4">
                            <div class="card-header">All Speciality: </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-hover">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                           
                                                <th scope="col" >ID</th>
                                                <th scope="col">Doctor ID</th>
                                                <th scope="col">Speciality</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
<?php           


    

$stmt1 = "SELECT * FROM `medical_specialty`";
$order1 = mysqli_query($con, $stmt1);
while($row = mysqli_fetch_array($order1)){
    echo"<tr class='tr'>";
    echo "<td id='".$row['id']."'>".$row['id']."</td>";
    echo "<td  id='".$row['id']."'>".$row['fk_UID']."</td>";
    echo "<td  id='".$row['id']."'>".$row['specialty']."</td>";
 
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
					<h5 class="modal-title">Edit/Delete user</h5>
                
				</div>
				<div class="modal-body">
					<form id="myform" action="" method="POST">
                        <div class="form-group">ID :<input id="id" name="id" class="form-control" type="text" placeholder="Name" value=""></div>
						<div class="form-group">Doctor id :<input id="docid" name="docid" class="form-control" type="text" placeholder="Name" value=""></div>
                        <div class="form-group">Speciality :<input id="speciality" name="speciality" class="form-control" type="text" placeholder="address"></div>
                       
						<div class="row">
							<div class="col-12 col-sm-6">
								
							</div>
							
						</div>
						
					
				</div>
				<div class="modal-footer d-block">
					<div class="actions justify-content-between"><button type="Submit" name="update" id="delete" class="btn btn-error" >Delete Speciality</button> <button type="Submit" name="Submit" class="btn btn-info">Update Speciality</button></div>
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
					<form id="addform" action="" method="POST">
                        <div class="form-group">ID :<input id="id" name="id" class="form-control" type="text" placeholder="id" value="auto" readonly></div>
						<div class="form-group">Doc ID :<input id="name" name="docid" class="form-control" type="text" placeholder="doc id" value=""></div>
                        <div class="form-group">Speciality :<input id="address" name="speciality" class="form-control" type="text" placeholder="speciality"></div>
                        
						<div class="row">
							<div class="col-12 col-sm-6">
								
							</div>
							
						</div>
						
					
				</div>
				<div class="modal-footer d-block">
					<div class="actions justify-content-between"><button type="button" class="btn btn-error" data-dismiss="modal">Cancel</button> <button type="Submit" name="new" class="btn btn-info">add Speciality</button></div>
				</div>
                
                </form>
			</div>
		</div>
	</div>
  
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

<script>


// 

jQuery(document).ready(function() {
 

        $(".tr").click(function() {
            var $row = $(this).closest("tr"),       // Finds the closest row <tr> 
             $tds = $row.find("td");             // Finds all children <td> elements
     $('#id').val($tds.eq(0).text());
    $('#docid').val($tds.eq(1).text());
    $('#speciality').val($tds.eq(2).text());
    
    $('#exampleModal').modal('show');       // Prints out the text within the <td>

});

$("#delete").click(function(e) {

                        });



$("#adduser").click(function(e) {
    
    $('#exampleModal1').modal('show'); 


                        });




    });






</script>












</body>

</html>
