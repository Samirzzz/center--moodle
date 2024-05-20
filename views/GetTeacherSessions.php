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

<?php
if(isset($_GET['tid']))
{
$teacherid=$_GET['tid'];
}
?>
   <h1 id="h1h1">Showing sessions for Teacher: </h1>

    <table >
   
        <tr>
            <th>Session ID</th>
            <th> Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Action</th>
            <th>Center Name</th>
           <th>Name</th>

        </tr>
     
      <?php 


   $Sessioncntrl->getTeacherSessions($teacherid);


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