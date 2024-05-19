<?php
include_once '..\includes\navbar.php';
require_once '../app\controller\SessionController.php';
$sessioncntrl =new SessionController();
$db = Database::getInstance();
$conn = $db->getConnection();	
$center_id = $sessioncntrl->getCenterID($_SESSION["ID"]);
$center_name = $sessioncntrl->getCenterName();
$errors = array();

if (isset($_GET['sessid'])) {
    $sessionId = $_GET['sessid'];
}

$sql = "SELECT * FROM sessions WHERE sessid = $sessionId";
$result = mysqli_query($conn, $sql);
$session = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $s_date = htmlspecialchars($_POST['date']);
    $s_time = htmlspecialchars($_POST['time']);
    $s_price = htmlspecialchars($_POST['price']);
    
    $errors = $sessioncntrl->validateSessionUpdate($s_date, $s_time, $s_price);


    if (count($errors) === 0) 
    {
  if ($sessioncntrl->updateSession($sessionId,$s_date, $s_time, $s_price)) {
            echo "Form submitted successfully!";
            // header("location:../views/viewSessions.php");
        } else {
            echo "Error: " . mysqli_error($db);
        }
    // } else {
    //     // Display validation errors
    //     echo "Validation Errors:<br>";
    //     foreach ($errors as $error) {
    //         echo $error . "<br>";
    //     }
    // }
}
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/addevent.css">
    <title>Update session</title>
    <style>
   
    </style>
</head>
<body>
   <form action="" method="post" autocomplete="off" onsubmit="return validateForm();">
    <label for="d">Date</label>
    <input type="date" placeholder="Choose the date" id="d" name="date" value="<?php echo Date($session['date']); ?>">
    <br>
    <label for="t">Time</label>
    <input type="text" placeholder="Enter the time" id="t" name="time" value="<?php echo $session['time']; ?>">
    <br>
    <!-- <label for="s">Status</label>
    <input type="text" placeholder="Enter status" id="s" name="status" value=""> -->
    <br>
    <label for="p">price</label>
    <input type="text" placeholder="Enter price" id="p" name="price" value="<?php echo $session['price']; ?>">
    <br>
    <!-- <label for="did">doctor id</label>
    <input type="text" placeholder="Enter doctor id" id="did" name="doctorid" value="">
    <br>
    < <label for="pid">patient id</label>
    <input type="text" placeholder="Enter patient id" id="pid" name="patientid" value=""> -->
    <br>
    <!-- <label for="Cid">clinic id</label>
    <input type="text" placeholder="Enter clinic id " id="Cid" name="clinicid" value="">
    <br> --> 
    <input type="hidden" name="session_id" value="<?php echo $sessionId; ?>">
    <input type="submit" id="submit" name="submit"  >
    <span class = "error">
    <?php $sessioncntrl->displayErrors($errors) ?>
</span>
   </form>
   <style>
    form{
        width:500px;
        height:500px;
    }
   </style>
   
   <script>
    function validateForm() {
        var dateInput = document.getElementById("d");
        var currentDate = new Date();
        var maxAllowedDate = new Date();
        maxAllowedDate.setDate(maxAllowedDate.getDate() + 45); // 1.5 months ahead

        if (dateInput.value === "") {
            alert("Date is required");
            return false;
        }

        var selectedDate = new Date(dateInput.value);
        if (selectedDate < currentDate || selectedDate > maxAllowedDate) {
            alert("Date must be between today and 1.5 months ahead.");
            return false;
        } 
        // clickViewButton();
        //     return true;
    }
</script>

</body>
</html>