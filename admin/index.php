<?php
session_start();
ob_start();
ob_flush();


require_once dirname(__FILE__, 2) . '/include/DB_Manage.php';
$mng = new DB_Manage();

if (!isset($_SESSION['id'])) {
    header("Location:../index.php");

    die();
} else {

    $stmt = $mng->db->prepare("SELECT * FROM `users` WHERE id =" .$_SESSION['id']);
    if ($stmt->execute()) {
        $order = $stmt->get_result()->fetch_assoc();
        $stmt->close();
    }    }

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
                        <h1 class="page-title">Admin profile page</h1>
                    </header>
                    <div class="page-content">
                        <div class="row">
                            <div class="col col-12 col-md-6 mb-4">
                                <form> 
                                    <div class="form-group"><label>Full name</label> <input class="form-control"
                                            type="text" placeholder="Full name" value="<?php echo $order['name']; ?>"readonly="readonly"></div>
                                    <div class="form-group"><label>Id</label> <input class="form-control" type="text"
                                            placeholder="Id" value="<?php echo $order['id']; ?>" readonly="readonly"></div>
                                    <div class="row">
                                        
                                       
                                    </div>
                                    <div class="form-group"><label>Phone number</label> <input class="form-control"
                                            type="text" placeholder="Full name" value="<?php echo $order['contact']; ?>"readonly="readonly"></div>
                                    <div class="form-group"><label>Address</label> <textarea class="form-control"
                                            placeholder="Address"
                                            rows="3" readonly="readonly" ><?php echo $order['address']; ?></textarea></div>
                                   
                                  
                                </form>
                            </div>
                        
                        </div>
                        <div class="card mb-0 mt-4">
                         
                            <div class="card-body">
                
                            </div>
                        </div>
                    </div>
                </div>
            </main>
             
        </div>
    </div><!-- Add patients modals -->
  
    <!-- Add patients modals -->

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



    <?php
include 'layout/infoc.php';

?>
</body>

</html>

