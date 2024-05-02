<?php

session_start();

$host="localhost";

$user="root";

$password="";

$db="iiit_b";

$data=mysqli_connect($host,$user,$password,$db);

if($_GET['teacher_id']){
    $t_id=$_GET['teacher_id'];
    $sql="DELETE FROM teacher WHERE id='$t_id' ";
    $result=mysqli_query($data,$sql);
    if($result){
        $_SESSION['message']='Delete Teacher is Successful';
        header("location:admin_view_teacher.php");
    }
}
?>