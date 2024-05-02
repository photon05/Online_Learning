<?php
error_reporting(0);
session_start();

    
    $host="localhost";

    $user="root";

    $password="";

    $db="iiit_b";

    $data=mysqli_connect($host,$user,$password,$db); 

    if(isset($_POST['submit'])){
    // Retrieve the subcode from the form
    $schno = $_POST['schno'];
    $subname = $_POST['subname'];
    $facname = $_POST['facname'];


} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Feedback Form</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 8px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Teacher Feedback Form</h2>
        <form action="feedback_submit.php" method="post">
        <div class="form-group">
                <label for="teacher_name">Scholar No.:</label>
                <input type="text" name="schno" value="<?php echo $schno; ?>" readonly>
            </div>
        <div class="form-group">
                <label for="teacher_name">Teacher's Name:</label>
                <input type="text" name="teacher_name" value="<?php echo $facname; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="teacher_name">Subject Name:</label>
                <input type="text" name="subject_name" value="<?php echo $subname; ?>" required>
            </div>
            <div class="form-group">
                <label for="quality">Quality of Teaching:</label>
                <input type="number" id="quality" name="q1" min="1" max="10" required>
            </div>
            <div class="form-group">
                <label for="communication">Communication Skills:</label>
                <input type="number" id="communication" name="q2" min="1" max="10" required>
            </div>
            <div class="form-group">
                <label for="availability">Availability for Help:</label>
                <input type="number" id="availability" name="q3" min="1" max="10" required>
            </div>
            <div class="form-group">
                <label for="communication">Treat students with respect:</label>
                <input type="number" name="q4" min="1" max="10" required>
            </div>
            <div class="form-group">
                <label for="communication">Punctuality:</label>
                <input type="number" name="q5" min="1" max="10" required>
            </div>
            <div class="form-group">
                <label for="communication">Self confidence:</label>
                <input type="number" name="q6" min="1" max="10" required>
            </div>
            <div class="form-group">
                <label for="communication">Innovating teaching methods:</label>
                <input type="number" name="q7" min="1" max="10" required>
            </div>
            <div class="form-group">
                <label for="communication">Help students:</label>
                <input type="number" id="communication" name="q8" min="1" max="10" required>
            </div>
            <div class="form-group">
                <label for="communication">Acts as a role model:</label>
                <input type="number" id="communication" name="q9" min="1" max="10" required>
            </div>
            <div class="form-group">
                <label for="overall">Overall Satisfaction:</label>
                <input type="number" id="overall" name="q10" min="1" max="10" required>
            </div>
            <div class="form-group">
                <label for="comments">Additional Comments:</label>
                <textarea id="comments" name="comments" rows="4" cols="50"></textarea>
            </div>
            <button name="submit" type="submit">Submit Feedback</button>
            <!-- <input type="submit" name="submit" value="Submit Feedback"> -->
        </form>
    </div>
</body>
</html>