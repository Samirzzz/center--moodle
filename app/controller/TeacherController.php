<?php
require_once '../app/Model/User.php';
require_once '../app/Model/Teacher.php';

class TeacherController
{
    public $db;
    public $conn;
    public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }
    
    static function signupTeacher($firstname, $lastname, $number,$educ,$subject,$uid,$conn) 
    {
    
    
        $sql = "INSERT INTO teacher (firstname, lastname, number,educ,subject,uid,Cid) VALUES ('$firstname', '$lastname', '$number','$educ','$subject','$uid','0')";
        if(mysqli_query($conn,$sql))
                return true;
            else
                return false;
    
    
    }
    static function editTeacher($firstname, $lastname, $number,$educ,$subject,$uid,$conn)
{
	$sql = "UPDATE teacher Set firstname='$firstname', lastname='$lastname', number='$number', educ='$educ', subject='$subject' WHERE uid='$uid'";
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
public static function deleteTeacher($id,$conn)
{
    $sql = "DELETE FROM teacher WHERE uid=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return true;
    } else {
        echo "Error deleting from 'teacher': " . mysqli_error($conn);

        return false;
    }
}
}
?>