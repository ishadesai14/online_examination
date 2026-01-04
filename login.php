<?php 
session_start(); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Log-in</title> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to
fit=no"> 
    <meta name="description" content=""> 
    <meta name="author" content=""> 
    <!-- Bootstrap CSS --> 
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/register-login.css"> 
    <link rel="stylesheet" href="css/style.css"> 
    <!-- Custom CSS for styling --> 
    <style> 
        body { 
            background-color: #f8f9fa; 
        } 
        .container {
             max-width: 600px; 
            margin: 50px auto; 
            padding: 20px; 
            background-color: #fff; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            border-radius: 10px; 
        } 
        .toggle-menu { 
            text-align: center; 
            margin-bottom: 20px; 
        } 
        .toggle-menu .btn { 
            margin: 0 10px; 
            transition: background-color 0.3s, transform 0.3s; 
        } 
        .toggle-menu .btn:hover { 
            background-color: #007bff; 
            color: white; 
            transform: scale(1.1); 
        } 
        .form-signup { 
            padding: 20px; 
        }
         .form-label-group { 
            position: relative; 
            margin-bottom: 1rem; 
        } 
        .form-label-group input { 
            height: auto; 
        } 
        .form-label-group label { 
            position: absolute; 
            top: 0; 
            left: 0; 
            display: block; 
            width: 100%; 
            margin-bottom: 0; 
            line-height: 1.5; 
            color: #495057; 
            pointer-events: none; 
            cursor: text; 
            border: 1px solid transparent; 
            border-radius: .25rem; 
            transition: all .1s ease-in-out; 
        } 
        .form-label-group input:focus + label, 
  .form-label-group input:not(:placeholder-shown) + label { 
            padding-top: .75rem; 
            padding-bottom: .25rem; 
            font-size: 12px; 
            color: #777; 
        } 
        .btn-block { 
            display: block; 
            width: 100%; 
        } 
    </style> 
    <!-- JavaScript function to check password match --> 
    <script>  
        function checkPassword(form) { 
            password1 = form.password1.value;  
            password2 = form.password2.value;  
            if (password1 == '') { 
                alert("Please enter a password");   
                return false; 
            } 
            else if (password2 == '') { 
                alert("Please confirm your password");  
                return false;
                   } 
            else if (password1 != password2) {  
                alert("\nPasswords do not match. Please try again.")  
                return false;  
            }  
            else if (!validatePassword(password1)) {  
                alert("Password format is incorrect. " + getPasswordFormat())  
                return false;  
            }  
            else {  
                alert("Passwords Match: Welcome to Tuition Finder!"); 
                return true;  
            }  
        }  
        function validatePassword(password) { 
            // Password must be at least 4 characters long and contain at least one 
uppercase letter, one special character, and one digit 
            var re = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*[0-9]).{4,}$/; 
            return re.test(password); 
        } 
        function getPasswordFormat() { 
            return "Password must be at least 4 characters long and contain at least one 
uppercase letter, one special character, and one digit"; 
 } 
        function showTeacherForm() { 
            document.getElementById("teacher-form").style.display = "block"; 
            document.getElementById("student-form").style.display = "none"; 
            document.getElementById("teacher-btn").classList.add("btn-primary"); 
            document.getElementById("teacher-btn").classList.remove("btn
secondary"); 
            document.getElementById("student-btn").classList.add("btn-secondary"); 
            document.getElementById("student-btn").classList.remove("btn-primary"); 
        } 
        function showStudentForm() { 
            document.getElementById("teacher-form").style.display = "none"; 
            document.getElementById("student-form").style.display = "block"; 
            document.getElementById("teacher-btn").classList.add("btn-secondary"); 
            document.getElementById("teacher-btn").classList.remove("btn-primary"); 
            document.getElementById("student-btn").classList.add("btn-primary"); 
            document.getElementById("student-btn").classList.remove("btn
secondary"); 
        } 
        // Function to fetch and display student form using AJAX 
        function loadStudentForm() { 
            var xhr = new XMLHttpRequest(); 
            xhr.open("GET", "student/login_front.php", true); 
 xhr.onreadystatechange = function () { 
                if (xhr.readyState == 4 && xhr.status == 200) { 
                    document.getElementById("student-form").innerHTML = 
xhr.responseText; 
                } 
            }; 
            xhr.send(); 
        } 
    </script> 
</head> 
<body> 
    <div class="container"> 
        <div class="toggle-menu"> 
            <button id="teacher-btn" class="btn btn-primary" 
onclick="showTeacherForm()">Teacher</button> 
            <button id="student-btn" class="btn btn-secondary" 
onclick="showStudentForm(); loadStudentForm()">Student</button> 
        </div> 
        <!-- Teacher Form --> 
        <form id="teacher-form" class="form-signup" method="POST" 
action="teacher/login_b.php"> 
            <div class="text-center mb-4"> 
                <h1 class="h3 mb-3 font-weight-normal">Log-in as Teacher</h1> 
            </div> <!-- Closing div for the previous form group --> 
 <?php 
            // Check if login error session variable is set and display error message 
            if (isset($_SESSION['login_error']) && $_SESSION['login_error'] == true) 
{ 
                // Unset the session variable to clear the error message 
                unset($_SESSION['login_error']); 
                echo "<div class='alert alert-danger'>Incorrect email or password. Please 
try again.</div>"; 
            } 
            ?> 
            <div class="form-label-group"> 
                <!-- Input field for email --> 
                <input type="email" name="email" class="form-control" 
placeholder="Enter Your registered Email-id" required autofocus> 
                <label>Email_id</label> 
            </div> 
            <div class="form-label-group"> 
                <!-- Input field for password --> 
                <input type="password" name="password1" class="form-control" 
placeholder="Enter Your Password" required> 
                <label>Password</label> 
            </div> 
            <!-- Log-in button -->
             <button class="btn btn-lg btn-primary btn-block mt-4" type="submit">Log
in</button> 
            <!-- Link to sign up page --> 
            <p>Don't have an account? <a href="./registration.php">Sign up</a>.</p> 
        </form> 
        <!-- Student Form (Hidden by default) --> 
        <div id="student-form" style="display: none;"></div> 
    </div> 
</body> 
</html> 
teacher/login_b.php 
<?php 
session_start(); 
// Database connection details 
$host = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbname = "online_examination"; 
// Create connection 
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname); 
// Check for connection errors 
if ($conn->connect_error) { 
    die('Connect Error('. $conn->connect_errno .')'. $conn->connect_error);
    } 
// Retrieve form data 
$email = $_POST['email']; 
$password = $_POST['password1']; 
// SQL query to verify login credentials and get fullname and gender 
$SELECT_USER = "SELECT fullname, gender FROM teacher_reg WHERE email 
= ? AND `password1` = ?"; 
$stmt = $conn->prepare($SELECT_USER); 
if (!$stmt) { 
    die('Prepare failed: (' . $conn->errno . ') ' . $conn->error); 
} 
$stmt->bind_param("ss", $email, $password); 
$stmt->execute(); 
$stmt->bind_result($name, $gender); 
$stmt->fetch(); 
if ($name) { 
    // Successful login 
    $_SESSION['teacher_name'] = $name; 
    $_SESSION['teacher_gender'] = $gender; 
    header("Location: home_teacher.php"); 
} else { 
    // Check if email exists in the database 
    $stmt->close();
    $SELECT_EMAIL = "SELECT email FROM teacher_reg WHERE email = ?"; 
    $stmt = $conn->prepare($SELECT_EMAIL); 
    if (!$stmt) { 
        die('Prepare failed: (' . $conn->errno . ') ' . $conn->error); 
    } 
    $stmt->bind_param("s", $email); 
    $stmt->execute(); 
    $stmt->bind_result($email_exists); 
    $stmt->fetch(); 
    if ($email_exists) { 
        // Incorrect password 
        $error_message = 'Incorrect password. Please try again.'; 
        echo "<script> 
        alert('$error_message'); 
        window.location.href = '../login.php'; 
      </script>"; 
    } else { 
        // Email does not exist 
        $error_message = 'User does not exist. Please sign up.'; 
    } 
    $stmt->close(); 
    $conn->close(); 
 // Redirect back to login_front.php with an error message 
    echo "<script> 
            alert('$error_message'); 
            window.location.href = '../registration.php'; 
          </script>"; 
} 
?> 
student/login_front.php 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Student Log-in</title> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to
fit=no"> 
    <meta name="description" content=""> 
    <meta name="author" content=""> 
    <!-- Bootstrap CSS --> 
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <!-- Custom CSS --> 
    <link rel="stylesheet" href="../css/register-login.css"> 
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body> 
    <!-- Log-in form --> 
    <form class="form-signup" method="POST" action="student/login_back.php"> 
        <div class="text-center mb-4"> 
            <h1 class="h3 mb-3 font-weight-normal">Log-in as User</h1> 
        </div> <!-- Closing div for the previous form group --> 
        <?php 
        session_start(); 
        // Check if login error session variable is set and display error message 
        if (isset($_SESSION['login_error']) && $_SESSION['login_error'] == true) { 
            // Unset the session variable to clear the error message 
            unset($_SESSION['login_error']); 
            echo "<div class='alert alert-danger'>Incorrect email or password. Please try 
again.</div>"; 
        } 
        ?> 
        <div class="form-label-group"> 
            <!-- Input field for email --> 
            <input type="email" name="email" class="form-control" placeholder="Enter 
Your registered Email-id" required autofocus> 
            <label>Email_id</label> 
        </div>
         <div class="form-label-group"> 
            <!-- Input field for password --> 
            <input type="password" name="password1" class="form-control" 
placeholder="Enter Your Password" required> 
            <label>Password</label> 
        </div> 
        <!-- Log-in button --> 
        <button class="btn btn-lg btn-primary btn-block mt-4" type="submit">Log
in</button> 
        <!-- Link to sign up page --> 
        <p>Don't have an account? <a href="./registration.php">Sign up</a>.</p> 
    </form> 
</body> 
</html>