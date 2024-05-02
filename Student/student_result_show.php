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

    $sql1 = "SELECT schno from approve_user WHERE email='$email'";
    $result1=mysqli_query($data,$sql1);
    $row = mysqli_fetch_assoc($result1);
    $schno = $row['schno'];
    
    $sql="SELECT * from std_result WHERE schno='$schno'";
    $result=mysqli_query($data,$sql)

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
            <h1 style="font-weight:550;">View Result</h1>
            <br>
            <table border="1px">
                <tr>
                    <th class="table_th">Subject Code</th>
                    <th class="table_th">Subject Name</th>
                    <th class="table_th">Mini</th>
                    <th class="table_th">Mid Term</th>
                    <th class="table_th">Assignment</th>
                    <th class="table_th">End Term</th>
                    <th class="table_th">Total Marks</th>
                </tr>
                <?php
                while($info=$result->fetch_assoc())
                {
                ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['subcode']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['subname']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['mini']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['mid']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['assignment']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['end_term']}"; ?></td>
                    <td class="table_td"><?php echo $info['mini'] + $info['mid'] + $info['assignment'] + $info['end_term']; ?></td>
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