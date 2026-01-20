<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "test";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connect Error!!" . $conn->connect_error);
}
echo "Connected Successfully.";