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

    if(isset($_POST['add_course'])){
        $sub_code=$_POST['subjectcode'];
        $sub_name=$_POST['subjectname'];
        $depart=$_POST['department'];
        $course=$_POST['course'];
        $section=$_POST['section'];
        $sem=$_POST['semester'];
        $fac_name=$_POST['facultyname'];

        $check="SELECT * FROM course WHERE subcode='$sub_code' ";

        $check_user=mysqli_query($data,$check);

        $row_count=mysqli_num_rows($check_user);

        if($row_count==1){
            echo "<script type='text/javascript'>
            
            alert('Subject Code Already Exist. Try Another One');

            </script>";
        }

        else{

        $sql="INSERT INTO course(subcode,subname,department,course,section,semester,facname) VALUES ('$sub_code','$sub_name','$depart','$course','$section','$sem','$fac_name')";

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
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../admission.css">
    <!-- <style>
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
    </style> -->
   
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
            <h1 style="font-weight:550;">Add Course</h1>
            <br>
            <div class="add_deg">
                <form action="#" method="POST">
                     <div>
                        <label class="label_deg">Subject Code</label>
                        <input type="text" name="subjectcode">
                     </div>
                     <div>
                        <label class="label_deg">Subject Name</label>
                        <input type="text" name="subjectname">
                     </div>
                     <div>
                        <label class="label_deg">Department</label>
                        <select class="input_deg" name="department">
                    <option class="input_deg" value="CSE">CSE</option>
                    <option class="input_deg" value="IT">IT</option>
                    <option class="input_deg" value="ECE">ECE</option>
                </select>
                     </div>
                     <div>
                        <label class="label_deg">Cousres</label>
                        <select style="width:175px;" name="course">
                    <option class="input_deg" value="B.tech">B.tech</option>
                    <option class="input_deg" value="M.tech">M.tech</option>
                    <option class="input_deg" value="MCA">MCA</option>
                </select>
                     </div>
                     <div>
                        <label class="label_deg">Section</label>
                        <select style="width:175px;" name="section">
                    <option class="input_deg" value="1">1</option>
                    <option class="input_deg" value="2">2</option>
                    <option class="input_deg" value="3">3</option>
                </select>
                     </div>
                     <div>
                        <label class="label_deg">Semester</label>
                        <select style="width:175px;" name="semester">
                            <option class="input_deg" value="1">SEM 1</option>
                            <option class="input_deg" value="2">SEM 2</option>
                            <option class="input_deg" value="3">SEM 3</option>
                            <option class="input_deg" value="4">SEM 4</option>
                            <option class="input_deg" value="5">SEM 5</option>
                            <option class="input_deg" value="6">SEM 6</option>
                            <option class="input_deg" value="7">SEM 7</option>
                            <option class="input_deg" value="8">SEM 8</option>
                        </select>
                     </div>
                     <div>
                        <label class="label_deg">Faculty Name</label>
                        <input type="text" name="facultyname">
                     </div>
                     <div>
                        <input class ="btn btn-primary" type="submit" name="add_course" value="Add Course">
                     </div>
                </form>
            </div>
            </center>
        </div>
</body>
</html>