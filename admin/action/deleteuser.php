<?php




  session_start();
  ob_start();
  

require_once dirname(__FILE__, 3) . '/include/DB_Manage.php';
$mng = new DB_Manage();




$id=$_POST['id'];



$result = $mng->deleteuser($id);
echo $result;





?>