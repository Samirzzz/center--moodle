<?php
include_once '..\includes\navbar.php';
require_once '../app/controller/SessionController.php';
$sessioncntrl = new SessionController();
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
    $s_status = htmlspecialchars($_POST['status']);
    
    $errors = $sessioncntrl->validateSessionUpdate($s_date, $s_time, $s_price, $s_status);

    if (count($errors) === 0) {
        if ($sessioncntrl->updateSession($sessionId, $s_date, $s_time, $s_price, $s_status)) {
            echo "Form submitted successfully!";
            // header("location:../views/viewSessions.php");
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/addevent.css">
    <title>Update Session</title>
    <style>
        .error {
            color: red;
            margin-left: 10px;
        }
    </style>
</head>
<body>
   <form action="" method="post" autocomplete="off" onsubmit="return validateForm();">
    <label for="d">Date</label>
    <input type="date" placeholder="Choose the date" id="d" name="date" value="<?php echo Date($session['date']); ?>">
    <span id="dateError" class="error"></span>
    <br>
    <label for="t">Time</label>
    <input type="text" placeholder="Enter the time" id="t" name="time" value="<?php echo $session['time']; ?>">
    <span id="timeError" class="error"></span>
    <br>
    <label for="s">Status</label>
    <select id="s" name="status">
        <option value="available" <?php if($session['status'] == 'available') echo 'selected'; ?>>Available</option>
        <option value="reserved" <?php if($session['status'] == 'reserved') echo 'selected'; ?>>Reserved</option>
    </select>
    <span id="statusError" class="error"></span>
    <br>
    <label for="p">Price</label>
    <input type="text" placeholder="Enter price" id="p" name="price" value="<?php echo $session['price']; ?>">
    <span id="priceError" class="error"></span>
    <br>
    <input type="hidden" name="session_id" value="<?php echo $sessionId; ?>">
    <input type="submit" id="submit" name="submit" value="Update">
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
