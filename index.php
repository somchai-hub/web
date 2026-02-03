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
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Local Travel - Home Page</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&family=Nunito:ital@0;1&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: "Noto Sans Thai", sans-serif;
                font-optical-sizing: auto;
                font-weight: 400;
                font-style: normal;
                font-variation-settings: "wdth" 100;
            }
            body {
                background-color: #BFC9D1;
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
            .hero-section {
                width: 100%;
                height: 400px;
                /*background-color: #f4f4f4;*/
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                background-image: url('assets/image/background/background2.jpg'); 
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                overflow: hidden;
            }
            .content-container h1 {
                margin-bottom: 20px;
                color: #efefef;
            }
            .search-box {
                background: white;
                padding: 10px;
                border-radius: 50px;
                box-shadow: 0 4px 10px rgba(0,0,0.1);
                display: flex;
                gap: 10px;
                width: 100%;
                max-width: 500px;
            }
            .search-box input {
                border: none;
                outline: none;
                padding: 10px 15px;
                flex-grow: 1;
                font-size: 16px;
                border-radius: 50px;
            }
            .search-box button {
                background-color: #006666;
                color: white;
                border: none;
                padding: 10px 25px;
                border-radius: 50px;
                cursor: pointer;
                font-size: 16px;
            }
            .search-box button:hover {
                background-color: #004d4d;
            }
            .search-container .row {
                margin: 10px;
            }
            .content-place {
                margin: 12px;
                margin-top: 50px;
            }
            .content-place h2 {
                font-size: 3em;
            }
            .content-place .box {
                display: flex;
                gap: 20px;
                margin-top: 20px;
                align-items: flex-start;
            }
            .content-place .box .desc {
                display: flex;
                flex-direction: column;
            }
            .content-place .box .dp {
                color: #666;
            }
            .content-place .box img {
                width: 500px;
                height: 300px;
                background-size: cover;
                background-position: center;
            }
            @media screen and (max-width: 768px) {
                .hero-section {
                    height: 300px;
                    padding: 0 20px;
                }
                .content-container h1 {
                    font-size: 24px;
                }
                .search-box {
                    flex-direction: column;
                    border-radius: 15px;
                    padding: 15px;
                    width: 100%;
                }
                .search-box input {
                    width: 100%;
                    text-align: center;
                    margin-bottom: 10px;
                    padding: 12px;
                }
                .search-box button {
                    width: 100%;
                    padding: 12px;
                }
            }
        </style>
    </head>
    <body>
        <div class="head">
            <img src="assets/image/logo/logo.png" width="50px" height="50px" id="logo">
            <span><h2>Local Travel</h2></span>
            <span class="text-white me-3 d-none d-md-block">สวัสดี, <?php echo $user_data['username']; ?></span>
            <a href="#" data-bs-toggle="modal" data-bs-target="#profileModal" class="position-relative">
                <img src="<?php echo $user_data['profile_image']; ?>" 
                    class="rounded-circle border border-2 border-white shadow-sm" 
                    style="width: 45px; height: 45px; object-fit: cover;">
            </a>
            <button id="login" onclick="gotoLogin()">Login</button>
        </div>
        <?php if(isset($_SESSION['userid'])): ?>
        <div class="modal fade" id="profileModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title"><i class="fas fa-user-edit"></i> แก้ไขโปรไฟล์</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="profile_db.php" method="POST" enctype="multipart/form-data">
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
                            <a href="logout.php" class="btn btn-danger me-auto">ออกจากระบบ</a>
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
            <li><a href="index.php">Home</a></l>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <section class="hero-section">
            <div class="content-container">
                <h1>ค้นหาที่เที่ยวในฝันของคุณ</h1>
                <div class="search-box">
                    <input type="text" name="search" id="search_text" placeholder="คุณอยากไปเที่ยวที่ไหน?">
                    <button>ค้นหา</button>
                </div>
	        </div>
            <script>
                $(document).ready(function() {
                    //load_data();
                    function load_data(query) {
                        $.ajax({
                            url: "search_db.php",
                            method: "POST",
                            data: {query: query},
                            success: function(data){
                                $('#search_result').html(data);
                            }
                        });
                    }
                    $('#search_text').keyup(function(){
                        var search = $(this).val();
                        if(search != '') {
                            load_data(search);
                        } else {
                            //load_data();
                            $('#search_result').html('');
                        }
                    });
                });
            </script>
        </section>
        <div class="-container">
            <hr class="my-4">
            <div class="row" id="search_result"></div>
        </div>
        <div class="content-place">
            <h2>สถานที่ท่องเที่ยว ฝาง</h2>
            <div class="box">
                <img src="uploads/attractions/place1.jpg">
                <div class="desc">
                    <h3>ดอยอ่างขาง</h3>
                    <p class="dp">ภูเขา</p>
                </div>
            </div>
            <div class="box">
                <img src="uploads/attractions/place2.jpg">
                <div class="desc">
                    <h3>อุทยานแห่งชาติดอยผ้าห่มปก</h3>
                    <p class="dp">อุทยานแห่งชาติ</p>
                </div>
            </div>
            <div class="box">
                <img src="uploads/attractions/fang_hotspring.jpg">
                <div class="desc">
                    <h3>น้ำพุร้อนฝาง</h3>
                    <p class="dp">บ่อน้ำร้อนและน้ำพุร้อน</p>
                </div>
            </div>
            <div class="box">
                <img src="uploads/attractions/place3.jpg">
                <div class="desc">
                    <h3>สถานีเกษตรหลวงอ่างขาง</h3>
                    <p class="dp">ฟาร์ม</p>
                </div>
            </div>
        </div>
        <script>
            function gotoLogin() {
                window.location.href = "login.php";
            }
        </script>
    </body>
</html>
