<?php
include_once '..\includes\navbar.php';
require_once '../app/controller/SessionController.php';
$db = Database::getInstance();
$conn = $db->getConnection();    
$sessioncntrl = new SessionController();

$errors = array();
$center_id = $sessioncntrl->getCenterID($_SESSION["ID"]);
echo( "center id is ---------- ".$center_id);
$teachers = $sessioncntrl->getCenterTeachers($center_id);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $s_date = htmlspecialchars($_POST['date']);
    $s_time = htmlspecialchars($_POST['time']);
    $s_status = htmlspecialchars($_POST['status']);
    $s_price = htmlspecialchars($_POST['price']);
    $s_tid = htmlspecialchars($_POST['teacherid']);
    $s_cid = $sessioncntrl->getCenterID($_SESSION["ID"]);
    
    $errors = $sessioncntrl->validateSession($s_date, $s_time, $s_status, $s_price, $s_tid, $s_cid);

    if (count($errors) === 0) {
        if ($sessioncntrl->addSession($s_date, $s_time, $s_status, $s_price, $s_tid, $s_cid, NULL)) {
            echo "Form submitted successfully!";
            // header("location: ./viewSessions.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/addevent.css">
    <title>Session Form</title>
    <style>
        .error {
            color: red;
            margin-left: 10px;
        }
    </style>
</head>
<body>

<form action="" method="post" name="addsesssionform" autocomplete="off" onsubmit="return validateForm();">
    <label for="d">Date</label>
    <input type="date" placeholder="Choose the date" id="d" name="date">
    <span id="dateError" class="error"></span>
    <br>
    <label for="t">Time</label>
    <input type="text" placeholder="Enter the time" id="t" name="time">
    <span id="timeError" class="error"></span>
    <br>
    <label for="di">Teacher</label>
    <select id="ti" name="teacherid">
        <?php foreach ($teachers as $doctor) { ?>
            <option value="<?php echo $doctor['tid']; ?>">
                <?php echo $doctor['firstname'] . ' ' . $doctor['lastname']; ?>
            </option>
        <?php } ?>
    </select>
    <span id="teacherError" class="error"></span>
    <br>
    <label for="ci">Center's ID</label>
    <input type="text" placeholder="Enter center's id" id="ci" name="centerid" value="<?php echo $center_id . " ( " . $sessioncntrl->getCenterName() . " )"; ?>">
    <span id="centerError" class="error"></span>
    <br>
    <label for="s">Status</label>
    <select id="s" name="status">
        <option value="available">Available</option>
        <option value="reserved">Reserved</option>
    </select>
    <span id="statusError" class="error"></span>
    <br>
    <label for="p">Price</label>
    <input type="text" placeholder="Enter the price" id="p" name="price">
    <span id="priceError" class="error"></span>
    <br>
    <input type="submit" id="submit" name="submit" value="Submit">
</form>

<script>
function validateForm() {
    var isValid = true;

    var dateInput = document.getElementById("d");
    var dateError = document.getElementById("dateError");
    var timeInput = document.getElementById("t");
    var timeError = document.getElementById("timeError");
    var priceInput = document.getElementById("p");
    var priceError = document.getElementById("priceError");

    var currentDate = new Date();
    var maxAllowedDate = new Date();
    maxAllowedDate.setDate(maxAllowedDate.getDate() + 45); // 1.5 months ahead

    if (dateInput.value === "") {
        dateError.textContent = "Date is required";
        isValid = false;
    } else {
        var selectedDate = new Date(dateInput.value);
        if (selectedDate < currentDate || selectedDate > maxAllowedDate) {
            dateError.textContent = "Date must be between today and 1.5 months ahead.";
            isValid = false;
        } else {
            dateError.textContent = "";
        }
    }

    if (timeInput.value === "") {
        timeError.textContent = "Time is required";
        isValid = false;
    } else {
        timeError.textContent = "";
    }

    if (priceInput.value === "" || priceInput.value <= 0) {
        priceError.textContent = "Price must be greater than zero.";
        isValid = false;
    } else {
        priceError.textContent = "";
    }

    return isValid;
}
</script>

</body>
</html>
