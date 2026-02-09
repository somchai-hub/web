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
}

$result = mysqli_query($conn, $query);

// ตรวจสอบจำนวนข้อมูลที่พบ
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
        
        $img_path = '../uploads/attractions/' . $row['cover_image'];
        if(empty($row['cover_image']) || !file_exists($img_path)){
            $img_path = 'https://via.placeholder.com/300x200?text=No+Image'; // รูปแก้ขัด
        }

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
/**
 * ฟังก์ชันตรวจสอบว่าจุด (Lat, Lon) อยู่ใน Polygon หรือไม่
 */
    function isPointInPolygon($point, $polygon) {
        $x = $point[0]; // Longitude
        $y = $point[1]; // Latitude
        $inside = false;

    // ลูปเช็กตามจุดพิกัดใน GeoJSON
        for ($i = 0, $j = count($polygon) - 1; $i < count($polygon); $j = $i++) {
            $xi = $polygon[$i][0]; $yi = $polygon[$i][1];
            $xj = $polygon[$j][0]; $yj = $polygon[$j][1];

            $intersect = (($yi > $y) != ($yj > $y))
            && ($x < ($xj - $xi) * ($y - $yi) / ($yj - $yi) + $xi);
            if ($intersect) $inside = !$inside;
        }
        return $inside;
    }

// 1. รับค่าค้นหาจากผู้ใช้
    $search_query = $_GET['search'] ?? '';
    if (!$search_query) {
        $output = '
        <div class="col-12 text-center text-muted mt-5">
            <h4>ไม่พบสถานที่ที่คุณค้นหา :(</h4>
            <p>ลองใช้คำค้นหาอื่น หรือตรวจสอบตัวสะกด</p>
        </div>
        ';
    }

// 2. แปลงชื่อสถานที่ให้เป็นพิกัด (Geocoding)
    $url = "https://nominatim.openstreetmap.org/search?format=json&q=" . urlencode($search_query . " เชียงใหม่");
    $opts = [
        "http" => ["header" => "User-Agent: MyPHPScript/1.0\r\n"]
    ];
    $context = stream_context_create($opts);
    $response = file_get_contents($url, false, $context);
    $geo_results = json_decode($response, true);

    if (empty($geo_results)) {
        $output = '
        <div class="col-12 text-center text-muted mt-5">
            <h4>ไม่พบสถานที่ที่คุณค้นหา :(</h4>
            <p>ลองใช้คำค้นหาอื่น หรือตรวจสอบตัวสะกด</p>
        </div>
        ';
    }

    $lat = $geo_results[0]['lat'];
    $lon = $geo_results[0]['lon'];

    $geo_data = json_decode(file_get_contents('../includes/fang.json'), true);
    $fang_polygon = $geo_data['features'][0]['geometry']['coordinates'][0]; 
    $isInFang = isPointInPolygon([$lon, $lat], $fang_polygon);

// 5. แสดงผล
//echo "<h3>ผลการตรวจสอบ: $search_query</h3>";
//echo "พิกัดที่พบ: $lat, $lon <br>";
    if ($isInFang) {
        $output = "<b style='color:green;'>✅ สถานที่นี้อยู่ในเขตอำเภอฝาง</b>";
    } else {
        $output = "<b style='color:red;'>❌ สถานที่นี้ไม่อยู่ในเขตอำเภอฝาง</b>";
    }
}
echo $output;
?>