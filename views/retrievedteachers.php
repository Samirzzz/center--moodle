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
   <h1 id="h1h1">Showing sessions for: </h1>

    <table >
   
        <tr>
            <th>Teacher ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Subject</th>
            <th>Actions</th>
           
        </tr>
     
      <?php 


   $Sessioncntrl->retreiveteacher()


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