<?php

session_start();

$host="localhost";

$user="root";

$password="";

$db="iiit_b";

$data=mysqli_connect($host,$user,$password,$db);

if($_GET['course_id']){
    $sub_id=$_GET['course_id'];
    $sql="DELETE FROM course WHERE subcode='$sub_id' ";
    $result=mysqli_query($data,$sql);
    if($result){
        $_SESSION['message']='Course Delete Successful';
        header("location:view_course.php");
    }
}
?>