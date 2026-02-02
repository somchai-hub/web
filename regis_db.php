<?php
include("includes/client.php");

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $check_query);

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
         mysqli_stmt_bind_param($stmt, "ss", $username, $password_hash);
         if (mysqli_stmt_execute($stmt)) {
            echo "สมัครสมาชิกสำเร็จ <a href='index.php'>กลับเข้าสู่หน้าหลัก</a>";
         } else {
            echo "เกิดข้อผิดพลาด" . mysqli_error($conn);
         }
         mysqli_stmt_close($stmt);
    } else {
        echo "Error!!!";
    }
}
mysqli_close($conn);