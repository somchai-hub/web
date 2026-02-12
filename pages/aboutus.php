<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../includes/client.php';

// ตัวแปรสำหรับเก็บข้อมูลผู้ใช้
$user_data = [
    'username' => '',
    'email' => '',
    'profile_image' => 'https://cdn-icons-png.flaticon.com/512/149/149071.png'
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
    <title>เกี่ยวกับเรา - Local Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&family=Nunito:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body class="bg-gray-50">
    <!--<nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-center items-center">
            <img src="../assets/image/logo/logo.png" width="50px" height="50px">
            <a href="#" class="text-2xl font-bold text-green-700">Local Travel</a>
            <div class="hidden md:flex space-x-6">
                <a href="../index.html" class="hover:text-green-600">หน้าแรก</a>
                <a href="about.html" class="text-green-600 font-bold">เกี่ยวกับเรา</a>
                <a href="contact.html" class="hover:text-green-600">ติดต่อเรา</a>
            </div>
        </div>
    </nav>-->
    <div class="head">
            <img src="../assets/image/logo/logo.png" width="50px" height="50px" id="logo">
            <span><h2>Local Travel</h2></span>
            <?php if(isset($_SESSION['userid'])): ?>
            <span class="text-black me-3 d-none d-md-block" style="margin-left: auto;">สวัสดี, <?php echo $user_data['username']; ?></span>
            <a href="#" data-bs-toggle="modal" data-bs-target="#profileModal" class="position-relative">
                <img src="<?php echo $user_data['profile_image']; ?>" class="rounded-circle border border-2 border-white shadow-sm" style="width: 45px; height: 45px; object-fit: cover;">
            </a>
            <?php else : ?>
            <span class="text-black me-3 d-none d-md-block" style="margin-left: auto;">สวัสดี, Guest</span>
            <a href="#" data-bs-toggle="modal" data-bs-target="#profileModal" class="position-relative">
                <img src="<?php echo $user_data['profile_image']; ?>" class="rounded-circle border border-2 border-white shadow-sm" style="width: 45px; height: 45px; object-fit: cover;">
            </a>
            <?php endif; ?>
            <?php if(isset($_SESSION['userid'])): ?>
            <button id="login" onclick="gotoLogin()" style="display: none;">Login</button>
            <?php else : ?>
            <button id="login" onclick="gotoLogin()" style="display: block;">Login</button>
            <?php endif; ?>
        </div>
        <?php if(isset($_SESSION['userid'])): ?>
        <div class="modal fade" id="profileModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title"><i class="fas fa-user-edit"></i> แก้ไขโปรไฟล์</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="process/profile_db.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <img src="<?php echo $user_data['profile_image']; ?>" id="previewImg" class="rounded-circle border shadow" style="width: 120px; height: 120px; object-fit: cover;">
                                <div class="mt-3">
                                    <label class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-camera"></i> เปลี่ยนรูป
                                        <input type="file" name="profile_image" id="uploadInput" class="d-none" accept="image/*">
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ชื่อผู้ใช้</label>
                                <input type="text" class="form-control bg-light" value="<?php echo $user_data['username']; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">อีเมล</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $user_data['email']; ?>" required>
                                </div>
                            <hr>
                            <p class="text-muted small mb-2">เปลี่ยนรหัสผ่าน (เว้นว่างไว้ถ้าไม่ต้องการเปลี่ยน)</p>
                            <div class="row">
                                <div class="col-6">
                                    <input type="password" name="new_password" class="form-control form-control-sm" placeholder="รหัสใหม่">
                                </div>
                                <div class="col-6">
                                    <input type="password" name="confirm_password" class="form-control form-control-sm" placeholder="ยืนยันรหัส">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="process/logout.php" class="btn btn-danger me-auto">ออกจากระบบ</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="submit" name="update_profile" class="btn btn-primary">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('uploadInput').onchange = function (evt) {
                var tgt = evt.target || window.event.srcElement,
                files = tgt.files;

                if (FileReader && files && files.length) {
                    var fr = new FileReader();
                    fr.onload = function () {
                        document.getElementById('previewImg').src = fr.result;
                    }
                    fr.readAsDataURL(files[0]);
                }
            }
        </script>
        <?php endif; ?>
        <ul>
            <li><a href="../index.php">หน้าแรก</a></li>
            <li><a href="aboutus.php">เกี่ยวกับเรา</a></li>
            <li><a href="contact.php">ติดต่อเรา</a></li>
        </ul>
    <header class="relative bg-green-800 text-white py-20 text-center">
        <div class="absolute inset-0 bg-cover bg-center opacity-40" style="background-image: url('../uploads/attractions/angkhang.jpg');"></div>
        <div class="relative container mx-auto px-6">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">มนต์เสน่ห์แห่งขุนเขาและสายหมอก</h1>
            <p class="text-lg md:text-xl font-light">สัมผัสวิถีชีวิต ธรรมชาติ และวัฒนธรรมล้านนาที่ฝางและแม่อาย</p>
        </div>
    </header>

    <section class="container mx-auto px-6 py-16">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2">
                <img src="../uploads/attractions/fang_hotspring.jpg" alt="บ่อน้ำพุร้อนฝาง" class="rounded-lg shadow-xl w-full">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-green-800 mb-6">ทำไมต้อง "ฝาง & แม่อาย"?</h2>
                <p class="mb-4 leading-relaxed">
                    เราคือกลุ่มคนรักการท่องเที่ยวที่อยากนำเสนอความงดงามของอำเภอตอนเหนือสุดของเชียงใหม่ 
                    <strong>"ฝาง"</strong> ดินแดนแห่งความหนาวเย็นและบ่อน้ำพุร้อนธรรมชาติ และ 
                    <strong>"แม่อาย"</strong> เมืองชายแดนที่เต็มไปด้วยวัฒนธรรมและวัดวาอารามที่สวยงาม
                </p>
                <p class="leading-relaxed">
                    เว็บไซต์นี้จัดทำขึ้นเพื่อให้ข้อมูลสถานที่ท่องเที่ยว ที่พัก และร้านอาหารเด็ดๆ 
                    เพื่อให้คุณวางแผนการเดินทางมาสัมผัสลมหนาวและไอหมอกได้อย่างสมบูรณ์แบบที่สุด
                </p>
            </div>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">จุดเด่นของเรา</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-green-50 p-8 rounded-lg text-center hover:shadow-lg transition">
                    <div class="text-green-600 text-5xl mb-4">⛰️</div>
                    <h3 class="text-xl font-bold mb-2">ธรรมชาติสมบูรณ์</h3>
                    <p>ดอยอ่างขางและดอยผ้าห่มปก คือสวรรค์ของคนรักเขาและการกางเต็นท์</p>
                </div>
                <div class="bg-orange-50 p-8 rounded-lg text-center hover:shadow-lg transition">
                    <div class="text-orange-600 text-5xl mb-4">⛩️</div>
                    <h3 class="text-xl font-bold mb-2">วัฒนธรรมล้ำค่า</h3>
                    <p>ชมเจดีย์แก้ววัดท่าตอน และวิถีชีวิตชนเผ่าที่หลากหลายในแม่อาย</p>
                </div>
                <div class="bg-blue-50 p-8 rounded-lg text-center hover:shadow-lg transition">
                    <div class="text-blue-600 text-5xl mb-4">♨️</div>
                    <h3 class="text-xl font-bold mb-2">ผ่อนคลายสุขภาพ</h3>
                    <p>อาบน้ำแร่ แช่น้ำร้อนที่อุทยานแห่งชาติแม่ฝาง เพื่อสุขภาพที่ดี</p>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-gray-800 text-white py-8 text-center">
        <p>&copy; 2026 Local Travel. All rights reserved.</p>
    </footer>
    <script>
        function gotoLogin() {
            window.location.href = "../login.php";
        }
	</script>
</body>
</html>