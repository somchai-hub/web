<?php
include("client.php");

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
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