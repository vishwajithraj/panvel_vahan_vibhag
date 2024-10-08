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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $login_type = $_POST['login_type']; 

    $query = "SELECT id, user_type FROM users WHERE phone = ? AND password = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $phone, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $user_type);
        $stmt->fetch();

        $_SESSION['phone'] = $phone;
        $_SESSION['loggedin'] = true;
        $_SESSION['timeout'] = time() + 600; 

        if ($login_type == 'master' && $user_type == 'master') {
            header("Location: ./Admin/admin.php");
            exit();
        } elseif ($login_type == 'user' && $user_type == 'user') {
            header("Location: ./User/user.php");
            exit();
        } else {
            echo "<script>alert('Invalid phone number or password.');</script>";
        }
    } else {
        echo "<script>alert('Invalid phone number or password.');</script>";
    }

    $stmt->close();
}

$mysqli->close();
?>
