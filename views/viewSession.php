<?php
include_once '../includes/navbar.php';
require_once '../app/Controller/SessionController.php';
$db = Database::getInstance();
$conn = $db->getConnection();	
$Sessioncntrl =new SessionController();
?>
<html>
<head>
    <title></title>
 
</head>
<body>


   
   
   
</h1>

    <table >
   
        <tr>
            <th>SESSION ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Actions</th>
            <th>Center</th>
           
        </tr>
     
      <?php 

if ($_SESSION["type"] == 'center') {
   $center_id = $Sessioncntrl->getCenterID($_SESSION["ID"]);
   $Sessioncntrl->viewSessions($center_id);
 }
else if ($_SESSION["type"] == 'teacher') {
    $center_id = $Sessioncntrl->getTeacherID($_SESSION["ID"]);
    $Sessioncntrl->getTeacherSessions($center_id); 
}

?>

    </table>

    <style>
        /* body {
            
            padding-left: 60px;
            margin-left: 20px;
        } */

        table {
            width: 70%;
            border-collapse: collapse;
            margin-top: 30px;
            margin-left: 350px;
        }
        h1{
            margin-left: 350px;  
            margin-top: 36px;
             
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
    background-color: #EDE5E5;
}
        .crud-bar{
            width: 80%;
            
            margin-left: 350px;
        }
    </style>

</body>

</html>