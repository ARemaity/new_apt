<?php 

//America/New_York

class DB_Manage {
     
     
    private $conn;
 
//private $timezone;
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();

       // $this->date= new DateTime("now", new DateTimeZone('Asia/Beirut'));
       // $this->timezone=$this->date->format('Y-m-d H:i:s');
    }

    // destructor
    function __destruct() {
        
    }

    // public function insertintoclient($name,$address,$phone_number) {
                                
    //                 $stmt = $this->conn->prepare("INSERT INTO `client`(`CID`, `name`, `address`, `phone_number`) VALUES (NULL,?,?,?)");
    //                 $stmt->bind_param("ssi",$name,$address,$phone_number);
    //                 $result = $stmt->execute();
    //                 $stmt->close();
    //              // check for successful stores
    //              if ($result) {
    //                  return true;
    //              } else {
    //                  return false;
    //              }
    //          }

        //      public function deletefromclient($clientid) {
                                
        //         $stmt = $this->conn->prepare("DELETE FROM `client` WHERE CID = ?");
        //         $stmt->bind_param("i",$clientid);
        //          $result = $stmt->execute();
        //      $stmt->close();
        //      // check for successful stores
        //      if ($result) {
        //          return true;
        //      } else {
        //          return false;
        //      }
        //  }


         public function insertintocompany($name,$address,$phone,$description) {
                                
            $stmt = $this->conn->prepare("INSERT INTO `company`(`CID`, `name`, `address`, `phone`, `description`) VALUES (Null,?,?,?,?)");
            $stmt->bind_param("ssis",$name,$address,$phone,$description);
            $result = $stmt->execute();
            $stmt->close();
         // check for successful stores
         if ($result) {
             return true;
         } else {
             return false;
         }
     }


     public function insertintoexpense($name,$description) {
                                
        $stmt = $this->conn->prepare("INSERT INTO `expense`(`EID`, `name`, `description`) VALUES (Null,?,?)");
        $stmt->bind_param("ss",$name,$description);
        $result = $stmt->execute();
        $stmt->close();
     // check for successful stores
     if ($result) {
         return true;
     } else {
         return false;
     }
 }



 public function insertintoexpense_transaction($fk_UID,$fk_PID,$fk_IID,$cost) {
                                
    $stmt = $this->conn->prepare("INSERT INTO `expense_transaction`(`ETID`, `fk_UID`, `fk_PID`, `fk_EID`,`cost`,`created_at`) VALUES (Null,?,?,?,?,NOW())");
    $stmt->bind_param("iiid",$fk_UID,$fk_PID,$fk_IID,$cost);
    $result = $stmt->execute();
    $stmt->close();
 // check for successful stores
 if ($result) {
     return true;
 } else {
     return false;
 }
}








public function insertintoincome_transaction($fk_UID,$fk_PID,$fk_IID,$created_at) {
                                
    $stmt = $this->conn->prepare("INSERT INTO `income_transaction`(`ITID`, `fk_UID`, `fk_PID`, `fk_IID`, `created_at`) VALUES (Null,?,?,?,?)");
    $stmt->bind_param("iiis",$fk_UID,$fk_PID,$fk_IID,$created_at);
    $result = $stmt->execute();
    $stmt->close();
 // check for successful stores
 if ($result) {
     return true;
 } else {
     return false;
 }
}




public function insertintoproject($number,$city,$client_name,$client_phone) {
                                
    $stmt = $this->conn->prepare("INSERT INTO `project`(`PID`, `number`, `city`, `client_name`, `client_phone`, `created_at`) VALUES (Null,?,?,?,?,NOW())");
 
    $stmt->bind_param("issi",$number,$city,$client_name,$client_phone);
  
    $result = $stmt->execute();
    $stmt->close();
 // check for successful stores
 if ($result) {
     return true;
 } else {
     return false;
 }
}

  

 public function getcompany($companyid) {
       
    $stmt = $this->conn->prepare("SELECT `CID`, `name`, `address`, `phone`, `description` FROM `company` WHERE CID = ?");        
$stmt->bind_param("i", $companyid);   

if ($stmt->execute()) {			
     $order = $stmt->get_result()->fetch_assoc();
     $stmt->close();
     return $order; 
 } else {
    return NULL;
 }
}


public function getexpense($expenseid) {
       
    $stmt = $this->conn->prepare("SELECT `EID`, `name`, `description` FROM `expense` WHERE EID = ?");        
$stmt->bind_param("i", $expenseid);   

if ($stmt->execute()) {			
     $order = $stmt->get_result()->fetch_assoc();
     $stmt->close();
     return $order; 
 } else {
    return NULL;
 }
}
public function getallexpense() {
       
    $stmt = $this->conn->prepare(" SELECT `EID`, `name` FROM `expense` ");        
  

if ($stmt->execute()) {			
    return $stmt;
 } else {
    return NULL;
 }
}



public function getexpense_transaction($expensetrans_id) {
       
    $stmt = $this->conn->prepare("SELECT `ETID`, `fk_UID`, `fk_PID`, `fk_IID`, `cost`, `created_at` FROM `expense_transaction` WHERE ETID = ?");        
$stmt->bind_param("i", $expensetrans_id);   

if ($stmt->execute()) {			
     $order = $stmt->get_result()->fetch_assoc();
     $stmt->close();
     return $order; 
 } else {
    return NULL;
 }
}





public function getincome_transaction($incomereans_id) {
       
    $stmt = $this->conn->prepare("SELECT `ITID`, `fk_UID`, `fk_PID`, `fk_IID`, `created_at` FROM `income_transaction` WHERE ITID = ?");        
$stmt->bind_param("i", $incomereans_id);   

if ($stmt->execute()) {			
     $order = $stmt->get_result()->fetch_assoc();
     $stmt->close();
     return $order; 
 } else {
    return NULL;
 }
}



public function getproject($projecttid) {
       
    $stmt = $this->conn->prepare("SELECT `PID`, `number`, `city`, `client_name`, `client_phone`, `created_at` FROM `project` WHERE PID = ?");        
$stmt->bind_param("i", $projecttid);   

if ($stmt->execute()) {			
     $order = $stmt->get_result()->fetch_assoc();
     $stmt->close();
     return $order; 
 } else {
    return NULL;
 }
}

public function updateproject($projecttid,$number,$city,$client_name,$client_phone) {
       
    $stmt = $this->conn->prepare("UPDATE `project` SET `number`= ?,`city`= ?,`client_name`= ?,`client_phone`= ? WHERE PID = ?");        
$stmt->bind_param("issii", $number,$city,$client_name,$client_phone,$projecttid);   
$result = $stmt->execute();
$stmt->close();
// check for successful stores
if ($result) {
 return true;
} else {
 return false;
}
}








}

?>