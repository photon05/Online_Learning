<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registraton Form</title>
    <title>Login Form</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Student/registration.css">
    <link rel="stylesheet" href="../Student/style.css">
</head>
<body background="background.jpg" class="body_deg">
<nav>
        <label class="logo">IIIT BHOPAL</label>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../Admin/login.php">Admin Login</a></li>
            <li><a href="../Student/student_login.php">Student Login</a></li>
            <li><a href="../Teacher/teacherlogin.php">Teacher Login</a></li>
            <li><a href="../Student/registration.php">Student Registraton</a></li>
            <li><a href="../Teacher/teacher_registration.php">Teacher Registraton</a></li>
            <li><a href="">Contact Us</a></li>
        </ul>
</nav>
     <center>
        <div class="form_degi">
            <centre class="title_deg">
               Student Registration Form
            </centre>
            <form action="../Student/data_check.php" method="POST" class="admission_form">
            <!-- <div class="adm_int">
                <label class="label_text">UserName</label>
                <input class="input_deg" type="text" name="username">
            </div> -->
            <div class="adm_int">
                <label class="label_text">Mr./Ms.</label>
                <select style="width:175px;" name="mrms">
                    <option class="input_deg" value="Mr">Mr</option>
                    <option class="input_deg" value="Ms">Ms</option>
                </select>
            </div>
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>
            <div class="adm_int">
                <label class="label_text">Father Name</label>
                <input class="input_deg" type="text" name="father">
            </div>
            <div class="adm_int">
                <label class="label_text">Gender</label>
                <select style="width:175px;" name="gender">
                    <option class="input_deg" value="Male">Male</option>
                    <option class="input_deg" value="Female">Female</option>
                </select>
            </div>
            <div class="adm_int">
                <label class="label_text">Jee Rank</label>
                <input class="input_deg" type="text" name="jeerank">
            </div>
            <div class="adm_int">
                <label class="label_text">Address</label>
                <input class="input_deg" type="text" name="address">
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>
            <div class="adm_int">
                <label class="label_text">Department</label>
                <select style="width:175px;" name="department">
                    <option class="input_deg" value="CSE">CSE</option>
                    <option class="input_deg" value="IT">IT</option>
                    <option class="input_deg" value="ECE">ECE</option>
                </select>
            </div>
            <div class="adm_int">
                <label class="label_text">Branch</label>
                <select style="width:175px;" name="branch">
                    <option class="input_deg" value="CSE">CSE</option>
                    <option class="input_deg" value="IT">IT</option>
                    <option class="input_deg" value="ECE">ECE</option>
                </select>
            </div>
            <div class="adm_int">
                <label class="label_text">Semester</label>
                <select style="width:175px;" name="semester">
                    <option class="input_deg" value="1">SEM 1</option>
                </select>
            </div>
            <div class="adm_int">
                <label class="label_text">Course</label>
                <select style="width:175px;" name="course">
                    <option class="input_deg" value="B.tech">B.tech</option>
                    <option class="input_deg" value="M.tech">M.tech</option>
                </select>
            </div>
            <!-- <div class="adm_int">
                <label class="label_text">Section</label>
                <input class="input_deg" type="text" name="section">
            </div> -->
            <div class="adm_int">
                <label class="label_text">Password</label>
                <input class="input_deg" type="password" name="password">
            </div>
            <div class="adm_int">
                <input class="btn btn-primary" type="submit" id="submit" name="apply" value="Apply">
            </div>
        </form>
        </div>
    </center>
</body>
</html>