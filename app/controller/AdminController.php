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

}