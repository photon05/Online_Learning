<?php
error_reporting(0);
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

    $sql="SELECT * FROM course ORDER by semester";

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
            <h1 style="font-weight:550;">View Course</h1>
            <br>
            <?php
                 if($_SESSION['message']){
                    echo $_SESSION['message'];
                 }

                 unset($_SESSION['message']);
            ?>
            <table border="1px">
                <tr>
                    <th class="table_th">Subject Code</th>
                    <th class="table_th">Subject Name</th>
                    <th class="table_th">Department</th>
                    <th class="table_th">Course</th>
                    <th class="table_th">Section</th>
                    <th class="table_th">Semester</th>
                    <th class="table_th">Faculty name</th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>
                </tr>
                <?php
                while($info=$result->fetch_assoc())
                {
                ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['subcode']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['subname']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['department']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['course']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['section']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['semester']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['facname']}"; ?></td>
                    <td class="table_td"><?php echo "<a class ='btn btn-danger' onClick=\" javascript:return confirm('Are You Sure to Delete this');\"  href='delete_course.php?course_id={$info['subcode']}'>Delete</a>"; ?></td>
                    <td class="table_td"><?php echo "<a class ='btn btn-primary' href='update_course.php?course_id={$info['subcode']}'>Update</a>"; ?></td>
                </tr>
                <?php
                }
                ?>
             </table>  
            </center>
        </div>
</body>
</html>