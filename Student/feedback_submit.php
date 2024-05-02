<?php

error_reporting(0);
// ini_set('display_errors', 1);
session_start();

$host="localhost";

$user="root";

$password="";

$db="iiit_b";

$data=mysqli_connect($host,$user,$password,$db);

if ($data == false) {
    die("Connection error");
}

// Retrieve form data
$schno = $_POST['schno'];
$facname = $_POST['teacher_name'];

// Check if feedback already exists for the student and teacher
$check_sql = "SELECT * FROM feedback WHERE schno='$schno' AND facname='$facname'";
$check_result = mysqli_query($data, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    echo '<script> 
        alert("Feedback Already given");
        window.location.href = "student_course.php";
      </script>';
    exit(); // Stop further execution
}

$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$q5 = $_POST['q5'];
$q6 = $_POST['q6'];
$q7 = $_POST['q7'];
$q8 = $_POST['q8'];
$q9 = $_POST['q9'];
$q10 = $_POST['q10'];
$comments = $_POST['comments'];

// Prepare SQL statement to insert feedback into database
$sql = "INSERT INTO feedback(schno, facname, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, comments) 
        VALUES('$schno', '$facname', '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$comments')";

$result = mysqli_query($data, $sql);

if ($result) {
    echo '<script> 
        alert("Feedback submitted successfully");
        setTimeout(function() {
            window.location.href = "student_course.php";
        }, 500); // Redirect after 0.5 seconds
      </script>';
} else {
    echo '<script> 
        alert("Failed to submit feedback");
        window.location.href = "student_course.php";
      </script>';
}

mysqli_close($data);
