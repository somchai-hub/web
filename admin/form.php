<?php
require '../includes/client.php';

$id = "";
$name = "";
$description = "";
$location = "";
$phone_number = "";
$map_link = "";
$price = "";
$cover_image = "";
$category_id = "";
$is_edit = false;

// ถ้ามี ID ส่งมา แปลว่าเป็นการ "แก้ไข" ให้ดึงข้อมูลเก่ามาโชว์
if (isset($_GET['id'])) {
    $is_edit = true;
    $id = $_GET['id'];
    $sql = "SELECT * FROM attractions WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $name = $row['name'];
    $description = $row['description'];
    $location = $row['location'];
    $phone_number = $row['phone_number'];
    $map_link = $row['map_link'];
    $price = $row['price_range'];
    $cover_image = $row['cover_image'];
    $category_id = $row['category_id'];
}

// ส่วนบันทึกข้อมูล (Save Logic)
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $phone_number = $_POST['phone_number'];
    $map_link = $_POST['map_link'];
    $price = $_POST['price_range'];
    $cover_image = $_POST['cover_image'];
    $category_id = $_POST['category_id'];

    if ($is_edit) {
        // Update ข้อมูลเดิม
        $id = $_POST['id'];
        $sql = "UPDATE attractions SET name='$name', description='$description', location='$location', phone_number='$phone_number', map_link='$map_link', price='$price', cover_image='$cover_image', category_id='$category_id' WHERE id=$id";
    } else {
        // Insert ข้อมูลใหม่
        $sql = "INSERT INTO attractions (name, description, location, phone_number, map_link, price, cover_image, category_id) VALUES ('$name', '$description', '$location', '$phone_number', '$map_link', '$price', '$cover_image', '$category_id')";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // บันทึกเสร็จกลับไปหน้าแรก
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title><?php echo $is_edit ? "แก้ไขสถานที่" : "เพิ่มสถานที่ใหม่"; ?></title>
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
    <div class="card">
        <div class="card-header">
            <h3><?php echo $is_edit ? "แก้ไขข้อมูลสถานที่" : "เพิ่มสถานที่ใหม่"; ?></h3>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <?php if ($is_edit): ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label>ชื่อสถานที่</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
                </div>
                <div class="mb-3">
                    <label>รายละเอียด</label>
                    <textarea name="description" class="form-control" rows="3"><?php echo $description; ?></textarea>
                </div>
                <div class="mb-3">
                    <label>ที่อยู่</label>
                    <textarea name="description" class="form-control" rows="3"><?php echo $location; ?></textarea>
                </div>
                <div class="mb-3">
                    <label>เบอร์โทร</label>
                    <textarea name="description" class="form-control" rows="3"><?php echo $phone_number; ?></textarea>
                </div>
                <div class="mb-3">
                    <label>ลิงค์แมพ</label>
                    <textarea name="description" class="form-control" rows="3"><?php echo $map_link; ?></textarea>
                </div>
                <div class="mb-3">
                    <label>ราคา</label>
                    <input type="number" name="price" class="form-control" value="<?php echo $price; ?>" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label>รูปภาพ</label>
                    <textarea name="description" class="form-control" rows="3"><?php echo $cover_image; ?></textarea>
                </div>
                <div class="mb-3">
                    <label>หมวดหมู่</label>
                    <textarea name="description" class="form-control" rows="3"><?php echo $category_id; ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                <a href="index.php" class="btn btn-secondary">ยกเลิก</a>
            </form>
        </div>
    </div>
</body>
</html>