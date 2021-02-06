<?php 

class DB_Manage {
     
     
    public $db;

    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
         $this->db = $db->connect();

      
    }

    // destructor
    function __destruct() {
        
    }

    function login1(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".$password."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function login2(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '".$email."' and password = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";
		$data .= ", type = '$type' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function signup(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", contact = '$contact' ";
		$data .= ", address = '$address' ";
		$data .= ", username = '$email' ";
		$data .= ", password = '".md5($password)."' ";
		$data .= ", type = 3";
		$chk = $this->db->query("SELECT * FROM users where username = '$email' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("INSERT INTO users set ".$data);
		if($save){
			$qry = $this->db->query("SELECT * FROM users where username = '".$email."' and password = '".md5($password)."' ");
			if($qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'passwors' && !is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
			}
			return 1;
		}
	}

	function save_settings(){
		extract($_POST);
		$data = " name = '".str_replace("'","&#x2019;",$name)."' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
	
		// echo "INSERT INTO system_tbl set ".$data;
		$chk = $this->db->query("SELECT * FROM system_tbl");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_tbl set ".$data);
		}else{
			$save = $this->db->query("INSERT INTO system_tbl set ".$data);
		}
		if($save){
		$query = $this->db->query("SELECT * FROM system_tbl limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}

			return 1;
				}
	}

	

	function save_doctor(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", name_pref = '$name_pref' ";
		$data .= ", clinic_address = '$clinic_address' ";
		$data .= ", contact = '$contact' ";
		$data .= ", email = '$email' ";
		if(!empty($_FILES['img']['tmp_name'])){
			$fname = strtotime(date("Y-m-d H:i"))."_".$_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/img/'.$fname);
			if($move){
				$data .=", img_path = '$fname' ";
			}
		}
		$data .=" , specialty_ids = '[".implode(",",$specialty_ids)."]' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO doctors_list set ".$data);
			$did= $this->db->insert_id;
		}else{
			$save = $this->db->query("UPDATE doctors_list set ".$data." where id=".$id);
		}
		if($save){
			$data = " username = '$email' ";
			if(!empty($password))
			$data .= ", password = '".$password."' ";
			$data .= ", name = 'DR.".$name.', '.$name_pref."' ";
			$data .= ", contact = '$contact' ";
			$data .= ", address = '$clinic_address' ";
			$data .= ", type = 2";
			if(empty($id)){
				$chk = $this->db->query("SELECT * FROM users where username = '$email ")->num_rows;
				if($chk > 0){
					return 2;
					exit;
				}
					$data .= ", doctor_id = '$did'";

					$save = $this->db->query("INSERT INTO users set ".$data);
			}else{
				$chk = $this->db->query("SELECT * FROM users where username = '$email' and doctor_id != ".$id)->num_rows;
				if($chk > 0){
					return 2;
					exit;
				}
					$data .= ", doctor_id = '$id'";
				$chk2 = $this->db->query("SELECT * FROM users where doctor_id = ".$id)->num_rows;
					if($chk2 > 0)
						$save = $this->db->query("UPDATE users set ".$data." where doctor_id = ".$id);
					else
						$save = $this->db->query("INSERT INTO users set ".$data);
					

			}
			return 1;
		}
	}
	function delete_doctor(){
		
		$delete = $this->db->query("DELETE FROM doctors_list where id = ".$id);
		if($delete)
			return 1;
	}

	function save_schedule(){
		extract($_POST);
		foreach($days as $k => $val){
			$data = " doctor_id = '$doctor_id' ";
			$data .= ", day = '$days[$k]' ";
			$data .= ", time_from = '$time_from[$k]' ";
			$data .= ", time_to = '$time_to[$k]' ";
			if(isset($check[$k])){
				if($check[$k]>0)
				$save[] = $this->db->query("UPDATE doctors_schedule set ".$data." where id =".$check[$k]);
			else
				$save[] = $this->db->query("INSERT INTO doctors_schedule set ".$data);
			}
		}

			if(isset($save)){
				return 1;
			}
	}

	function set_appointment(){
		extract($_POST);
		$doc = $this->db->query("SELECT * FROM doctors_list where id = ".$doctor_id);
		$schedule = date('Y-m-d',strtotime($date)).' '.date('H:i',strtotime($time)).":00";
		$day = date('l',strtotime($date));
		$time = date('H:i',strtotime($time)).":00";
		$sched = date('H:i',strtotime($time));
		$doc_sched_check = $this->db->query("SELECT * FROM doctors_schedule where doctor_id = $doctor_id and day = '$day' and ('$time' BETWEEN time_from and time_to )");
		if($doc_sched_check->num_rows <= 0){
			return json_encode(array('status'=>2,"msg"=>"Appointment schedule not valid for selected doctor's schedule."));
			exit;
		}

		$data = " doctor_id = '$doctor_id' ";
		if(!isset($patient_id))
		$data .= ", patient_id = '".$_SESSION['login_id']."' ";
		else
		$data .= ", patient_id = '$patient_id' ";

		$data .= ", schedule = '$schedule' ";
		if(isset($status))
		$data .= ", status = '$status' ";
		if(isset($id) && !empty($id))
		$save = $this->db->query("UPDATE appointment_list set ".$data." where id = ".$id);
		else
		$save = $this->db->query("INSERT INTO appointment_list set ".$data);
		if($save){
			return json_encode(array('status'=>1));
		}
	}
	function delete_appointment(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM appointment_list where id = ".$id);
		if($delete)
			return 1;
	}

public function getdocapt(){

$stmt1 = $this->db->prepare(" SELECT u.id,u.name , u.contact , d.day , d.time_from ,d.time_to ,m.specialty FROM users u INNER JOIN doctors_schedule d on u.id = d.doctor_id INNER JOIN medical_specialty m on u.id = m.fk_UID ");
    if ($stmt1->execute()) {
        $order1 = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);
		$stmt1->close();
		return $order1;
    }
         else {return false;}
}
	


		 public function insapt($docid,$patientid,$schedule){

			$stmt1 = $this->db->prepare("INSERT INTO `appointment_list`(`id`, `doctor_id`, `patient_id`, `schedule`, `status`, `date_created`) VALUES (Null,$docid,$patientid,?,0,NOW())");
			$stmt1->bind_param("s",$schedule);  	
			if ($stmt1->execute()) {
					
					$stmt1->close();
					return 1;
				}
					 else {return 0;}


}

public function getinfo(){

	$stmt1 = $this->db->prepare("SELECT * FROM `system_tbl` WHERE id = 1");
		if ($stmt1->execute()) {
			$order1 = $stmt1->get_result()->fetch_assoc();
			$stmt1->close();
			return $order1;
		}
			 else {return false;}
	}

	public function login($username,$passwrod){
		
		$stmt = $this->db->prepare("SELECT `id`,`username`, `password`, `type` FROM `users` WHERE username ='".$username."' and password ='".$passwrod."'");  
			
		$result = $stmt->execute();	
			if(!$result){
			//error
				die();
			}
		
			 $order = $stmt->get_result()->fetch_assoc();
			 $stmt->close();
			return $order;
		
		}



		public function getsched(){

			$stmt1 = $this->db->prepare(" SELECT m.id,name,contact,schedule,status,date_created FROM users u INNER JOIN appointment_list m on u.id = m.patient_id  WHERE m.doctor_id =" .$_SESSION['id']);
				if ($stmt1->execute()) {
					$order1 = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);
					$stmt1->close();
					return $order1;
				}
					 else {return false;}
			}

			public function confirmapt($id,$st){
			
				$stmt1 = $this->db->prepare(" UPDATE `appointment_list` SET `status`=".$st." WHERE id=".$id);
					if ($stmt1->execute()) {
						
						$stmt1->close();
						return 1;
					}
						 else {return 0;}
				}
				public function getusers(){

					$stmt1 = $this->db->prepare("SELECT * FROM `users` WHERE type = 3");
						if ($stmt1->execute()) {
							$order1 = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);
							$stmt1->close();
							return $order1;
						}
							 else {return false;}
					}

					public function updateuser($id,$name,$address,$contact,$username,$password,$type){

						$stmt1 = $this->db->prepare("UPDATE `users` SET `id`=?,`name`=?,`address`=?,`contact`=?,`username`=?,`password`=?,`type`=? WHERE id =$id");
						$stmt1->bind_param("isssssi",$id,$name,$address,$contact,$username,$password,$type);  
							if ($stmt1->execute()) {

							
								$stmt1->close();
								return 1;
							}
								 else {return 0;}
						}
						public function deleteuser($id){

							$stmt1 = $this->db->prepare("DELETE FROM `users` WHERE id=$id");
								if ($stmt1->execute()) {
								
									$stmt1->close();
									return true;
								}
									 else {return false;}
							}
							public function adduser($name,$address,$contact,$username,$password,$type){

								$stmt1 = $this->db->prepare("INSERT INTO `users`(`id`, `name`, `address`, `contact`, `username`, `password`, `type`) VALUES (NULL,'$name','$address','$contact','$username','$password',$type)");
									if ($stmt1->execute()) {
									
										$stmt1->close();
										return 1;
									}
										 else {return 0;}
								}
								public function getdoctors(){

									$stmt1 = $this->db->prepare("SELECT * FROM `users` WHERE type = 2");
										if ($stmt1->execute()) {
											$order1 = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);
											$stmt1->close();
											return $order1;
										}
											 else {return false;}
									}
									
									public function getallapt(){

										$stmt1 = $this->db->prepare("SELECT u.name as docn,u.contact as dcontact ,a.schedule,a.status,m.name,m.contact FROM users u INNER JOIN appointment_list a on u.id = a.doctor_id INNER JOIN users m on m.id = a.patient_id");
											if ($stmt1->execute()) {
												$order1 = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);
												$stmt1->close();
												return $order1;
											}
												 else {return false;}
										}


										public function getsp(){

											$stmt1 = $this->db->prepare("SELECT * FROM `medical_specialty`");
												if ($stmt1->execute()) {
													$order1 = $stmt1->get_result()->fetch_all(MYSQLI_ASSOC);
													$stmt1->close();
													return $order1;
												}
													 else {return false;}
											}
	
											public function addsp($doid,$spcl){

												$stmt1 = $this->db->prepare("INSERT INTO `medical_specialty`(`id`, `fk_UID`, `specialty`) VALUES (NULL,$doid,'$spcl')");
													if ($stmt1->execute()) {
													
														$stmt1->close();
														return 1;
													}
														 else {return 0;}
												}
												

												public function deletesp($id){

													$stmt1 = $this->db->prepare("DELETE FROM `medical_specialty` WHERE id=$id");
														if ($stmt1->execute()) {
														
															$stmt1->close();
															return 1;
														}
															 else {return 0;}
													}
													public function updatesp($id,$docid,$speciality){

														$stmt1 = $this->db->prepare("UPDATE `medical_specialty` SET `id`=$id,`fk_UID`=$docid,`specialty`='$speciality' WHERE id=$id");
															if ($stmt1->execute()) {
															
																$stmt1->close();
																return 1;
															}
																 else {return 0;}
														}

														

														public function updateinfo($id,$info){

															$stmt1 = $this->db->prepare("UPDATE `system_tbl` SET `about_content`='$info' WHERE id=$id");
																if ($stmt1->execute()) {
																
																	$stmt1->close();
																	return 1;
																}
																	 else {return 0;}
															}




}

?>