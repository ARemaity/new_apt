<?php




  session_start();
  ob_start();
  

require_once dirname(__FILE__, 3) . '/include/DB_Manage.php';
$mng = new DB_Manage();





$name=$_POST['name'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$username=$_POST['username'];
$password=$_POST['password'];
$type=$_POST['type'];


$result = $mng->adduser($name,$address,$contact,$username,$password,$type);
echo $result;





?>