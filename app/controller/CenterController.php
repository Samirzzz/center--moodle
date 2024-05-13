<?php
require_once '../app/Model/User.php';
require_once '../app/Model/Center.php';

class CenterController
{
    public $db;
	public $conn;
    public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }
   
  
    
        
        static function signupCenter($cname,$cloc,$cnumber,$uid,$conn) 
    {
    
        $sql = "INSERT INTO center (cname,cloc,cnumber,uid) VALUES ('$cname','$cloc','$cnumber','$uid')";
        if(mysqli_query($conn,$sql))
                return true;
            else
                return false;
    
    
    }

    
    
    
}
?>