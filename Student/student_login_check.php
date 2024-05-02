<?php

error_reporting(0);
// ini_set('display_errors', 1);
session_start();

$host="localhost";

$user="root";

$password="";

$db="iiit_b";

$data=mysqli_connect($host,$user,$password,$db);

if ($data == false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM approve_user WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($data, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email'] = $email;
        header("Location: studenthome.php");
        exit;
    }     else{
        $message= "username or password do not match";
        $_SESSION['loginMessage']=$message;
        header("location:student_login.php");
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($data);


?>