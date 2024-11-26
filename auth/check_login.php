<?php
session_start();
include('../db.php');

// if (!isset($_SESSION['csrf_token']) || !isset($_POST['csrf_token'])) {
//     die("CSRF token is missing.");
// }

// if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
//     die("Invalid CSRF token.");
// }

// Solusi Celah Keamanan Server-Side Request Forgery (SSRF) (OTG-INTROS-001)

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users u join roles r on u.role_id = r.id WHERE username='$username' AND password=MD5('$password')";
$result = $conn->query($sql);
// Celah Keamanan , ' or true limit 1-- ## 

// $stmt = $conn->prepare("SELECT * FROM users u join roles r on u.role_id = r.id WHERE username=? AND password=MD5(?)");
// $stmt->bind_param("ss", $username, $password);
// $stmt->execute();
// $result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['role_name'] = $row['role_name'];
    $url_target = '../dashboard/index.php?page=' . $_SESSION['role_name'];
    header("Location: $url_target");
    echo $url_target;
} else {
    echo "No user found.";
}

$conn->close();

