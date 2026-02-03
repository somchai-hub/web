<?php
session_start();
require_once '../includes/client.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT a.*, c.name AS category_name 
        FROM attractions a 
        LEFT JOIN categories c ON a.category_id = c.id 
        WHERE a.id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    echo "<center><h3>ไม่พบข้อมูลสถานที่ท่องเที่ยวนี้</h3><a href='index.php'>กลับหน้าหลัก</a></center>";
    exit();
}

$row = mysqli_fetch_assoc($result);

$img_path = '../uploads/attractions/' . $row['cover_image'];
if (empty($row['cover_image']) || !file_exists($img_path)) {
    $img_path = 'https://via.placeholder.com/800x500?text=No+Image';
}
?>
<?php
session_start();
require_once 'includes/db_connect.php';

// ตัวแปรสำหรับเก็บข้อมูลผู้ใช้ (ค่าเริ่มต้น)
$user_data = [
    'username' => '',
    'email' => '',
    'profile_image' => 'https://cdn-icons-png.flaticon.com/512/149/149071.png' // รูป Default
];

// ถ้าล็อกอินแล้ว ให้ดึงข้อมูลล่าสุดจาก DB
if (isset($_SESSION['userid'])) {
    $uid = $_SESSION['userid'];
    $sql_user = "SELECT * FROM users WHERE id = '$uid'";
    $result_user = mysqli_query($conn, $sql_user);
    
    if (mysqli_num_rows($result_user) > 0) {
        $row_user = mysqli_fetch_assoc($result_user);
        
        $user_data['username'] = $row_user['username'];
        $user_data['email'] = $row_user['email'];
        
        // เช็ครูปโปรไฟล์
        if (!empty($row_user['profile_image']) && file_exists('uploads/profiles/' . $row_user['profile_image'])) {
            $user_data['profile_image'] = 'uploads/profiles/' . $row_user['profile_image'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['name']; ?> - Local Travel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
        .head {
                display: flex;
                align-items: center;
                margin: 0px 5px;
            }
            .head h2 {
                margin: 14px 10px;
                font-family: "Nunito", sans-serif;
  				font-optical-sizing: auto;
  				font-weight: 400;
 				font-style: normal;
            }
            .head button {
                margin: 10px 10px;
                padding: 14px 18px;
                margin-left: auto;
                border: none;
                background-color: #005461;
                border-radius: 5px;
                color: white;
            }
            .head button:hover {
                background-color: #018790;
            }
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #96A78D;
                display: flex;
            }
            ul li {
                float: left;
                font-family: "Nunito", sans-serif;
  				font-optical-sizing: auto;
  				font-weight: 400;
 				font-style: normal;
            }
            ul li a {
                text-decoration: none;
                color: white;
                padding: 14px 16px;
                display: block;
            }
            ul li a:hover {
                background-color: #B6CEB4;
            }
            .bread-l {
                margin: 8px;
            }
        .detail-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .info-card {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body class="bg-light">
    <div class="head">
        <img src="../assets/image/logo/logo.png" width="50px" height="50px" id="logo">
        <span><h2>Local Travel</h2></span>
        <button id="login" onclick="gotoLogin()">Login</button>
    </div>
    <ul>
        <li><a href="index.php">Home</a></l>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
    <div class="container mb-5">
        <nav aria-label="breadcrumb" class="bread-l">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">หน้าแรก</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $row['name']; ?></li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-7 mb-4">
                <img src="<?php echo $img_path; ?>" alt="<?php echo $row['name']; ?>" class="detail-img">
            </div>
            <div class="col-lg-5">
                <div class="info-card h-100">
                    <span class="badge bg-info text-dark mb-2">
                        <i class="fas fa-tag"></i> <?php echo $row['category_name']; ?>
                    </span>
                    
                    <h2 class="fw-bold mb-3"><?php echo $row['name']; ?></h2>
                    
                    <p class="text-muted">
                        <i class="fas fa-map-marker-alt text-danger"></i> <?php echo $row['location']; ?>
                    </p>
                    <h4 class="text-success mb-4">
                        <i class="fas fa-money-bill-wave"></i> <?php echo $row['price_range']; ?>
                    </h4>
                    <?php if(!empty($row['phone_number'])): ?>
                    <p class="fs-5 mb-4">
                        <i class="fas fa-phone-alt text-primary"></i> 
                        <a href="tel:<?php echo $row['phone_number']; ?>" class="text-decoration-none text-dark">
                            <?php echo $row['phone_number']; ?>
                        </a>
                    </p>
                    <?php endif; ?>
                    <hr>
                    <h5 class="fw-bold">รายละเอียด</h5>
                    <p class="text-secondary" style="line-height: 1.8;">
                        <?php echo nl2br($row['description']); ?> 
                        </p>
                    <div class="mt-4 d-grid gap-2">
                        <?php if(!empty($row['map_link'])): ?>
                            <a href="<?php echo $row['map_link']; ?>" target="_blank" class="btn btn-primary btn-lg">
                                <i class="fas fa-location-arrow"></i> นำทางด้วย Google Maps
                            </a>
                        <?php else: ?>
                            <button class="btn btn-secondary btn-lg" disabled>ไม่มีลิงก์แผนที่</button>
                        <?php endif; ?>
                        <a href="../index.php" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> กลับไปหน้าค้นหา
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>