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



}

?>