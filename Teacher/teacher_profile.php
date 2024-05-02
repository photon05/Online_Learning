<?php

session_start();

    if(!isset($_SESSION['email'])){
        header("location:login.php");
    }

    $host="localhost";

    $user="root";

    $password="";

    $db="iiit_b";

    $data=mysqli_connect($host,$user,$password,$db);

    $name=$_SESSION['email'];

    $sql="SELECT * FROM teacher WHERE email='$name' ";

    $result=mysqli_query($data,$sql);

    $info=mysqli_fetch_assoc($result);

    IF(isset($_POST['update_profile'])){
        // $s_email=$_POST['email'];
        $s_email = $_POST['email'];
        $s_phone=$_POST['phone'];
        $s_password=$_POST['password']; 
        $s_description=$_POST['description'];


        $sql2="UPDATE teacher SET email='$s_email', phone='$s_phone', password='$s_password', description = '$s_description' WHERE email='$name' ";

        $result2=mysqli_query($data,$sql2);

        if($result2){
            header('location:teacher_profile.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title> 
    <style>
        .label_deg {
    display: inline-block;
    text-align: left;
    width: 120px;
    padding-top: 10px;
    padding-bottom: 10px;
    margin-bottom: 5px; /* Add margin bottom for spacing */
}

.add_deg {
    background-color: #f2f2f2; /* Lighter background color */
    width: 500px;
    padding: 30px;
    margin: 0 auto; /* Center the form horizontally */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
}

.add_deg form div {
    margin-bottom: 15px; /* Add spacing between form elements */
}

.add_deg form div:last-child {
    margin-bottom: 0; /* Remove bottom margin for last form element */
}

.add_deg form input[type="text"],
.add_deg form input[type="number"],
.add_deg form input[type="email"],
.add_deg form input[type="url"],
.add_deg form input[type="password"],
.add_deg form input[type="file"],
.add_deg form textarea {
    width: calc(100% - 130px); /* Adjust width for form inputs */
    padding: 8px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.add_deg form textarea {
    height: 100px; /* Set height for textarea */
    resize: vertical; /* Allow vertical resizing */
}

.add_deg form input[type="file"] {
    width: calc(100% - 130px); /* Adjust width for file input */
    padding: 8px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    display: inline-block; /* Allow inline-block display */
}

.add_deg form input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px; /* Add top margin for submit button */
}

.add_deg form input[type="submit"]:hover {
    background-color: #45a049;
}

        .label_deg{
            display: inline-block;
            text-align: left;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .add_deg{
            background-color: rgb(121, 181, 211);
            width: 500px;
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
    include 'teacher_sidebar.php';
    ?>
    <div class="content">
        <center>
            <h1 style="font-weight:550;">Update Profile</h1>
            <br>
            <div class="add_deg">
        <form action="#" method="POST">
                     <div>
                        <label class="label_deg">Name: </label>
                        <input type="text" name="email" value="<?php echo "{$info['name']}"; ?>" readonly>
                     </div>
                     <div>
                        <label class="label_deg">Departmnet: </label>
                        <input type="email" name="email" value="<?php echo "{$info['department']}"; ?>" readonly>
                     </div>
                     <div>
                        <label class="label_deg">Email</label>
                        <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>">
                     </div>
                     <div>
                        <label class="label_deg">Phone</label>
                        <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>">
                     </div>
                     <div>
                        <label class="label_deg">Webpage</label>
                        <input type="url" name="webpage" value="<?php echo "{$info['webpage']}"; ?>">
                     </div>
                     <div>
                        <label class="label_deg">About Teacher</label>
                        <textarea name="description" rows="4"><?php echo "{$info['description']}"; ?></textarea>
                     </div>
                     <div>
                        <label >Choose Teacher New Image</label>
                        <input type="file" name="image">
                     </div>
                     <div>
                        <label class="label_deg">Password</label>
                        <input type="password" name="password" value="<?php echo "{$info['password']}"; ?>">
                     </div>
            <div>
                <input class="btn btn-primary"type="submit" name="update_profile" value="Update">
            </div>
        </form>
            </div>
        </center>
    </div>
</body>
</html>