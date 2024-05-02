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

    $id=$_GET['course_id'];

    $sql="SELECT * FROM course WHERE subcode='$id' ";

    $result=mysqli_query($data,$sql);

    $info=$result->fetch_assoc();


    if(isset($_POST['update'])){ 
        $subcode=$_POST['subjectcode']; 
        $subname=$_POST['subjectname']; 
        $department=$_POST['department']; 
        $course=$_POST['course']; 
        $section=$_POST['section']; 
        $semester=$_POST['semester']; 
        $facname=$_POST['facultyname']; 
        $query="UPDATE course SET subcode='$subcode', subname='$subname', department='$department', course='$course', section='$section', semester='$semester', facname='$facname' WHERE subcode='$id' ";
        $result2=mysqli_query($data,$query);

        if($result2){
            $_SESSION['message']='Course is Updated Successful';
            header("location:view_course.php");
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
            <h1 style="font-weight:550;">Update Course</h1>
            <br>
            <div class="add_deg">
                <form action="#" method="POST">
                     <div>
                        <label class="label_deg">Subject Code</label>
                        <input type="text" name="subjectcode" value="<?php echo "{$info['subcode']}"; ?>">
                     </div>
                     <div>
                        <label class="label_deg">Subject Name</label>
                        <input type="text" name="subjectname" value="<?php echo "{$info['subname']}"; ?>">
                     </div>
                     <div>
                        <label class="label_deg">Department</label>
                        <input type="text" name="department" value="<?php echo "{$info['department']}"; ?>">
                     </div>
                     <div>
                        <label class="label_deg">Course</label>
                        <input type="text" name="course" value="<?php echo "{$info['course']}"; ?>">
                     </div>
                     <div>
                        <label class="label_deg">Section</label>
                        <input type="text" name="section" value="<?php echo "{$info['section']}"; ?>">
                     </div>
                     <div>
                        <label class="label_deg">Semester</label>
                        <input type="text" name="semester" value="<?php echo "{$info['semester']}"; ?>">
                     </div>
                     <div>
                        <label class="label_deg">Faculty Name</label>
                        <input type="text" name="facultyname" value="<?php echo "{$info['facname']}"; ?>">
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