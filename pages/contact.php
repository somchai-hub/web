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
    <title>ติดต่อเรา - Local Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            font-variation-settings: "width" 100;
        }
        .head {
            display: flex;
            align-items: center;
            margin: 0px 5px;
        }
        .head h2 {
            margin: 14px 10px;
        }
        .head button {
            margin: 10px 10px;
            padding: 14px 18px;
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
    </style>
</head>
<body class="bg-gray-50">
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
                    <form action="../process/profile_db.php" method="POST" enctype="multipart/form-data">
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
                            <a href="../process/logout.php" class="btn btn-danger me-auto">ออกจากระบบ</a>
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
    <header class="bg-green-700 text-white py-12 text-center">
        <h1 class="text-3xl md:text-4xl font-bold">ติดต่อสอบถาม</h1>
        <p class="mt-2 text-green-100">มีคำถามเกี่ยวกับการเดินทาง? ทักหาเราได้เลย</p>
    </header>
    <section class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-6">ข้อมูลการติดต่อ</h2>
                <p class="mb-6">
                    หากคุณต้องการโปรโมทสถานที่ท่องเที่ยว ร้านอาหาร หรือต้องการข้อมูลเพิ่มเติมเกี่ยวกับการเดินทางในอำเภอฝางและแม่อาย สามารถติดต่อเราได้ตามช่องทางด้านล่าง
                </p>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <span class="text-green-600 text-xl mr-4">📍</span>
                        <p>อ.ฝาง จ.เชียงใหม่ 50110</p>
                    </div>
                    <div class="flex items-start">
                        <span class="text-green-600 text-xl mr-4">📞</span>
                        <p>065-485-8563 (คุณแอดมิน)</p>
                    </div>
                    <div class="flex items-start">
                        <span class="text-green-600 text-xl mr-4">✉️</span>
                        <p>chaisn1207@gmail.com</p>
                    </div>
                    <div class="flex items-start">
                        <span class="text-green-600 text-xl mr-4">🔵</span>
                        <p>Facebook Fanpage: Local Travel</p>
                    </div>
                </div>
                <div class="mt-8 bg-gray-200 rounded-lg overflow-hidden h-64 shadow-inner">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d239659.87676767676!2d99.0!3d19.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da650226388905%3A0x30346c5fa8a67e0!2sFang%20District%2C%20Chiang%20Mai!5e0!3m2!1sen!2sth!4v1234567890" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">ส่งข้อความถึงเรา</h3>
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">ชื่อ-นามสกุล</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" id="name" type="text" placeholder="ระบุชื่อของคุณ">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">อีเมล</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" id="email" type="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">หัวข้อเรื่อง</label>
                        <select class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500" id="subject">
                            <option>สอบถามข้อมูลท่องเที่ยว</option>
                            <option>แนะนำร้านอาหาร/ที่พัก</option>
                            <option>ติดต่อลงโฆษณา</option>
                            <option>อื่นๆ</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="message">ข้อความ</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" id="message" rows="5" placeholder="พิมพ์ข้อความของคุณที่นี่..."></textarea>
                    </div>
                    <div class="flex items-center justify-end">
                        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline transition" type="button">
                            ส่งข้อความ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer class="bg-gray-800 text-white py-8 text-center mt-8">
        <p>&copy; 2026 Local Travel. All rights reserved.</p>
    </footer>
    <script>
        function gotoLogin() {
            window.location.href = "../login.php";
        }
	</script>
</body>
</html>