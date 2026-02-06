<?php
session_start();
include("../includes/client.php");
header('Content-Type: application/json');
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        if (password_verify($password, $row['password'])) {
           
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            $response['status'] = 'success';
            
            if ($row['role'] == 'admin') {
                $response['redirect'] = 'admin/index.php';
            } else {
                $response['redirect'] = 'index.php';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'รหัสผ่านไม่ถูกต้อง กรุณาลองใหม่';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'ไม่พบชื่อผู้ใช้นี้ในระบบ';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid Request';
}

echo json_encode($response);
exit();
?>