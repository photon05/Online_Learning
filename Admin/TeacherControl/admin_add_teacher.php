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

    if(isset($_POST['add_teacher'])){
        $t_name=$_POST['name'];
        $t_email=$_POST['email'];
        $t_phone=$_POST['phone'];
        $t_department=$_POST['department'];
        $t_webpage=$_POST['webpage'];
        $t_description=$_POST['description'];
        $file=$_FILES['image']['name'];
        $t_password=$_POST['password'];
        $dst="./image/".$file;
        $dst_db="./image/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        $sql="INSERT INTO teacher(name,email,phone,department,webpage,description,image,password) VALUES ('$t_name','$t_email','$t_phone','$t_department','$t_webpage','$t_description','$dst_db','$t_password')";

        $result=mysqli_query($data,$sql);

        if($result){
            $_SESSION['message']='Teacher added Successful';
            header('location:admin_add_teacher.php');
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
            <h1 style="font-weight:550;">Add Teacher</h1>
            <br>
            <div class="add_deg">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <!-- <div>
                        <label class="label_deg">UserName</label>
                        <input type="text" name="username">
                     </div> -->
                     <div>
                        <label class="label_deg">Teacher Name</label>
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
                        <label class="label_deg">Departmnet</label>
                        <select style="width:180px;" name="department">
                            <option class="input_deg" value="CSE">CSE</option>
                            <option class="input_deg" value="IT">IT</option>
                            <option class="input_deg" value="ECE">ECE</option>
                        </select>
                     </div>
                     <div>
                        <label class="label_deg">Webpage Link</label>
                        <input type="url" name="webpage">
                     </div>
                     <div>
                        <label class="label_deg">Description</label>
                        <textarea name="description"></textarea>
                     </div>
                     <center>
                     <div>
                        <label class="label_deg">Image</label>
                        <input type="file" name="image">
                     </div>
                     <div>
                        <label class="label_deg">Password</label>
                        <input type="password" name="password">
                     </div>
                     </center>
                     <br>
                     <div>
                        <input class ="btn btn-primary" type="submit" name="add_teacher" value="Add Teacher">
                     </div>
                </form>
            </div>
            </center>
        </div>
</body>
</html>