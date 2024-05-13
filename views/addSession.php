<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/addevent.css">
    <title>session Form</title>
    <style>
   
    </style>
</head>
<body>

   <form action="" method="post" name="addsesssionform" autocomplete="off" onsubmit="return validateForm();">
    <label for="d">Date</label>
    <input type="date" placeholder="Choose the date" id="d" name="date">
    <br>
    <label for="t">Time</label>
    <input type="text" placeholder="Enter the time" id="t" name="time">
    <br>

    <br>

    <br>
    <label for="di">teacher</label>
     <select id="ti" name="teacherid">
    
    </select>
    <br>
    <br>
    <br>
    <label for="ci">center's id</label>

    <br>
    <label for="s">Status</label>
<select id="s" name="status">
    <option value="available">Available</option>
    <option value="reserved">reserved</option>
</select>
    <br>
    <br>
    <label for="p">price</label>
    <input type="text" placeholder="Enter the price" id="p" name="price">
    <br>
  
    <input type="submit" id="submit" name="submit" value="submit">
    <span class = "error">

</span>
   </form>




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
    }
</script>
</body>
</html>