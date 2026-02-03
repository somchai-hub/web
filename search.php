<?php session_start(); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ค้นหาสถานที่ท่องเที่ยว</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">Local Travel</a>
            <div class="d-flex">
                <?php if(isset($_SESSION['userid'])): ?>
                    <span class="navbar-text text-white me-3">สวัสดี, <?php echo $_SESSION['username']; ?></span>
                    <a href="logout.php" class="btn btn-outline-light btn-sm">ออกจากระบบ</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-outline-light btn-sm">เข้าสู่ระบบ</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2 class="mb-4">ค้นหาที่เที่ยวโดนใจ</h2>
                <input type="text" name="search_text" id="search_text" class="form-control form-control-lg" placeholder="พิมพ์ชื่อสถานที่, จังหวัด หรือหมวดหมู่..." autocomplete="off">
            </div>
        </div>
        <hr class="my-4">
        <div class="row" id="search_result"></div>
    </div>
    <script>
        $(document).ready(function(){
            // ฟังก์ชันโหลดข้อมูลทั้งหมดตอนเริ่ม
            load_data();

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
            // ดักจับการพิมพ์ในช่องค้นหา (Keyup)
            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != '') {
                    load_data(search); // ส่งคำค้นหาไป
                } else {
                    load_data(); // ถ้าลบคำค้นหาจนหมด ให้โชว์ทั้งหมดเหมือนเดิม
                }
            });
        });
    </script>
</body>
</html>