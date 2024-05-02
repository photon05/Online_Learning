<?php
error_reporting(0);
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "iiit_b";
$data = mysqli_connect($host, $user, $password, $db);

$department = $_GET['department'];
$semester = $_GET['semester'];
$subcode = $_GET['subcode'];
$subname = $_GET['subname'];

$sql = "SELECT * FROM approve_user WHERE department='$department' AND semester='$semester'";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <style>
        .table_th {
            padding: 20px;
            font-size: 20px;
        }

        .table_td {
            padding: 20px;
        }
    </style>
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../admission.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
          crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

</head>
<body>
<?php
include 'teacher_sidebar.php';
?>
<div class="content">
    <center>
        <h1 style="font-weight: 550;">Student Data</h1>

        <?php
        if ($_SESSION['message']) {
            echo $_SESSION['message'];
        }

        unset($_SESSION['message']);
        ?>

        <br>
        <table border="1px">
            <tr>
                <th class="table_th">Roll No.</th>
                <th class="table_th">Name</th>
                <th class="table_th">Branch</th>
                <th class="table_th">Semester</th>
                <th class="table_th">Mini Test</th>
                <th class="table_th">Mid Term</th>
                <th class="table_th">Assignment</th>
                <th class="table_th">End Term</th>
                <th class="table_th">Submit</th>
            </tr>
            <?php
            while ($info = $result->fetch_assoc()) {
                ?>
                <tr>
                <form method="POST" action="submit_result.php">
                        <td class="table_td"><?php echo $info['schno']; ?></td>
                        <td class="table_td"><?php echo $info['name']; ?></td>
                        <td class="table_td"><?php echo $info['branch']; ?></td>
                        <td class="table_td"><?php echo $info['semester']; ?></td>
                        <td class="table_td"><input type="number" name="mini" style="width: 90px;" min="0"
                                                     max="10"></td>
                        <td class="table_td"><input type="number" name="mid" style="width: 90px;"></td>
                        <td class="table_td"><input type="number" name="assignment" style="width: 90px;"></td>
                        <td class="table_td"><input type="number" name="end_term" style="width: 90px;"></td>
                        <input type="hidden" name="schno" value="<?php echo $info['schno']; ?>">
                        <input type="hidden" name="subname" value="<?php echo $subname; ?>">
                        <input type="hidden" name="subcode" value="<?php echo $subcode; ?>">
                        <td class="table_td"><input class="btn btn-primary" type="submit" name="submit"
                                                    value="Submit"></td>
                    </form>
                </tr>
                <?php
            }
            ?>
        </table>
    </center>
</div>
</body>
</html>
