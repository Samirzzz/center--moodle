<?php
require_once '../app/Model/User.php';
require_once '../app/Model/Admin.php';
class AdminController{
	public $aid;
	public $name;
	public $uid;
	public $db;
    public $conn;
    public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }

    function addpage($name,$la,$icon,$class){
        $sql_pages = "INSERT INTO pages (name, linkaddress, icons,class) VALUES ('$name', '$la', '$icon','$class')";
        $res = mysqli_query($this->conn, $sql_pages);
        if ($res) {
            header("Location: addpage.php");
        } else {
            echo "Error inserting data into the pages table: ";
        
         }
    }
    
    


}