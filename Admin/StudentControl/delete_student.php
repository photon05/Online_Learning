<?php

session_start();

$host="localhost";

$user="root";

$password="";

$db="iiit_b";

$data=mysqli_connect($host,$user,$password,$db);

if($_GET['schno_id']){
    $user_id=$_GET['schno_id'];
    $sql="DELETE FROM approve_user WHERE schno='$user_id' ";
    $result=mysqli_query($data,$sql);
    if($result){
        $_SESSION['message']='Delete Student is Successful';
        header("location:view_student.php");
    }
}
?>