<?php

session_start();

$host="localhost";

$user="root";

$password="";

$db="iiit_b";

$data=mysqli_connect($host,$user,$password,$db);

if($data==false){
    die("connectin error");
}

if(isset($_POST['apply'])){
    $data_mrms=$_POST['mrms'];
    $data_name=$_POST['name'];
    $data_father=$_POST['father'];
    $data_gender=$_POST['gender'];
    $data_jeerank=$_POST['jeerank'];
    $data_address=$_POST['address'];
    $data_email=$_POST['email'];
    $data_phone=$_POST['phone'];
    $data_department=$_POST['department'];  
    $data_branch=$_POST['branch'];
    $data_semester=$_POST['semester'];
    $data_course=$_POST['course'];
    $data_section=$_POST['section'];
    // $data_password=password_hash($password, PASSWORD_DEFAULT);
    $data_password=$_POST['password'];

    $sql="INSERT INTO user_std(mrms,name,father,gender,jeerank,address,email,phone,department,branch,semester,course,section,password) VALUES ('$data_mrms', '$data_name','$data_father','$data_gender','$data_jeerank','$data_address','$data_email','$data_phone','$data_department','$data_branch','$data_semester','$data_course','$data_section', '$data_password')";  

    $result=mysqli_query($data,$sql);

    if($result){
        $_SESSION['message']="your registration sent successful";
        header("location:../index.php");
    }
    else{
        echo "Apply Failed";
    }
}

?>