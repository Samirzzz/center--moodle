<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration or Sign Up form</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
    <style>
               .error-message {
            color: red;
        }
    body {
        background-image: url('../public/images/background.jpg');

    }

    .form-control {
        width: 350px;
    }

    .card {
        max-width: 400px;
        margin: 0 auto;
        margin-top: 5vh;
        background-color: rgba(255, 255, 255, 0.9);
    }

    .form-group {}
    </style>
        <script>
        function validateForm() {
            var isValid = true;

            // Clear previous error messages
            document.querySelectorAll('.error-message').forEach(function (el) {
                el.textContent = '';
            });

            // Validate email
            var email = document.getElementById('email').value;
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                document.getElementById('email-error').textContent = 'Please enter a valid email address.';
                isValid = false;
            }

            // Validate password
            var password = document.getElementById('password').value;
            var cpassword = document.getElementById('cpassword').value;
            if (password !== cpassword) {
                document.getElementById('password-error').textContent = 'Passwords do not match.';
                document.getElementById('cpassword-error').textContent = 'Passwords do not match.';
                isValid = false;
            }

            // Validate required fields
            var requiredFields = ['Fname', 'Lname', 'age', 'address', 'phone'];
            requiredFields.forEach(function (fieldId) {
                var field = document.getElementById(fieldId);
                if (field.value.trim() === '') {
                    document.getElementById(fieldId + '-error').textContent = 'This field is required.';
                    isValid = false;
                }
            });

            // Validate age (must be a number and greater than 0)
            var age = document.getElementById('age').value;
            if (isNaN(age) || age <= 0) {
                document.getElementById('age-error').textContent = 'Please enter a valid age.';
                isValid = false;
            }

            // Validate phone number (example: 10 digits)
            var phone = document.getElementById('phone').value;
            var phonePattern = /^\d{10}$/;
            if (!phonePattern.test(phone)) {
                document.getElementById('phone-error').textContent = 'Please enter a valid phone number.';
                isValid = false;
            }

            // Additional validation for teacher fields
            var userType = document.getElementById('userType').value;
            if (userType === 'teacher') {
                var teacherFields = ['subject', 'education'];
                teacherFields.forEach(function (fieldId) {
                    var field = document.getElementById(fieldId);
                    if (field.value.trim() === '') {
                        document.getElementById(fieldId + '-error').textContent = 'This field is required.';
                        isValid = false;
                    }
                });
            }

            // Additional validation for center fields
            if (userType === 'center') {
                var centerFields = ['cname', 'cloc', 'cnumber'];
                centerFields.forEach(function (fieldId) {
                    var field = document.getElementById(fieldId);
                    if (field.value.trim() === '') {
                        document.getElementById(fieldId + '-error').textContent = 'This field is required.';
                        isValid = false;
                    }
                });
            }

            return isValid;
        }
        </script>
</head>
<?php  

include_once '..\includes\db.php';
require_once '../app/Model/User.php';
require_once '../app/Model/Student.php';
require_once '../app/Model/Teacher.php';
require_once '../app/Model/Center.php';
require_once '../app/Model/UserType.php';
require_once '../app/Model/Pages.php';
require_once '../app/controller/UserController.php';
require_once '../app/controller/StudentController.php';
require_once '../app/controller/TeacherController.php';
require_once '../app/controller/CenterController.php';



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $db = Database::getInstance();
    $conn = $db->getConnection();
    $firstname = $_POST['Fname'];
    $lastname = $_POST['Lname'];
    $number = $_POST['number'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $userType = $_POST['userType'];
    $cname=$_POST['centername'];
    $cloc=$_POST['centerloc'];
    $cnumber=$_POST['centernumber'];


    if ($userType == 'student') 
    {
       $uid= UserController::signupUser($email, $password, 4,$conn);
    if ($uid !== false) {

       if (StudentController::signupStudent($firstname, $lastname, $number, $age, $gender, $address, $uid,$conn)) {
        // header("Location:../views/login.php");
    } 
}
            
    }
    if ($userType == 'teacher') 
    {
        $educ = $_POST['education'];
        $subject = $_POST['subject'];
        $uid= UserController::signupUser($email, $password, 2,$conn); 
    if ($uid !== false) {
        if (TeacherController::signupTeacher($firstname, $lastname, $number, $educ, $subject, $uid,$conn)) {
            header("Location:../views/login.php");
        } 
    }
    }
    if ($userType == 'center')
    {

        $uid= UserController::signupUser($email, $password, 3,$conn); 
        if ($uid !== false) {
            if (CenterController::signupCenter($cname,$cloc,$cnumber,$uid,$conn ) ) {
                header("Location:../views/login.php");
            } 
        }
    } 



   
}

?>

<body>
<div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Registration</h2>
                <form action="" enctype="multipart/form-data" method="post" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="userType">User Type:</label>
                        <select class="form-control" id="userType" name="userType">
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                            <option value="center">Center</option>
                        </select>
                    </div>
                    <div id="studentfields">
                        <div class="form-group">
                            <label for="Fname">First Name:</label>
                            <input type="text" class="form-control" id="Fname" placeholder="First Name" name="Fname">
                            <div id="Fname-error" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="Lname">Last Name:</label>
                            <input type="text" class="form-control" id="Lname" placeholder="Last Name" name="Lname">
                            <div id="Lname-error" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" class="form-control" id="age" name="age">
                            <div id="age-error" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" placeholder="Address" name="address">
                            <div id="address-error" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="number">
                            <div id="phone-error" class="error-message"></div>
                        </div>
                    </div>
                    <div id="teacher-fields" style="display: none;">
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
                            <div id="subject-error" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="education">Education:</label>
                            <input type="text" class="form-control" id="education" placeholder="Education" name="education">
                            <div id="education-error" class="error-message"></div>
                        </div>
                    </div>
                    <div id="center-fields" style="display: none;">
                        <div class="form-group">
                            <label for="cname">Center Name:</label>
                            <input type="text" class="form-control" id="cname" placeholder="Center Name" name="centername">
                            <div id="cname-error" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="cloc">Center Address:</label>
                            <input type="text" class="form-control" id="cloc" placeholder="Center Address" name="centerloc">
                            <div id="cloc-error" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="cnumber">Center Number:</label>
                            <input type="text" class="form-control" id="cnumber" placeholder="Center Number" name="centernumber">
                            <div id="cnumber-error" class="error-message"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Email Address" name="email">
                        <div id="email-error" class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        <div id="password-error" class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password:</label>
                        <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="cpassword">
                        <div id="cpassword-error" class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="acceptTerms" required>
                            <label class="form-check-label" for="acceptTerms">I accept all terms & conditions</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" style="background-color: #b11226;">Register Now</button>
                    <p class="mt-3">Already have an account? <a href="login.php" style="color: #b11226;">Login now</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script src="../public/js/signup.js"></script> -->




</body>





</html>