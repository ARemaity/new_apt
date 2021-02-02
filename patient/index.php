<?php
  session_start();
  ob_start();
  $_session['id']=7;

require_once dirname(__FILE__, 2) . '/include/DB_Manage.php';
$mng = new DB_Manage();

if (!isset($_session['id'])) {
    header("Location:../index.php");
    die();
} else {

    $stmt = $mng->db->prepare("SELECT * FROM `users` WHERE id =" .$_session['id']);
    if ($stmt->execute()) {
        $order = $stmt->get_result()->fetch_assoc();
        $stmt->close();
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
                        <h1 class="page-title">Patient profile page</h1>
                    </header>
                    <div class="page-content">
                        <div class="row">
                            <div class="col col-12 col-md-6 mb-4">
                                <form><label>Photo</label>
                                    <div class="form-group avatar-box d-flex align-items-center"><img
                                            src="http://medic-app-html.type-code.pro/assets/content/user-400-3.jpg"
                                            width="100" height="100" alt="" class="rounded-500 mr-4"> </div>
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
                            <div class="card-header">Billings</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th scope="col" >Doctor Name</th>
                                                <th scope="col">contact</th>
                                                <th scope="col">Date</th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody>
<?php           
  $stmt1 = $mng->db->prepare("SELECT name,contact,schedule FROM users u INNER JOIN appointment_list a on a.doctor_id=u.id WHERE a.patient_id =" .$_session['id']);
    if ($stmt1->execute()) {
        $order1 = $stmt1->get_result()->fetch_assoc();
        $stmt1->close();
    }
                           




    
foreach($order1 as $row) {
    echo"<tr>";

    echo "<td>".print_r($row)."</td>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".$row[2]."</td>";
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
    </div><!-- Add patients modals -->
    <div class="modal fade" id="add-patient" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new patient</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group avatar-box d-flex"><img
                                src="http://medic-app-html.type-code.pro/assets/content/anonymous-400.jpg" width="40"
                                height="40" alt="" class="rounded-500 mr-4"> <button class="btn btn-outline-primary"
                                type="button">Select image<span class="btn-icon icofont-ui-user ml-2"></span></button>
                        </div>
                        <div class="form-group"><input class="form-control" type="text" placeholder="Name"></div>
                        <div class="form-group"><input class="form-control" type="number" placeholder="Number"></div>
                        <div class="row">
                           
                        <div class="form-group mb-0"><textarea class="form-control" placeholder="Address"
                                rows="3"></textarea></div>
                    </form>
                </div>
                <div class="modal-footer d-block">
                    <div class="actions justify-content-between"><button type="button" class="btn btn-error"
                            data-dismiss="modal">Cancel</button> <button type="button" class="btn btn-info">Add
                            patient</button></div>
                </div>
            </div>
        </div>
    </div><!-- end Add patients modals -->
    <!-- Add patients modals -->
    <div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Application's settings</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group"><label>Layout</label> <select class="selectpicker" title="Layout"
                                id="layout">
                                <option value="horizontal-layout">Horizontal</option>
                                <option value="vertical-layout">Vertical</option>
                            </select></div>
                        <div class="form-group"><label>Light/dark topbar</label>
                            <div class="custom-control custom-switch"><input type="checkbox"
                                    class="custom-control-input" id="topbar"> <label class="custom-control-label"
                                    for="topbar"></label></div>
                        </div>
                        <div class="form-group"><label>Light/dark sidebar</label>
                            <div class="custom-control custom-switch"><input type="checkbox"
                                    class="custom-control-input" id="sidebar"> <label class="custom-control-label"
                                    for="sidebar"></label></div>
                        </div>
                        <div class="form-group mb-0"><label>Boxed/fullwidth mode</label>
                            <div class="custom-control custom-switch"><input type="checkbox"
                                    class="custom-control-input" id="boxed" checked="checked"> <label
                                    class="custom-control-label" for="boxed"></label></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-block">
                    <div class="actions justify-content-between"><button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Cancel</button> <button id="reset-to-default" type="button"
                            class="btn btn-error">Reset to default</button></div>
                </div>
            </div>
        </div>
    </div><!-- end Add patients modals -->
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
</body>

</html>

<?php
}

?>