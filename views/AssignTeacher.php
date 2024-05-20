<?php
session_start();
require_once '../app/controller/SessionController.php';
$db = Database::getInstance();
$conn = $db->getConnection();
$sessioncntrl =new SessionController();
if(isset($_GET['tid']))
{
$teacherid=$_GET['tid'];
}
$center_id = $sessioncntrl->getCenterID($_SESSION["ID"]);

$sessioncntrl->assignTeacher($center_id,$teacherid);
header("location:./retrievedteachers.php");

?>