<?php
session_start();

$host="localhost";
$user="root";
$password="";
$db="iiit_b";
$data=mysqli_connect($host,$user,$password,$db);

// Deny functionality
if(isset($_POST['schno'])){
    $scholar_id=$_GET['schnodeny_id'];
    $sql="DELETE FROM user_std WHERE schno='$scholar_id' ";
    $result=mysqli_query($data,$sql);

    if($result){
        $_SESSION['message']="User denied successfully";
        header("location:admission.php");
        exit; // Exit to prevent further execution
    }
    else{
        echo "Error denying user";
        exit; // Exit to prevent further execution
    }
}

// Approve functionality
if(isset($_GET['schno_id'])){
    $scholar_id = $_GET['schno_id'];
    
    // Insert data into approve_user table
    $insert_sql = "INSERT INTO approve_user 
                   SELECT * FROM user_std WHERE schno = '$scholar_id'";
    $insert_result = mysqli_query($data, $insert_sql);

    if($insert_result){
        // Delete data from user_std table
        $delete_sql = "DELETE FROM user_std WHERE schno = '$scholar_id'";
        $delete_result = mysqli_query($data, $delete_sql);

        if($delete_result){
            $_SESSION['message'] = "User approved successfully";
            header("location: admission.php");
            exit; // Exit to prevent further execution
        } else {
            echo "Error deleting user data";
            exit; // Exit to prevent further execution
        }
    } 
    else {
        echo "Error approving user";
        exit; // Exit to prevent further execution
    }
} 

// If the script reaches this point, it means no valid action was taken
echo "Invalid action";



// Multiple Approve

if (isset($_POST['approve_multiple']) && isset($_POST['selected_students'])) {
    $selected_students = $_POST['selected_students'];

    foreach ($selected_students as $student_id) {
        $sql = "INSERT INTO approve_user 
                SELECT * FROM user_std WHERE schno = '$student_id' ";
        mysqli_query($data, $sql);

        foreach ($selected_students as $student_id) {
            $sql = "DELETE FROM user_std WHERE schno = '$student_id' ";
            mysqli_query($data, $sql);
        }

    }

    $_SESSION['message'] = "Selected students have been Approved.";
    header("Location: admission.php");
    exit();
} 
else {
    $_SESSION['message'] = "No students selected.";
    header("Location: admission.php");
}


// Multiple Deny


if (isset($_POST['deny_multiple']) && isset($_POST['selected_students'])) {
    $selected_students = $_POST['selected_students'];

    foreach ($selected_students as $student_id) {
        $sql = "DELETE FROM user_std WHERE schno = '$student_id' ";
        mysqli_query($data, $sql);
    }

    $_SESSION['message'] = "Selected students have been deleted.";
    header("Location: admission.php");
    exit();
} else {
    $_SESSION['message'] = "No students selected.";
    header("Location: admission.php");
    exit();
}

?>
