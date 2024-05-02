<?php
error_reporting(0);

$host="localhost";

$user="root";

$password="";

$db="iiit_b";

$data=mysqli_connect($host,$user,$password,$db);

if($data==false){
    die("connectin error");
}
echo "";
?>
