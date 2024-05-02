<?php
 include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOD Login Form</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Admin/style.css">

</head>
<body background="background.jpg" class="body_deg">
<nav>
        <label class="logo">IIIT BHOPAL</label>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../Admin/login.php">Admin Login</a></li>
            <li><a href="../Student/student_login.php">Student Login</a></li>
            <li><a href="../Teacher/teacherlogin.php">Teacher Login</a></li>
            <li><a href="../Student/registration.php">Student Registraton</a></li>
            <li><a href="../Teacher/teacher_registration.php">Teacher Registraton</a></li>
            <li><a href="">Contact Us</a></li>
        </ul>
</nav>

    <center>
        <div class="form_deg">
            <centre class="title_deg">
                HOD Login Form
                <h4>
                    <?php
                    error_reporting(0);
                    session_start();
                    session_destroy();
                    echo $_SESSION['loginMessage'];
                    ?>
                </h4>
            </centre>
            <form action="../Admin/login_check.php" method="POST" class="login_form">
                <div>
                    <label class="label_deg">Username</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label class="label_deg">Password</label>
                    <input type="Password" name="password">
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" name="submit" value="Login">
                </div>
            </form>
        </div>
    </center>
</body>
</html>