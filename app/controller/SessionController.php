<?php
 require_once '../app/Model/Session.php';
class SessionController
{
    public $db;
	public $conn;
   public $session;
   public function __construct(){
    $db = Database::getInstance();
	$this->conn = $db->getConnection();
    $this->session=new Session();
  
}
public function getSessionInstance(){

    return  $this->session;
}

public function validateSession($date, $time, $status, $price, $teacherId, $centerId)
{
    $errors = array();

    if (empty($date)) {
        $errors[] = "Date is required";
    }

    if (empty($time)) {
        $errors[] = "Time is required";
    }

    if (empty($status)) {
        $errors[] = "Status is required";
    }
    if (empty($price)) {
        $errors[] = "Price is required";
    }
    if (empty($teacherId)) {
        $errors[] = "Teacher ID is required";
    }
    if (empty($centerId)) {
        $errors[] = "Center ID is required";
    }


    // Date validation
    $currentDate = date("Y-m-d");
    $maxAllowedDate = date("Y-m-d", strtotime("+45 days")); // 1.5 months ahead

    if ($date < $currentDate || $date > $maxAllowedDate) {
        $errors[] = "Date must be between today and 1.5 months ahead.";
    }

    return $errors;
}
public function getCenterID($id)
 {
    $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, center.cname, center.uid,center.Cid,
    center.cnumber,center.cloc
    FROM center 
    JOIN user_acc ON user_acc.uid = center.uid where user_acc.uid=".$id;
    $result = mysqli_query($this->conn,$sql);
    if($row=mysqli_fetch_array($result)){
    
                    $CID=$row["Cid"];

    }
    return $CID;

}
public function getTeacherID($id) 
 {
    $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, teacher.tid, teacher.uid
    FROM teacher 
    JOIN user_acc ON user_acc.uid = teacher.uid where user_acc.uid=".$id;
    $result = mysqli_query($this->conn,$sql);
    if($row=mysqli_fetch_array($result)){
    
                    $DID=$row["tid"];

    }
    return $DID;

}


public function getCenterName()
{
    return $_SESSION["cname"];
}

public function getCenterTeachers($cid)
{
    $sql = "select firstname , lastname , tid  from teacher where Cid = '$cid' ";
    $res = mysqli_query($this->conn,$sql);
    $teachers = [];
    while($row=mysqli_fetch_array($res)){
    $teachers [] = [
        'tid' => $row['tid'],
        'firstname'=>$row['firstname'],
        'lastname'=>$row['lastname'],
    ];} 
    return $teachers;
}
public function addSession($date, $time, $status, $price, $teacherId, $centerId, $studentId)
{
    
    $sql = "INSERT INTO sessions (date, time, status, sid, tid, cid, price) VALUES ('$date', '$time', '$status', NULL , '$teacherId', '$centerId', '$price')";
    $res = mysqli_query($this->conn, $sql);

    if ($res) {
        $this->session->date=$date;
        $this->session->time=$time;
        $this->session->status=$status;
        $this->session->price=$price;
        $this->session->$teacherId=$teacherId;
        $this->session->$centerId=$centerId;
        $this->session->$studentId=$studentId;
        // echo '<script>window.location.href = "./viewSessions.php";</script>';

        
        return true;
    } else {
        return false;
    }
}
public function displayErrors($err){
    foreach ($err as $errors)
    {
        echo '<li>' .   $errors  . '</li>' ; 
    }
}



public function viewSessions($ID){
    // Query the sessions table and join it with the center table to get the center's name
    $sql = "SELECT sessions.*, center.cname FROM sessions
            JOIN center ON center.Cid = sessions.Cid
            WHERE sessions.Cid = " . intval($ID);
    $result = mysqli_query($this->conn, $sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['sessid'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td><a href='./editSession.php?sessid=" . $row['sessid'] . "'>Edit</a> | <a href='./deleteSession.php?sessid=" . $row['sessid'] . "'>Delete</a>|<a href='./viewenrollment.php?sessid=" . $row['sessid'] . "'>View Enrolled</a></td>";
            echo "<td>" . $row['cname'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<h1>No sessions found</h1>";
    }

  


$sql2="select cname from center where Cid = {$ID}";
$res2=mysqli_query($this->conn,$sql2);
if ($res2) {
    $row = mysqli_fetch_assoc($res2);
    $_SESSION['sessionView'] = $row['cname'];
}
}


public function DeleteEnrollment($sessionId)
{
    $sql="DELETE FROM enrollment WHERE sessid=$sessionId";
    $res=mysqli_query($this->conn,$sql);
    if ($res) {
        
        return true;
    } else {
        return false;
    }
}

public function validateSessionUpdate($date, $time, $price)
{
    $errors = array();

    if (empty($date)) {
        $errors[] = "Date is required";
    }

    if (empty($time)) {
        $errors[] = "Time is required";
    }


    if (empty($price)) {
        $errors[] = "Price is required";
    }

    $currentDate = date("Y-m-d");
    $maxAllowedDate = date("Y-m-d", strtotime("+45 days")); // 1.5 months ahead

    if ($date < $currentDate || $date > $maxAllowedDate) {
        $errors[] = "Date must be between today and 1.5 months ahead.";
    }

    return $errors;
}
public function updateSession($sessionId,$s_date, $s_time, $s_price){
    $sql = "UPDATE sessions SET date = '$s_date', time = '$s_time',  price ='$s_price' WHERE sessid = $sessionId";
    $res = mysqli_query($this->conn, $sql);

    if ($res) {

        $this->session->date=$s_date;
        $this->session->time=$s_time;
       
        $this->session->price=$s_price;
        
        return true;
    } else {
        return false;
    }
}
public function deleteSession($sessionId){
    $sql = "DELETE FROM sessions WHERE sessid = $sessionId";
    $res = mysqli_query($this->conn, $sql);
    if ($res) {
        
        return true;
    } else {
        return false;
    }
}
public function bookingOptions(){
    $sql = "SELECT subject FROM teacher";
    $res = mysqli_query($this->conn, $sql);
    $sub = [];

    while ($row = $res->fetch_assoc()) {
        $sub[] = $row['subject'];
    }

    // Remove duplicates
    $sub = array_unique($sub);

    $sub = array_map(function ($subject) {
        return ['subject' => $subject];
    }, $sub);

    return $sub;
}


public function getSubjectSessions($subject){

    $sql = "SELECT
        a.sessid, a.date, a.time, a.price, a.tid, a.Cid,
        d.firstname, d.lastname, d.subject,
        c.cname
    FROM
        sessions a
    JOIN
        teacher d ON a.tid = d.tid
    JOIN
        center c ON a.Cid = c.Cid
    WHERE
        d.subject = '$subject' and a.status = 'available' ";


    $result = mysqli_query($this->conn,$sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['date'] . "</td>";   
            echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>"; 
            echo "<td>" . $row['subject'] . "</td>"; 
            echo "<td>" . $row['time'] . "</td>";      
            echo "<td>" . $row['price'] . "</td>";     
            echo "<td>" . $row['cname'] . "</td>";
            echo "<td><a href='./enrollNow.php?sessid=" . $row['sessid'] . "'>Book Now </a></td>";
            echo "</tr>";
        }
    } else 
    {
        echo  "<div class='no-sessions-found'><h1>NO sessions FOUND!</h1></div>";
        
    }
}
    public function getStudentID($id)
    {
       
       $sql = "SELECT user_acc.uid, user_acc.email,user_acc.usertype_id, student.sid, student.uid
       FROM student 
       JOIN user_acc ON user_acc.uid = student.uid where user_acc.uid=".$id;
       $result = mysqli_query($this->conn,$sql);
       if($row=mysqli_fetch_array($result)){
           
       
                       $PID=$row["sid"];
   
       }
       return $PID;
   
   } 

   public function bookForStudent($sid, $sessid)
   {
        // Check if the student is already booked for the session
        $check_sql = "SELECT * FROM enrollment WHERE sid = '$sid' AND sessid = '$sessid'";
        $check_result = mysqli_query($this->conn, $check_sql);
        if (mysqli_num_rows($check_result) > 0) {
            echo "Error: you already have booked this session before";
            return;
        }
      $enrollment_sql = "INSERT INTO enrollment (sid, sessid) VALUES ('$sid', '$sessid')";
       $enrollment_result = mysqli_query($this->conn, $enrollment_sql);
       if (!$enrollment_result) {
           echo "Error: " . mysqli_error($this->conn);
           return;
   
       }
   
   }



}
?>