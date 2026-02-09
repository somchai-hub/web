<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once 'includes/client.php';

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
        <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        <div class="head">
            <img src="assets/image/logo/logo.png" width="50px" height="50px" id="logo">
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
            <li><a href="pages/index.php">Home</a></l>
            <li><a href="pages/about.php">About</a></li>
            <li><a href="pages/contact.php">Contact</a></li>
        </ul>
        <section class="hero-section">
            <div class="content-container">
                <h1>ค้นหาที่เที่ยวในฝันของคุณ</h1>
                <div class="search-box">
                    <input type="text" name="search" id="search_text" placeholder="คุณอยากไปเที่ยวที่ไหน?">
                    <button id="s-btn">ค้นหา</button>
                </div>
	        </div>
            <script>
                $(document).ready(function() {
                    //load_data();
                    function load_data(query) {
                        $.ajax({
                            url: "process/search_db.php",
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
        <h2>สถานที่ท่องเที่ยว ฝาง</h2>
        <div class="content-place">
            <div class="box">
                <a href="#"><img src="uploads/attractions/place1.jpg"></a>
                <div class="desc">
                    <h3>ดอยอ่างขาง</h3>
                    <p class="dp">ภูเขา</p>
                </div>
            </div>
            <div class="box">
                <a href="AttractionDetail/attraction_detail.php?id=2"><img src="uploads/attractions/fang_hotspring.jpg"></a>
                <div class="desc">
                    <h3>น้ำพุร้อนฝาง</h3>
                    <p class="dp">บ่อน้ำร้อนและน้ำพุร้อน</p>
                </div>
            </div>
            <div class="box">
                <a href="AttractionDetail/attraction_detail.php?id=1"><img src="uploads/attractions/angkhang.jpg"></a>
                <div class="desc">
                    <h3>สถานีเกษตรหลวงอ่างขาง</h3>
                    <p class="dp">ฟาร์ม</p>
                </div>
            </div>
            <div class="box">
                <a href="AttractionDetail/attraction_detail.php?id=10"><img src="uploads/attractions/nor_lae_strawberry.jpg"></a>
                <div class="desc">
                    <h3>ไร่สตรอเบอร์รี่บ้านนอแล</h3>
                    <p class="dp">ฟาร์ม</p>
                </div>
            </div>
            <div class="box">
                <a href="AttractionDetail/attraction_detail.php?id=13"><img src="uploads/attractions/mae_mao_dam.jpg"></a>
                <div class="desc">
                    <h3>เขื่อนแม่มาว</h3>
                    <p class="dp"></p>
                </div>
            </div>
            <div class="box">
                <a href="AttractionDetail/attraction_detail.php?id=14"><img src="uploads/attractions/wat_si_bun_rueang.jpg"></a>
                <div class="desc">
                    <h3>วัดศรีบุญเรือง</h3>
                    <p class="dp">วัด</p>
                </div>
            </div>
            <div class="box">
                <a href="AttractionDetail/attraction_detail.php?id=20"><img src="uploads/attractions/huay_bon_cave.jpg"></a>
                <div class="desc">
                    <h3>ถ้ำห้วยบอน</h3>
                    <p class="dp">ถ้ำ</p>
                </div>
            </div>
            <div class="box">
                <a href="AttractionDetail/attraction_detail.php?id=12"><img src="uploads/attractions/doi_san_ju.jpg"></a>
                <div class="desc">
                    <h3>ดอยสันจุ๊</h3>
                    <p class="dp">ภูเขา</p>
                </div>
            </div>
        </div>
        <script>
            function gotoLogin() {
                window.location.href = "login.php";
            }
	    </script>
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
