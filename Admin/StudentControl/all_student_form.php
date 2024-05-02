<?php

session_start();

    if (isset($_POST['apply'])) {
    // Get the branch and year values from the button's data attributes
    $department = $_POST['department'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];


    // Redirect to the new page with the branch and year as query parameters
    header("Location: branchYearStudent.php?department=$department&course=$course&semester=$semester");
    exit;
    }

    $host="localhost";

    $user="root";

    $password="";

    $db="iiit_b";

    $data=mysqli_connect($host,$user,$password,$db); 

    $sql="SELECT * from approve_user";

    $result=mysqli_query($data,$sql); 

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
            <h1 style="font-weight:550;">Student List</h1>
            <br>
            <div class="add_deg">
                <?php
                $info=$result->fetch_assoc()
                ?>
                <form method="POST">
                     <div>
                        <label class="label_deg">Department</label>
                        <select style="width:175px;" name="department">
                    <option class="input_deg" value="CSE">CSE</option>
                    <option class="input_deg" value="IT">IT</option>
                    <option class="input_deg" value="ECE">ECE</option>
                       </select>
                     </div>
                     <div>
                        <label class="label_deg">Course</label>
                        <select style="width:175px;" name="course">
                              <option class="input_deg" value="B.Tech">B.tech</option>
                              <option class="input_deg" value="M.Tech">M.Tech</option>
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
                         <input class="btn btn-primary" type="submit" id="submit" name="apply" value="Open">
                     </div>
                </form>
            </div>
            </center>
        </div>
</body>
</html>