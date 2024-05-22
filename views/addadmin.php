<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link rel="stylesheet" href="..\public\css\addadmin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php include_once '..\includes\navbar.php'; ?>

<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5" style="height: 21cm;">
              <h2 class="text-uppercase text-center mb-5">Add Admin</h2>
              <form name="f1" onsubmit="return validateForm()" method="post">
                <div class="form-outline mb-4">
                  <input type="text" id="fname" name="firstname" class="form-control form-control-lg" />
                  <label class="form-label" for="fname">Name</label>
                  <div id="fname-error" style="display:none; color:red;"></div>
                </div>
                <div class="form-outline mb-4">
                  <input type="text" id="email" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="email">Email</label>
                  <div id="email-error" style="display:none; color:red;"></div>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                  <label class="form-label" for="pass">Password</label>
                  <div id="pass-error" style="display:none; color:red;"></div>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" id="confpass" name="confpass" class="form-control form-control-lg" />
                  <label class="form-label" for="confpass">Confirm password</label>
                  <div id="confpass-error" style="display:none; color:red;"></div>
                </div>
                <div id="match-error" style="display:none; color:red;"></div>
                <button type="submit" class="btn btn-success btn-block btn-lg" style="color: black;">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
function validateForm() {
  var valid = true;
  
  var firstName = document.forms["f1"]["firstname"].value;
  var email = document.forms["f1"]["email"].value;
  var password = document.forms["f1"]["pass"].value;
  var confirmPassword = document.forms["f1"]["confpass"].value;
  
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  var fnameError = document.getElementById("fname-error");
  var emailError = document.getElementById("email-error");
  var passError = document.getElementById("pass-error");
  var confpassError = document.getElementById("confpass-error");
  var matchError = document.getElementById("match-error");
  
  if (firstName == "") {
    fnameError.style.display = "block";
    fnameError.textContent = "First name is required";
    valid = false;
  } else {
    fnameError.style.display = "none";
  }
  
  if (email == "" || !email.match(emailPattern)) {
    emailError.style.display = "block";
    emailError.textContent = "Valid email is required";
    valid = false;
  } else {
    emailError.style.display = "none";
  }
  
  if (password == "" ) {
    passError.style.display = "block";
    passError.textContent = "Password must be at least 8 characters long";
    valid = false;
  }
    else if (password.length < 8) {
      passError.textContent = "Password must be at least 8 characters long";
                isValid = false;
    
  } else {
    passError.style.display = "none";
  }
  
  if (confirmPassword == "") {
    confpassError.style.display = "block";
    confpassError.textContent = "Please confirm your password";
    valid = false;
  } else {
    confpassError.style.display = "none";
  }
  
  if (password !== confirmPassword) {
    matchError.style.display = "block";
    matchError.textContent = "Passwords do not match";
    valid = false;
  } else {
    matchError.style.display = "none";
  }
  
  return valid;
}
</script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $db = Database::getInstance();
  $conn = $db->getConnection();
  $firstname = htmlspecialchars($_POST["firstname"]);
  $email = htmlspecialchars($_POST["email"]);
  $pass = htmlspecialchars($_POST["pass"]);
  
  $sql_user_acc = "INSERT INTO user_acc (email, pass, usertype_id, image) VALUES ('$email', '$pass', 1, '')";
  $result_user_acc = mysqli_query($conn, $sql_user_acc);
  
  if ($result_user_acc) {
    $last_uid = mysqli_insert_id($conn);
    $sql_admin = "INSERT INTO admin (name, uid) VALUES ('$firstname', $last_uid)";
    $result_admin = mysqli_query($conn, $sql_admin);
  }
}
?>
</body>
</html>
