<?php
error_reporting(0);
session_start();
session_destroy();
if ($_SESSION['message']) {
    $message = $_SESSION['message'];

    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Learning Project Management System</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
body{
    backdrop-filter: blur(4px);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    /* background-size: 100% 100%; */
}

        .head{
            background-color: white;
            /* background-image: url(https://img.freepik.com/free-photo/cement-texture_1194-6525.jpg?size=626&ext=jpg&ga=GA1.1.8233333.1713378301&semt=ais); */
            background-size: cover;
            display: flex;
            padding-left: 20px;
        }
        
nav {
  background-color: rgb(94, 162, 225);
  overflow: hidden;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
}

nav li {
  float: left;
}

nav li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 20px;
}

nav li a:hover {
  background-color: #ddd;
  color: #333;
}
.slideshow{
    height: 59vh;
}
.current_updates{
    /* border: 2px solid white; */
    display: flex;
    align-items:center ;
    /* justify-content: center; */
    background-color: rgb(94, 162, 225);
    height: 5vh;
}
.updatesheading{
    flex-grow: 1;
    display: flex;
    align-items:center;
    justify-content: center;
    background-color:#333;
    height:100%;
    font-size: 15px;
    color:#ddd;
}
.updates{
    display: flex;
    justify-content: center;
}
.updates marquee a{
    font-size: 20px;
    color: white;
}

    </style>
</head>

<body background="background.jpg">
    <header>
        <div class="head">
            <img src="https://www.iiitbhopal.ac.in/images/IIIT-Header.png" />
        </div>
    </header>
        
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Admin/login.php">Admin Login</a></li>
            <li><a href="Student/student_login.php">Student Login</a></li>
            <li><a href="Teacher/teacherlogin.php">Teacher Login</a></li>
            <li><a href="Student/registration.php">Student Registraton</a></li>
            <li><a href="Teacher/teacher_registration.php">Teacher Registraton</a></li>
            <li><a href="">Contact Us</a></li>
        </ul>
    </nav>
    <section class="slideshow">
        <div style="font-size:60px;color:#ddd;"></div>
    </section>
    <section class="current_updates">
        <div class="updatesheading">Current Updates</div>
        <div style="flex-grow: 6;" class="updates">
            <marquee direction="left"><a href="#">This is updates Div</a></marquee>
        </div>
    </section>
    <footer>
        <div class="foot">
            <div class="footcontainer">
            </div>
        </div>
    </footer>
</body>

</html>