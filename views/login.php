<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        <style>
       body {
        background-image: url('../public/images/background.jpg');

    }
      #login-error{
        text-align:left;
        left:10;  
      }
    </style>
    <script>
        function validateForm() {
            document.getElementById("user-err").innerHTML = "";
            document.getElementById("pass-err").innerHTML = "";
            document.getElementById("login-error").innerHTML = "";

            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var isValid = true;

            if (email === "") {
                document.getElementById("user-err").innerHTML = "Email is required.";
                isValid = false;
            } else {
                var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                if (!emailPattern.test(email)) {
                    document.getElementById("user-err").innerHTML = "Invalid email address.";
                    isValid = false;
                }
            }

            if (password === "") {
                document.getElementById("pass-err").innerHTML = "Password is required.";
                isValid = false;
            }
            if (password === "") {
                document.getElementById("pass-err").innerHTML = "Password is required.";
                isValid = false;
            } else if (password.length < 8) {
                document.getElementById("pass-err").innerHTML = "Password must be at least 8 characters long.";
                isValid = false;
            }


            return isValid;
        }
    </script>
</head>
<?php
require_once '../app/Model/User.php';
require_once '../app/Model/UserType.php';
require_once '../app/Model/Pages.php';
require_once '../app/controller/UserController.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $db = Database::getInstance();
    $conn = $db->getConnection();
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $UserObject = UserController::login($email, $pass,$conn);

    if ($UserObject) {
        session_start();
        $_SESSION["type"] = $UserObject->usertype->name;
        $_SESSION["email"] = $UserObject->email;
        $_SESSION["ID"] = $UserObject->id;
        $_SESSION["image"] = $UserObject->image;

        if ($UserObject instanceof Student) {
            $_SESSION["sid"] = $UserObject->id;
            $_SESSION["firstname"] = $UserObject->firstname;
            $_SESSION["lastname"] = $UserObject->lastname;
            $_SESSION["AGE"] = $UserObject->age;
            $_SESSION["address"] = $UserObject->address;
            $_SESSION["gender"] = $UserObject->gender;
            $_SESSION["number"] = $UserObject->number;

            header("Location: studentindex.php");
            exit();
        } elseif ($UserObject instanceof Teacher) {
            $_SESSION["tid"] = $UserObject->id;
            $_SESSION["firstname"] = $UserObject->firstname;
            $_SESSION["lastname"] = $UserObject->lastname;
            $_SESSION["subject"] = $UserObject->subject;
            $_SESSION["number"] = $UserObject->number;
            $_SESSION["educ"] = $UserObject->educ;
            $_SESSION["Cid"] = $UserObject->Cid;

            header("Location: adminmain.php");
            exit();
        } elseif ($UserObject instanceof Admin) {
            $_SESSION["aid"] = $UserObject->id;
            $_SESSION["name"] = $UserObject->name;

            header("Location: adminmain.php");
            exit();
        } elseif ($UserObject instanceof Center) {
            $_SESSION["Cid"] = $UserObject->id; 
            $_SESSION["cname"] = $UserObject->cname;
            $_SESSION["cloc"] = $UserObject->cloc;
            $_SESSION["cnumber"] = $UserObject->cnumber;
            

            header("Location: adminmain.php");
            exit();
        }
    } else {
        $loginError = "Invalid login credentials.";
    }
}
?>

<body>
    <div id="cont">
        <div id="frm">
            <h1 id="wel">WELCOME</h1>
            <form action="" method="post" id="interface-form" name="form" onsubmit="return validateForm()">
                <div id="fields">
                    <i class="fa fa-solid fa-user iicon"></i>
                    <input class="login-field" type="text" name="email" placeholder="Email" id="email">
                    <div id="user-err"></div>
                    <br>
                    <i class="fa-solid fa-lock icon"></i>
                    <input class="login-field" type="password" name="password" placeholder="Password" id="password">
                    <div id="pass-err"></div>
                    <br>
                    <div id="login-error"><?php if (isset($loginError)) echo $loginError; ?></div>
                    <input type="submit" name="submit" id="sb" class="login-field">
                </div>
                <div id="sgu">
                    <p>Not a member yet?</p> <a class="link" href="signup.php">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</body>



</html>