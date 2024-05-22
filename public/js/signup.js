function toggleteacherFields() {
    var userType = document.getElementById("userType").value;
    var teacherFields = document.getElementById("teacher-fields");
    var centerFields = document.getElementById("center-fields");
    var commonFields = document.getElementById("common-fields");
    var STFields = document.getElementById("teacher-student-fields");


    STFields.style.display="block";
    commonFields.style.display = "block";
    teacherFields.style.display = "none";
    centerFields.style.display = "none";


    if (userType === "teacher") {
        STFields.style.display="block";
        teacherFields.style.display = "block";
        commonFields.style.display = "block";
        centerFields.style.display = "none";
        disableFields(true, centerFields);
        disableFields(false, STFields);
        disableFields(false, teacherFields);
        disableFields(false, commonFields);
        

    } else if (userType === "center") 
      {
        commonFields.style.display="block";
        centerFields.style.display = "block";
        teacherFields.style.display = "none";
        STFields.style.display="none";

        disableFields(false, centerFields);
        disableFields(true, STFields);
        disableFields(true, teacherFields);
        disableFields(false, commonFields);

        
    } else {
        teacherFields.style.display = "none";
        centerFields.style.display = "none";
        STFields.style.display="block";
        commonFields.style.display = "block";
        disableFields(true, centerFields);
        disableFields(false, STFields);
        disableFields(true, teacherFields);
        disableFields(false, commonFields);

    }
}
function disableFields(disable, container) {
    container.querySelectorAll("input, select").forEach(function (input) {
        input.disabled = disable;
        if (disable) {
            input.removeAttribute("required");
        } else {
            input.setAttribute("required", "required");
        }
    });
}
document.addEventListener("DOMContentLoaded", function() {
    toggleteacherFields();
    document.getElementById("userType").addEventListener("change", toggleteacherFields);
});




function validateForm() {
// Reset error messages
var errorElements = document.querySelectorAll(".error-message");
for (var i = 0; i < errorElements.length; i++) {
  errorElements[i].innerHTML = "";
}


var fname = document.getElementById("Fname").value;
var lname = document.getElementById("Lname").value;
var email = document.getElementById("email").value;
var age = document.getElementById("age").value;
var address = document.getElementById("address").value;
var phone = document.getElementById("phone").value;
var password = document.getElementById("password").value;
var cpassword = document.getElementById("cpassword").value;
var otpp = document.getElementById("OTP").value;


var isValid = true;

if (fname === "") {
  document.getElementById("fname-error").innerHTML = "First Name is required.";
  isValid = false;
}
if (lname === "") {
  document.getElementById("lname-error").innerHTML = "Last Name is required.";
  isValid = false;
}
if (email === "") {
  document.getElementById("email-error").innerHTML = "Email is required.";
  isValid = false;
}
if (age === "") {
  document.getElementById("age-error").innerHTML = "Age is required.";
  isValid = false;
}
if (address === "") {
  document.getElementById("address-error").innerHTML = "Address is required.";
  isValid = false;
}
if (phone === "") {
  document.getElementById("phone-error").innerHTML = "Phone Number is required.";
  isValid = false;
}
if (password === "") {
  document.getElementById("password-error").innerHTML = "Password is required.";
  isValid = false;
}
if (cpassword === "") {
  document.getElementById("cpassword-error").innerHTML = "Confirm Password is required.";
  isValid = false;
}

var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
if (!emailPattern.test(email)) {
  document.getElementById("email-error").innerHTML = "Invalid email address.";
  isValid = false;
}

if (password !== cpassword) {
  document.getElementById("cpassword-error").innerHTML = "Passwords do not match.";
  isValid = false;
}
if (phone.length <11||phone.length>11) {
document.getElementById("phone-error").innerHTML = "Please enter a valid number.";
isValid = false;
}
if(age<16)
{
document.getElementById("age-error").innerHTML = "You have to be older than 16 years old.";
  isValid = false;
}

if (password.length <6) {
  document.getElementById("password-error").innerHTML = "Password must be atleast 6 characters.";
  isValid = false;
}

return isValid; 
}