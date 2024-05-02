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
                <th style="padding:20px; font-size:15px">Mr./Ms.</th>
                <th style="padding:20px; font-size:15px">Name</th>
                <th style="padding:20px; font-size:15px">Father Name</th>
                <th style="padding:20px; font-size:15px">Gender</th>
                <th style="padding:20px; font-size:15px">Jee Rank</th>
                <th style="padding:20px; font-size:15px">Address</th>
                <th style="padding:20px; font-size:15px">Email</th>
                <th style="padding:20px; font-size:15px">Phone</th>
                <th style="padding:20px; font-size:15px">Deapartment</th>
                <th style="padding:20px; font-size:15px">Branch</th>
                <th style="padding:20px; font-size:15px">Semester</th>
                <th style="padding:20px; font-size:15px">Course</th>
                <th style="padding:20px; font-size:15px">Password</th> 
                <th style="padding:20px; font-size:15px">Scholar .No.</th>
                <th style="padding:20px; font-size:15px">Delete</th>
                <th style="padding:20px; font-size:15px">Update</th>
                </tr>
                <?php
                while($info=$result->fetch_assoc())
                {
                ?>
                <tr>
                <td style="padding:2px;"><?php echo "{$info['mrms']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['name']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['father']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['gender']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['jeerank']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['address']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['email']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['phone']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['department']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['branch']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['semester']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['course']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['password']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['schno']}"; ?></td>
                <td style="padding:20px;"><?php echo "<a class ='btn btn-danger' onClick=\" javascript:return confirm('Are You Sure to Delete this');\"  href='delete_student.php?schno_id={$info['schno']}'>Delete</a>"; ?></td>
                <td style="padding:20px;"><?php echo "<a class ='btn btn-primary' href='update_student.php?schno_id={$info['schno']}'>Update</a>"; ?></td>
                </tr>
                <?php
                }
                ?>
             </table>  
             </center>
        </div>
</body>
</html>