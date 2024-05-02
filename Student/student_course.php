<?php

session_start();

    if(!isset($_SESSION['email'])){
        header("location:login.php");
    }

    $host="localhost";

    $user="root";

    $password="";

    $db="iiit_b";

    $data=mysqli_connect($host,$user,$password,$db); 

    $email=$_SESSION['email'];

    $sql="SELECT * from approve_user s JOIN course c ON s.department = c.department AND s.semester = c.semester WHERE email='".$email."'";

    // $sql2 = "SELECT * FROM user_std WHERE username = $name  ORDER by semester"

    $result=mysqli_query($data,$sql); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../admission.css">
    <style>
        .table_th{
            padding:20px;
            font-size:20px;
        }
        .table_td{
            padding:20px;
        }
    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
</head>
<body>
    <?php
    include 'student_sidebar.php';
    ?>

<div class="content">
            <center>
            <h1 style="font-weight:550;">View Course</h1>
            <br>
            <table border="1px">
                <tr>
                    <th class="table_th">Subject Code</th>
                    <th class="table_th">Subject Name</th>
                    <th class="table_th">Department</th>
                    <th class="table_th">Semester</th>
                    <th class="table_th">Faculty name</th>
                    <th class="table_th">Feedback Form</th>
                </tr>
                <?php
                while($info=$result->fetch_assoc())
                {
                ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['subcode']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['subname']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['department']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['semester']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['facname']}"; ?></td>
                    <td class="table_td">
                    <form action="feedbackform.php" method="post">
                       <input type="hidden" name="subname" value="<?php echo $info['subname']; ?>">
                       <input type="hidden" name="facname" value="<?php echo $info['facname']; ?>">
                       <input type="hidden" name="schno" value="<?php echo $info['schno']; ?>">
                       <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Give Feedback">
                    </form>

                    </td>
                </tr>
                <?php
                }
                ?>

             </table>  
            </center>
        </div>

</body>
</html>