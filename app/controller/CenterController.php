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

    static function editCenter($cname,$cloc,$cnumber,$uid,$conn)
    {
        $sql = "UPDATE center Set cname='$cname', cloc='$cloc', cnumber='$cnumber' WHERE uid='$uid'";
	    $result = mysqli_query($conn, $sql);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    public static function deleteCenter($id,$conn)
    {
        $sql = "DELETE FROM center WHERE uid=$id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            return true;
        } else {
            echo "Error deleting from 'center': " . mysqli_error($conn);

            return false;
        }
    }
    
    
}
?>