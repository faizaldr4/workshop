<?php
$conn = new mysqli('localhost', 'root', '', 'workshop');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
