<?php
session_start();
include("client.php");

if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt,"s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row["password"])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['success'] = "Login Successfully.";
            header("Location: index.php");
        } else {
            echo "Password is incorrect.";
        }
    } else {
            echo "Username not found.";
        }
}