<?php
require_once '../includes/client.php';

$output = '';

// เช็คว่ามีการส่งคำค้นหามาไหม
if(isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    
    // SQL ค้นหาจาก ชื่อสถานที่ (name) หรือ สถานที่ตั้ง (location)
    $query = "
    SELECT * FROM attractions
    WHERE name LIKE '%".$search."%'
    OR location LIKE '%".$search."%'
    ORDER BY id DESC
    ";
} else {
    // ถ้าไม่มีคำค้นหา ให้ดึงมาแสดงทั้งหมด
    $query = "SELECT * FROM attractions ORDER BY id DESC";
}

$result = mysqli_query($conn, $query);

// ตรวจสอบจำนวนข้อมูลที่พบ
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
        
        // เช็ครูปภาพ (ถ้าไม่มีรูปให้ใช้รูป Default)
        $img_path = '../uploads/attractions/' . $row['cover_image'];
        if(empty($row['cover_image']) || !file_exists($img_path)){
            $img_path = 'https://via.placeholder.com/300x200?text=No+Image'; // รูปแก้ขัด
        }

        // สร้าง HTML Card สำหรับแต่ละสถานที่
        $output .= '
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="'.$img_path.'" class="card-img-top" alt="'.$row['name'].'" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">'.$row['name'].'</h5>
                    <p class="card-text text-muted"><small>📍 '.$row['location'].'</small></p>
                    <p class="card-text">'.mb_substr($row['description'], 0, 80, 'UTF-8').'...</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-success">'.$row['price_range'].'</span>
                        <a href="../AttractionDetail/attraction_detail.php?id='.$row['id'].'" class="btn btn-sm btn-primary">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
} else {
    // กรณีไม่พบข้อมูล
    $output = '
    <div class="col-12 text-center text-muted mt-5">
        <h4>ไม่พบสถานที่ที่คุณค้นหา :(</h4>
        <p>ลองใช้คำค้นหาอื่น หรือตรวจสอบตัวสะกด</p>
    </div>
    ';
}
echo $output;
?>