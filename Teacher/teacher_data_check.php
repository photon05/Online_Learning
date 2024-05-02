<?php

session_start();


    $host="localhost";

    $user="root";

    $password="";

    $db="iiit_b";

    $data=mysqli_connect($host,$user,$password,$db);    

    if(isset($_POST['apply'])){
        $t_name=$_POST['name'];
        $t_email=$_POST['email'];
        $t_phone=$_POST['phone'];
        $t_department=$_POST['department'];
        $t_webpage=$_POST['webpage'];
        $t_description=$_POST['description'];
        $file=$_FILES['image']['name'];
        $t_password=$_POST['password'];
        $dst="./image/".$file;
        $dst_db="./image/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        $sql="INSERT INTO teacher(name,email,phone,department,webpage,description,image,password) VALUES ('$t_name','$t_email','$t_phone','$t_department','$t_webpage', '$t_description','$dst_db','$t_password')";

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
