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
                background-image: url('image/background/background2.jpg'); 
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
                width: 50%;
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
            <img src="image/logo/logo.png" width="50px" height="50px" id="logo">
            <span><h2>Local Travel</h2></span>
            <button id="login" onclick="gotoLogin()">Login</button>
        </div>
        <ul>
            <li><a href="index.php">Home</a></l>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <section class="hero-section">
            <div class="content-container">
                <h1>ค้นหาที่เที่ยวในฝันของคุณ</h1>
                <div class="search-box">
                    <input type="text" placeholder="คุณอยากไปเที่ยวที่ไหน?">
                    <button>ค้นหา</button>
                </div>
            </div>
        </section>
        <div class="content-place">
            <h2>สถานที่ท่องเที่ยว ฝาง</h2>
            <div class="box">
                <img src="image/places/place1.jpg">
                <div class="desc">
                    <h3>ดอยอ่างขาง</h3>
                    <p class="dp">ภูเขา</p>
                </div>
            </div>
            <div class="box">
                <img src="image/places/place2.jpg">
                <div class="desc">
                    <h3>อุทยานแห่งชาติดอยผ้าห่มปก</h3>
                    <p class="dp">อุทยานแห่งชาติ</p>
                </div>
            </div>
            <div class="box">
                <img src="image/places/fang-hot-spring.jpg">
                <div class="desc">
                    <h3>น้ำพุร้อนฝาง</h3>
                    <p class="dp">บ่อน้ำร้อนและน้ำพุร้อน</p>
                </div>
            </div>
            <div class="box">
                <img src="image/places/place3.jpg">
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