<?php

require_once dirname(__FILE__, 2) . '/include/DB_Manage.php';
$mng = new DB_Manage();

if (!isset($_GET['id'])) {
    header("Location: sign-in.php");
    die();
} else {

    $stmt = $mng->db->prepare("SELECT * FROM `users` WHERE id =" . $_GET['id']);
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
                                            width="100" height="100" alt="" class="rounded-500 mr-4"> <button
                                            class="btn btn-outline-primary" type="button">Change photo<span
                                                class="btn-icon icofont-ui-user ml-2"></span></button></div>
                                    <div class="form-group"><label>Full name</label> <input class="form-control"
                                            type="text" placeholder="Full name" value="Liam Jouns"></div>
                                    <div class="form-group"><label>Id</label> <input class="form-control" type="text"
                                            placeholder="Id" value="10021" readonly="readonly"></div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group"><label>Age</label> <input class="form-control"
                                                    type="number" placeholder="Age" value="25"></div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group"><label>Gender</label> <select class="selectpicker"
                                                    title="Gender">
                                                    <option>Male</option>
                                                    <option selected="selected">Female</option>
                                                </select></div>
                                        </div>
                                    </div>
                                    <div class="form-group"><label>Phone number</label> <input class="form-control"
                                            type="number" placeholder="Phone number" value="0126596578"></div>
                                    <div class="form-group"><label>Address</label> <textarea class="form-control"
                                            placeholder="Address"
                                            rows="3">71 Pilgrim Avenue Chevy Chase, MD 20815</textarea></div>
                                    <div class="form-group"><label>Last visit</label> <input class="form-control"
                                            type="text" placeholder="Last visit" value="18 Dec 2019"
                                            readonly="readonly"></div>
                                    <div class="form-group"><label>Status</label> <select class="selectpicker"
                                            title="Status">
                                            <option selected="selected">Approved</option>
                                            <option>Pending</option>
                                        </select></div><button type="button" class="btn btn-success btn-block">Save
                                        changes</button>
                                </form>
                            </div>
                            <div class="col col-12 col-md-6 mb-4">
                                <div class="v-timeline dots">
                                    <div class="line"></div>
                                    <div class="timeline-box">
                                        <div class="box-items">
                                            <div class="item">
                                                <div class="icon-block">
                                                    <div class="item-icon bg-info"></div>
                                                </div>
                                                <div class="content-block">
                                                    <div class="item-header">
                                                        <h3 class="h5 item-title">New prescription</h3>
                                                        <div class="item-date"><span>18 Dec 2019</span></div>
                                                    </div>
                                                    <div class="item-desc">Aenean lacinia bibendum nulla sed
                                                        consectetur. Nullam id dolor id nibh ultricies vehicula ut id
                                                        elit.</div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="icon-block">
                                                    <div class="item-icon bg-danger"></div>
                                                </div>
                                                <div class="content-block">
                                                    <div class="item-header">
                                                        <h3 class="h5 item-title">Appointment</h3>
                                                        <div class="item-date"><span>5 Oct 2019</span></div>
                                                    </div>
                                                    <div class="item-desc">Lorem ipsum dolor sit amet, consectetur
                                                        adipisicing elit. Voluptate.</div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="icon-block">
                                                    <div class="item-icon bg-warning"></div>
                                                </div>
                                                <div class="content-block">
                                                    <div class="item-header">
                                                        <h3 class="h5 item-title">Medication</h3>
                                                        <div class="item-date"><span>1 Oct 2019</span></div>
                                                    </div>
                                                    <div class="item-desc">Lorem ipsum dolor sit amet, consectetur
                                                        adipisicing elit. Consequuntur nam nisi veniam.</div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="icon-block">
                                                    <div class="item-icon"></div>
                                                </div>
                                                <div class="content-block">
                                                    <div class="item-header">
                                                        <h3 class="h5 item-title">Operation</h3>
                                                        <div class="item-date"><span>23 Sep 2019</span></div>
                                                    </div>
                                                    <div class="item-desc">Aenean lacinia bibendum nulla sed
                                                        consectetur. Nullam id dolor id nibh ultricies vehicula ut id
                                                        elit.</div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="icon-block">
                                                    <div class="item-icon bg-dark"></div>
                                                </div>
                                                <div class="content-block">
                                                    <div class="item-header">
                                                        <h3 class="h5 item-title">Examination</h3>
                                                        <div class="item-date"><span>10 Jul 2019</span></div>
                                                    </div>
                                                    <div class="item-desc">Lorem ipsum dolor sit.</div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="icon-block">
                                                    <div class="item-icon bg-success"></div>
                                                </div>
                                                <div class="content-block">
                                                    <div class="item-header">
                                                        <h3 class="h5 item-title">Examination</h3>
                                                        <div class="item-date"><span>9 Jul 2019</span></div>
                                                    </div>
                                                    <div class="item-desc">Lorem ipsum dolor sit amet, consectetur
                                                        adipisicing elit. Consequuntur nam nisi veniam.</div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="icon-block">
                                                    <div class="item-icon bg-warning"></div>
                                                </div>
                                                <div class="content-block">
                                                    <div class="item-header">
                                                        <h3 class="h5 item-title">Medication</h3>
                                                        <div class="item-date"><span>30 Mar 2019</span></div>
                                                    </div>
                                                    <div class="item-desc">Lorem ipsum dolor sit amet, consectetur
                                                        adipisicing elit. Consequuntur nam nisi veniam.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-0 mt-4">
                            <div class="card-header">Billings</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th scope="col" class="text-nowrap">Bill NO</th>
                                                <th scope="col">Patient</th>
                                                <th scope="col">Doctor</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Charger</th>
                                                <th scope="col">Tax</th>
                                                <th scope="col">Discount</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="text-muted">138</div>
                                                </td>
                                                <td>Liam Jouns</td>
                                                <td>
                                                    <div class="text-nowrap">Dr. Sophie</div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap text-muted">18 Dec 2019</div>
                                                </td>
                                                <td>$155</td>
                                                <td>10%</td>
                                                <td>$5</td>
                                                <td>$160</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-muted">137</div>
                                                </td>
                                                <td>Liam Jouns</td>
                                                <td>
                                                    <div class="text-nowrap">Dr. Liam</div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap text-muted">5 Oct 2019</div>
                                                </td>
                                                <td>$155</td>
                                                <td>10%</td>
                                                <td>$5</td>
                                                <td>$160</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-muted">136</div>
                                                </td>
                                                <td>Liam Jouns</td>
                                                <td>
                                                    <div class="text-nowrap">Dr. Noah</div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap text-muted">1 Oct 2019</div>
                                                </td>
                                                <td>$155</td>
                                                <td>10%</td>
                                                <td>$5</td>
                                                <td>$160</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-muted">135</div>
                                                </td>
                                                <td>Liam Jouns</td>
                                                <td>
                                                    <div class="text-nowrap">Dr. Sophie</div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap text-muted">23 Sep 2019</div>
                                                </td>
                                                <td>$155</td>
                                                <td>10%</td>
                                                <td>$5</td>
                                                <td>$160</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-muted">134</div>
                                                </td>
                                                <td>Liam Jouns</td>
                                                <td>
                                                    <div class="text-nowrap">Dr. Emma</div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap text-muted">10 Jul 2019</div>
                                                </td>
                                                <td>$155</td>
                                                <td>10%</td>
                                                <td>$5</td>
                                                <td>$160</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-muted">133</div>
                                                </td>
                                                <td>Liam Jouns</td>
                                                <td>
                                                    <div class="text-nowrap">Dr. Emma</div>
                                                </td>
                                                <td>
                                                    <div class="text-muted">9 Jul 2019</div>
                                                </td>
                                                <td>$155</td>
                                                <td>10%</td>
                                                <td>$5</td>
                                                <td>$160</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-muted">132</div>
                                                </td>
                                                <td>Liam Jouns</td>
                                                <td>
                                                    <div class="text-nowrap">Dr. Sophie</div>
                                                </td>
                                                <td>
                                                    <div class="text-muted">30 Mar 2019</div>
                                                </td>
                                                <td>$155</td>
                                                <td>10%</td>
                                                <td>$5</td>
                                                <td>$160</td>
                                            </tr>
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
                            <div class="col-12 col-sm-6">
                                <div class="form-group"><input class="form-control" type="number" placeholder="Age">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group"><select class="selectpicker" title="Gender">
                                        <option class="d-none">Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select></div>
                            </div>
                        </div>
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