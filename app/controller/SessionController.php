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
        header("location: ./viewSessions.php");

        
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










}
?>