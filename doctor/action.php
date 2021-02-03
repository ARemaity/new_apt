<?php
session_start();
ob_start();


require_once dirname(__FILE__, 2) . '/include/DB_Manage.php';
$db = new DB_Manage();
$id=$_POST['id'];



if(!empty($id)){
    $result = $db->confirmapt($id);
    if($result){
        echo 1;

        die();
        
    }
  }







echo 0;
die();