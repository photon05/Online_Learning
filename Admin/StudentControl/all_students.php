<?php

session_start();

    if (isset($_POST['apply'])) {
    // Get the branch and year values from the button's data attributes
    $branch = $_POST['branch'];
    $year = $_POST['year'];

    // Redirect to the new page with the branch and year as query parameters
    header("Location: branchYearStudent.php?branch=$branch&year=$year");
    exit;
    }

    $host="localhost";

    $user="root";

    $password="";

    $db="iiit_b";

    $data=mysqli_connect($host,$user,$password,$db); 

    $sql="SELECT * from all_students";

    $result=mysqli_query($data,$sql); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        include 'admin_sidebar.php';  
    ?>
         <div class="content">
        <center>
        <h1 style="font-weight:550;">All Students of IIITB</h1>
        <br>
        <table border="1px">
            <tr>
                <th style="padding:20px; font-size:15px">Course</th>
                <th style="padding:20px; font-size:15px">Branch</th>
                <th style="padding:20px; font-size:15px">Year</th>
                <th style="padding:20px; font-size:15px">Show List</th>
            </tr>

            <?php
            while($info=$result->fetch_assoc())
            {
            ?>
            <tr>
                <td style="padding:20px;"><?php echo "{$info['course']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['branch']}"; ?></td>
                <td style="padding:20px;"><?php echo "{$info['year']}"; ?></td>
                <td style="padding:20px;">
                    <form method="post">
                         <input type="hidden" name="branch" value="<?php echo $info['branch']; ?>">
                         <input type="hidden" name="year" value="<?php echo $info['year']; ?>">
                         <input class="btn btn-primary" type="submit" id="submit" name="apply" value="Open">
                    </form>
                </td>
                
            </tr>

            <?php
            }
            ?>
        </table>
        </center>
    </div>
</body>
</html>