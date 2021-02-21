<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "appt_db");


?>


<?php

$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

if (mysqli_connect_errno())
  {



  echo "Failed to connect to MySQL: " . mysqli_connect_error();


  
  }
?>