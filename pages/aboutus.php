<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เกี่ยวกับเรา - Local Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
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
    </style>
</head>
<body class="bg-gray-50 text-gray-700">
<!--
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-green-700">Local Travel</a>
            <div class="hidden md:flex space-x-6">
                <a href="../index.html" class="hover:text-green-600">หน้าแรก</a>
                <a href="about.html" class="text-green-600 font-bold">เกี่ยวกับเรา</a>
                <a href="contact.html" class="hover:text-green-600">ติดต่อเรา</a>
            </div>
        </div>
    </nav>
-->
    <ul>
        <img src="../assets/image/logo/logo.png" width="50px" height="50px">
        <li><a href="../pages/index.php"> หน้าแรก</a></l>
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

</body>
</html>