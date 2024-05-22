    function toggleteacherFields() {
        var userType = document.getElementById("userType").value;
        var teacherFields = document.getElementById("teacher-fields");
        var centerFields = document.getElementById("center-fields");
        var commonFields = document.getElementById("common-fields");
        var Fields = document.getElementById("fields");



        commonFields.style.display = "block";
        teacherFields.style.display = "none";
        centerFields.style.display = "none";


        if (userType === "teacher") {
            teacherFields.style.display = "block";
            centerFields.style.display = "none";

        } else if (userType === "center") {
            centerFields.style.display = "block";
            teacherFields.style.display = "none";
            studentfields.style.display="none";
            disableFields(true, Fields);
            disableFields(false, centerFields);
            disableFields(true, teacherFields);
        } else {
            teacherFields.style.display = "none";
            centerFields.style.display = "none";
        }
    }
    function disableFields(disable, container) {
        container.querySelectorAll("input, select").forEach(function (input) {
            input.disabled = disable;
            if (disable) {
                element.removeAttribute("required");
            } else {
                element.setAttribute("required", "required");
            }
        });
    }
    document.addEventListener("DOMContentLoaded", function() {
        toggleteacherFields();
        document.getElementById("userType").addEventListener("change", toggleteacherFields);
    });

  


    function validateForm() {
        let isValid = true;
    
        // Reset error messages
        document.querySelectorAll('.error-message').forEach(function (element) {
            element.textContent = '';
        });
    
        // Validate first name
        let firstName = document.getElementById('Fname').value.trim();
        if (firstName === '') {
            document.getElementById('fname-error').textContent = 'First name is required';
            isValid = false;
        }
    
        // Validate last name
        let lastName = document.getElementById('Lname').value.trim();
        if (lastName === '') {
            document.getElementById('lname-error').textContent = 'Last name is required';
            isValid = false;
        }
    
        // Validate age
        let age = document.getElementById('age').value.trim();
        if (age === '' || isNaN(age) || parseInt(age) <= 0) {
            document.getElementById('age-error').textContent = 'Please enter a valid age';
            isValid = false;
        }
    
        // Validate email
        let email = document.getElementById('email').value.trim();
        if (email === '' || !validateEmail(email)) {
            document.getElementById('email-error').textContent = 'Please enter a valid email address';
            isValid = false;
        }
    
        // Validate password
        let password = document.getElementById('password').value.trim();
        if (password === '') {
            document.getElementById('password-error').textContent = 'Password is required';
            isValid = false;
        }
    
        // Validate confirm password
        let confirmPassword = document.getElementById('cpassword').value.trim();
        if (confirmPassword === '' || confirmPassword !== password) {
            document.getElementById('cpassword-error').textContent = 'Passwords do not match';
            isValid = false;
        }
    
        // Validate phone number
        let phoneNumber = document.getElementById('phone').value.trim();
        if (phoneNumber === '' || isNaN(phoneNumber) || phoneNumber.length < 10) {
            document.getElementById('phone-error').textContent = 'Please enter a valid phone number';
            isValid = false;
        }
    
        // Validate terms acceptance
        let acceptTerms = document.getElementById('acceptTerms').checked;
        if (!acceptTerms) {
            alert('Please accept the terms & conditions');
            isValid = false;
        }
    
        return isValid;
    }
    
    function validateEmail(email) {
        // Simple email validation regex
        let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }
    