<?php

session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='student'){
        header("location:login.php");
    }

    $host="localhost";

    $user="root";

    $password="";

    $db="iiit_b";

    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_student'])){
        $username=$_POST['name'];
        $user_email=$_POST['email'];
        $user_phone=$_POST['phone'];
        $user_password=$_POST['password'];
        $usertype="student";

        $check="SELECT * FROM user WHERE username='$username' ";

        $check_user=mysqli_query($data,$check);

        $row_count=mysqli_num_rows($check_user);

        if($row_count==1){
            echo "<script type='text/javascript'>
            
            alert('Username Already Exist. Try Another One');

            </script>";
        }

        else{

        $sql="INSERT INTO user(username,email,phone,usertype,password) VALUES ('$username','$user_email','$user_phone','$usertype','$user_password')";

        $result=mysqli_query($data,$sql);

        if($result){
            echo "<script type='text/javascript'>
            
            alert('Data Upload Successful');

            </script>";
        }
        else{
            echo "Uplaod Failed";
        }
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        .label_deg{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .add_deg{
            background-color: rgb(121, 181, 211);
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../admission.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
</head>
<body>
    <?php
        include 'admin_sidebar.php'; 
    ?>
        <div class="content">
            <center>
            <h1 style="font-weight:550;">Add Student</h1>
            <br>
            <div class="add_deg">
                <form action="#" method="POST">
                     <div>
                        <label class="label_deg">Username</label>
                        <input type="text" name="name">
                     </div>
                     <div>
                        <label class="label_deg">Email</label>
                        <input type="email" name="email">
                     </div>
                     <div>
                        <label class="label_deg">Phone</label>
                        <input type="number" name="phone">
                     </div>
                     <div>
                        <label class="label_deg">Password</label>
                        <input type="text" name="password">
                     </div>
                     <div>
                        <input class ="btn btn-primary" type="submit" name="add_student" value="Add Student">
                     </div>
                </form>
            </div>
            </center>
        </div>
</body>
</html>