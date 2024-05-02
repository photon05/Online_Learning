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

    $id=$_GET['schno_id'];

    $sql="SELECT * FROM approve_user WHERE schno='$id' ";

    $result=mysqli_query($data,$sql);

    $info=$result->fetch_assoc();


    if(isset($_POST['update'])){ 
        $email=$_POST['email']; 
        $phone=$_POST['phone']; 
        $semester=$_POST['semester']; 
        $password=$_POST['password']; 

        $query="UPDATE approve_user SET  email='$email', phone='$phone',semester='$semester', password='$password' WHERE schno='$id' ";

        $result2=mysqli_query($data,$query);

        if($result2){
        $_SESSION['message']=' Student Updated Successful';
            header("location:view_student.php");
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
            <h1 style="font-weight:550;">Update Student</h1>
            <div class="add_deg">
            <form action="#" method="POST">
            <div>
                        <label>Scholar No.</label>
                        <?php echo "{$info['schno']}"; ?>
                        </div>
                    <div>
                        <label>Name</label>
                        <?php echo "{$info['name']}"; ?>
                        </div>    
                        <div>
                        <label>Father Name</label>
                        <?php echo "{$info['father']}"; ?>
                    </div>
                    <div>
                        <label>Address</label>
                        <?php echo "{$info['address']}"; ?>
                    </div>
                    <div>
                        <label>Department</label>
                        <?php echo "{$info['department']}"; ?>
                    </div>
                    <div>
                        <label>Branch</label>
                        <?php echo "{$info['branch']}"; ?>
                    </div>
                    <div>
                        <label>Course</label>
                        <?php echo "{$info['course']}"; ?>
                    </div>
                     <div>
                        <label class="label_deg">Email</label>
                        <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>">
                     </div>
                     <div>
                        <label class="label_deg">Phone</label>
                        <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>">
                     </div>
                     <div>
                        <label class="label_deg">Semester</label>
                        <input type="text" name="semester" value="<?php echo "{$info['semester']}"; ?>">
                     </div>
                     <div>
                        <label class="label_deg">Password</label>
                        <input type="text" name="password" value="<?php echo "{$info['password']}"; ?>">
                     </div>
                     <div>
                        <input class ="btn btn-primary" type="submit" name="update" value="Update">
                     </div>
                </form>
            </div>
            </center>
        </div>
</body>
</html>