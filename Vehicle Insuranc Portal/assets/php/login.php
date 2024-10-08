<?php
session_start();
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "vehicle";

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($mysqli->connect_errno) {
  die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT id FROM users WHERE email = ? AND password = ?";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows == 1) {

    $_SESSION['email'] = $email;
    $_SESSION['loggedin'] = true;
    $_SESSION['timeout'] = time() + 600; 

    header("Location: admin.php");
    exit();
  } else {
 
    echo "Invalid email or password.";
  }

  $stmt->close();
}

if (isset($_POST['signup'])) {
  $email = $_POST['signupEmail'];
  $password = $_POST['signupPassword'];
  $confirmPassword = $_POST['confirmPassword'];

  if ($password != $confirmPassword) {
    echo "Passwords do not match.";
    exit();
  }

  $query = "SELECT id FROM users WHERE email = ?";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    echo "Email already exists.";
    exit();
  }

  $query = "INSERT INTO users (email, password) VALUES (?, ?)";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();

  if ($stmt->affected_rows == 1) {
    echo "Signup successful.";
  } else {
    echo "Error occurred during signup.";
  }

  $stmt->close();
}

$mysqli->close();
?>
