<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ดอยอ่างขาง - Local Travel</title>
        <style>
            * {
                font-family: Sans-Serif;
                margin: 0;
                padding: 0;
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
            .container {
                display: flex;
                align-items: center;
                flex-direction: column;
            }
            .container h1 {
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .container .box {
                display: flex;
                gap: 20px;
            }
            .container .box img {
                width: 50%;
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
        <div class="container">
            <h1>ดอยอ่างขาง</h1>
            <div class="box">
                <img src="image/places/doiangkhang.jpeg">
                <div class="desc">
                    <p>ดอยอ่างขาง ที่เชียงใหม่ คือ สถานีเกษตรหลวงอ่างขาง โครงการหลวงแห่งแรกที่พัฒนาพื้นที่สูงให้เป็นแหล่งวิจัยพืชเมืองหนาว มีอากาศเย็นสบายตลอดปี และเป็นแหล่งท่องเที่ยวธรรมชาติที่สวยงาม มีจุดเด่นคือแปลงดอกไม้เมืองหนาว (เช่น ซากุระแท้, นางพญาเสือโคร่ง) ไร่ชา 2000 ชุมชนชาวเขา และจุดชมวิวชายแดนไทย-พม่า สามารถเที่ยวได้ทุกฤดู โดยเฉพาะหน้าหนาว (พ.ย.-ก.พ.) ที่อากาศหนาวจัดและดอกไม้บานสะพรั่ง</p>
                </div>
            </div>
        </div>
    </body>
</html>