<?php




  session_start();
  ob_start();
 

require_once dirname(__FILE__, 2) . '/include/DB_Manage.php';
$mng = new DB_Manage();

$patientid=$_SESSION['id'];
$docid=$_POST['id'];
$time=$_POST['appt'];

$result = $mng->insapt($docid,$patientid,$time);
echo $result;











?>