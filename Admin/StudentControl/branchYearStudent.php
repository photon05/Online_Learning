<?php
error_reporting(0);
session_start();

    
    $host="localhost";

    $user="root";

    $password="";

    $db="iiit_b";

    $data=mysqli_connect($host,$user,$password,$db); 

    $department = $_GET['department'];
    $course = $_GET['course'];
    $semester = $_GET['semester'];

    $sql="SELECT * from approve_user WHERE department='$department' AND course='$course' AND semester='$semester' ";

    $result=mysqli_query($data,$sql); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        .table_th{
            padding:20px;
            font-size:20px;
        }
        .table_td{
            padding:20px;
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
            <h1 style="font-weight:550;">Student Data</h1>

            <?php
                 if($_SESSION['message']){
                    echo $_SESSION['message'];
                 }

                 unset($_SESSION['message']);
            ?>

            <br>
             <table border="1px">
                <tr>
                    <th class="table_th">Scholar No.</th>
                    <th class="table_th">Name</th>
                    <th class="table_th">Branch</th>
                    <!-- <th class="table_th">Year</th> -->
                    <th class="table_th">Semester</th>
                </tr>
                <?php
                while($info=$result->fetch_assoc())
                {
                ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['schno']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['name']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['branch']}"; ?></td>
                    <!-- <td class="table_td"><?php echo "{$info['year']}"; ?></td> -->
                    <td class="table_td"><?php echo "{$info['semester']}"; ?></td>
                <?php
                }
                ?>
             </table>  
             </center>
        </div>
</body>
</html>