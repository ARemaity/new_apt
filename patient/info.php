<?php
    session_start();
    ob_start();
    include('header.php');
    include('admin/db_connect.php');

	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ob_end_flush();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info </title>
</head>
<body>
    
<section class="page-section">
        <div class="container">
    <?php echo html_entity_decode($_SESSION['setting_about_content']) ?>        
            
        </div>
        </section>
</body>
</html>
