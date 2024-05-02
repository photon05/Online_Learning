<?php
error_reporting(0);
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "iiit_b";
$data = mysqli_connect($host, $user, $password, $db);

// Check if the form is submitted
if(isset($_POST['submit'])){
    // Retrieve form data
    $schno = mysqli_real_escape_string($data, $_POST['schno']);
    $subcode = mysqli_real_escape_string($data, $_POST['subcode']);
    $subname = mysqli_real_escape_string($data, $_POST['subname']);
    $mini = mysqli_real_escape_string($data, $_POST['mini']);
    $mid = mysqli_real_escape_string($data, $_POST['mid']);
    $assignment = mysqli_real_escape_string($data, $_POST['assignment']);
    $end_term = mysqli_real_escape_string($data, $_POST['end_term']);

    // Check if the student's data already exists in std_result table
    $check_sql = "SELECT * FROM std_result WHERE schno='$schno'";
    $check_result = mysqli_query($data, $check_sql);

    if(mysqli_num_rows($check_result) > 0){
        // Check if a record with the same schno but a different subcode exists
        $subcode_check_sql = "SELECT * FROM std_result WHERE schno='$schno' AND subcode<>'$subcode'";
        $subcode_check_result = mysqli_query($data, $subcode_check_sql);

        if(mysqli_num_rows($subcode_check_result) > 0){
            // Insert a new record if schno is the same but subcode is different
            $insert_sql = "INSERT INTO std_result (subname, subcode, schno, mini, mid, assignment, end_term) VALUES ('$subname', '$subcode','$schno', '$mini', '$mid', '$assignment', '$end_term')";
            $result = mysqli_query($data, $insert_sql);
        } else {
            // Update the existing record if schno and subcode are the same
            $update_sql = "UPDATE std_result SET mini='$mini', mid='$mid', assignment='$assignment', end_term='$end_term' WHERE schno='$schno' AND subcode='$subcode'";
            $result = mysqli_query($data, $update_sql);
        }
    } else {
        // If data doesn't exist, insert a new record
        $insert_sql = "INSERT INTO std_result (subname, subcode, schno, mini, mid, assignment, end_term) VALUES ('$subname', '$subcode','$schno', '$mini', '$mid', '$assignment', '$end_term')";
        $result = mysqli_query($data, $insert_sql);
    }

    if($result){
        $_SESSION['message'] = "Data inserted successfully";
        header("location:teacher_course.php");
    } else {
        echo "Error: " . mysqli_error($data); // Print error message
    }
}
?>
