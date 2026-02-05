<?php
include("includes/client.php");
header('Content-Type: application/json');
$response = array();

if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        $response['status'] = 'error';
        $response['message'] = "ชื่อผู้ใช้หรืออีเมลนี้มีผู้ใช้งานแล้ว";
        //echo "<script>alert('ชื่อผู้ใช้หรืออีเมลนี้มีผู้ใช้งานแล้ว')</script>";
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password_hash);
        
        if (mysqli_stmt_execute($stmt)) {
            $response["status"] = "success";
            $response["message"] = "สมัครสมาชิกสำเร็จ!";
            $response["redirect"] = "index.php";
            //echo "<script>alert('สมัครสมาชิกสำเร็จ!'); window.location ='index.php';</script>";
        } else {
            //echo "Error: " . mysqli_error($conn);
            $response['status'] = 'error';
            $response['message'] = "ไม่ได้รับข้อมูลจากฟอร์ม";
        }
    }
}
echo json_encode($response);
mysqli_close($conn);