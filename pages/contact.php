<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ติดต่อเรา - Local Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-700">

    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.html" class="text-2xl font-bold text-green-700">Local Travel</a>
            <div class="hidden md:flex space-x-6">
                <a href="index.html" class="hover:text-green-600">หน้าแรก</a>
                <a href="about.html" class="hover:text-green-600">เกี่ยวกับเรา</a>
                <a href="contact.html" class="text-green-600 font-bold">ติดต่อเรา</a>
            </div>
        </div>
    </nav>

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

</body>
</html>