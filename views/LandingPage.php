


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/animations.css">  
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="stylesheet" href="../public/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Poppins:wght@300;600&family=Righteous&family=Rubik:ital@1&display=swap" rel="stylesheet">
    <title>Tabeeby</title>
    <style>
        table {
            animation: transitionIn-Y-bottom 0.5s;
        }
        body {
    background-image: url('../public/images/back2.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
}

    </style>
</head>
<body>
<?php session_start(); ?>
    <div class="full-height">
        <center>
        <table border="0">
            <tr>
                <td width="80%">
                    <span class="edoc-logo">Manaseti. </span>
                    <span class="edoc-logo-sub">| THE ECHANNELING PROJECT</span>
                </td>
                <td width="10%">
                   <a href="login.php" class="non-style-link"><p class="nav-item">LOGIN</p></a>
                </td>
                <td width="10%">
                    <a href="signup.php" class="non-style-link"><p class="nav-item" style="padding-right: 10px;">REGISTER</p></a>
                </td>
            </tr>
            
            <tr>
    <td colspan="3">
        <p class="heading-text">Streamline Your Learning Experience.</p>
    </td>
</tr>
<tr>
    <td colspan="3">
        <p class="sub-text2">Struggling with your studies? Don't worry!<br>Find the perfect teacher for you online. Book your sessions easily with Manaseti.<br>We offer a free service to connect you with top-tier educators. Schedule your lesson now.</p>
    </td>
</tr>

            <tr>
                <td colspan="3">
                    <center>
                    <a href="login.php">
                        <input type="button" value="Book Session" class="login-btn btn-primary btn" style="padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 10px;">
                    </a>
                </center>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                </td>
            </tr>
        </table>
        
    </center>
    </div>
</body>

</html>
