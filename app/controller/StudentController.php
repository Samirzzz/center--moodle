<?php
require_once '../app/Model/User.php';
require_once '../app/Model/Student.php';

class StudentController
{
	public $db;
	public $conn;
	public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }
    

static function signupStudent($firstname, $lastname, $number,$age,$gender,$address,$uid,$conn) {
	$sql = "INSERT INTO student (firstname, lastname, number, age, gender, address,uid) VALUES ('$firstname', '$lastname', '$number', '$age', '$gender', '$address','$uid')";
if(mysqli_query($conn,$sql))
		return true;
	else
		return false;
}

static function editStudent($firstname, $lastname, $number,$gender,$address,$uid,$conn)
{
	$sql = "UPDATE student Set firstname='$firstname', lastname='$lastname', number='$number', gender='$gender', address='$address' WHERE uid='$uid'";
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
public static function deleteStudent($id,$conn)
{
	$sql = "DELETE FROM student WHERE uid=$id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		return true;
	} else {
		echo "Error deleting from 'student': " . mysqli_error($conn);
		return false;
	}
}


}

?>