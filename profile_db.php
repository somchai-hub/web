<?php
session_start();
require_once 'includes/client.php';

if (isset($_POST['update_profile']) && isset($_SESSION['userid'])) {
    
    $user_id = $_SESSION['userid'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // 1. อัปเดตข้อมูลพื้นฐาน (อีเมล)
    $sql = "UPDATE users SET email = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $email, $user_id);
    mysqli_stmt_execute($stmt);

    // 2. จัดการเปลี่ยนรหัสผ่าน (ถ้ามีการกรอกมา)
    if (!empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
        $new_pass = $_POST['new_password'];
        $confirm_pass = $_POST['confirm_password'];

        if ($new_pass === $confirm_pass) {
            $hash_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $sql_pass = "UPDATE users SET password = ? WHERE id = ?";
            $stmt_pass = mysqli_prepare($conn, $sql_pass);
            mysqli_stmt_bind_param($stmt_pass, "si", $hash_pass, $user_id);
            mysqli_stmt_execute($stmt_pass);
        } else {
            $_SESSION['error'] = "รหัสผ่านใหม่ไม่ตรงกัน";
            //header("Location: profile.php");
            exit();
        }
    }

    // 3. จัดการอัปโหลดรูปภาพ
    if (isset($_FILES['profile_image']['name']) && $_FILES['profile_image']['name'] != "") {
        
        $target_dir = "uploads/profiles/";
        // สร้างชื่อไฟล์ใหม่กันซ้ำ (เช่น user_1_timestamp.jpg)
        $file_ext = strtolower(pathinfo($_FILES["profile_image"]["name"], PATHINFO_EXTENSION));
        $new_filename = "user_" . $user_id . "_" . time() . "." . $file_ext;
        $target_file = $target_dir . $new_filename;

        // ตรวจสอบนามสกุลไฟล์
        $allowed = array('jpg', 'jpeg', 'png', 'gif');
        
        if (in_array($file_ext, $allowed)) {
            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                // อัปเดตชื่อไฟล์ลงฐานข้อมูล
                $sql_img = "UPDATE users SET profile_image = ? WHERE id = ?";
                $stmt_img = mysqli_prepare($conn, $sql_img);
                mysqli_stmt_bind_param($stmt_img, "si", $new_filename, $user_id);
                mysqli_stmt_execute($stmt_img);
            } else {
                $_SESSION['error'] = "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ";
            }
        } else {
            $_SESSION['error'] = "อนุญาตเฉพาะไฟล์รูปภาพ (JPG, PNG, GIF) เท่านั้น";
        }
    }

    $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อยแล้ว";
    //header("Location: profile.php");
    // ให้เด้งกลับไปหน้าที่กดมา (หน้าเดิม)
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    header("Location: " . $redirect);
    exit();

} else {
    header("Location: index.php");
    exit();
}
?>
