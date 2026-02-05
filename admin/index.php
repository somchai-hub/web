<?php
require '../includes/client.php';

// ส่วนของ Logic การลบข้อมูล
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM attractions WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('ลบข้อมูลเรียบร้อย'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ระบบ Admin จัดการแก้ไขข้อมูล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&family=Nunito:ital@0;1&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Noto Sans Thai", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            font-variation-settings: "wdth" 100;
        }
    </style>
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>รายชื่อสถานที่ท่องเที่ยว</h1>
        <a href="form.php" class="btn btn-success">+ เพิ่มสถานที่ท่องเที่ยวใหม่</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>ชื่อสถานที่</th>
                <th>รายละเอียด</th>
                <th>ที่อยู่</th>
                <th>เบอร์โทร</th>
                <th>ลิงค์แมพ</th>
                <th>ราคา</th>
                <th>รูปภาพ</th>
                <th>หมวดหมู่</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM attractions";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>" . $row['phone_number'] . "</td>";
                    echo "<td>" . $row['map_link'] . "</td>";
                    echo "<td>" . $row['price_range'] . "</td>";
                    echo "<td>" . $row['cover_image'] . "</td>";
                    echo "<td>" . $row['category_id'] . "</td>";                    
                    //echo "<td>" . number_format($row['price'], 2) . "</td>";
                    //echo "<td>" . $row['description'] . "</td>";
                    echo "<td>
                            <a href='form.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>แก้ไข</a>
                            <a href='index.php?delete_id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('ยืนยันการลบข้อมูลนี้?');\">ลบ</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>ไม่มีข้อมูลสถานที่</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>