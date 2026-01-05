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
// SQL query to verify login credentials
$SELECT_USER = "SELECT firstname FROM student_reg WHERE email = ?
AND `password1` = ?";
$stmt = $conn->prepare($SELECT_USER);
if (!$stmt) {
 die('Prepare failed: (' . $conn->errno . ') ' . $conn->error);
 }
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$stmt->bind_result($name);
$stmt->fetch();
if ($name) {
 // Successful login
 $_SESSION['student_name'] = $name;
 header("Location: home_student.php");
} else {
 // Check if email exists in the database
 $stmt->close();
 $SELECT_EMAIL = "SELECT email FROM student_reg WHERE email = ?";
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