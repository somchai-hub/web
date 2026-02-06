<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>สมัครสมาชิก - Local Travel</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
            * {
                box-sizing: border-box;
                font-family: "Nunito", sans-serif;
  				font-optical-sizing: auto;
  				font-weight: 400;
 				font-style: normal;
            }
            body {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                background-color: #EBF4DD;
            }
            .container {
                background-color: #90AB8B;
                padding: 10px 20px;
                box-shadow: 0 0 20px #B8DB80;
                border-radius: 10px;
            }
            h1 {
                text-align: center;
                margin-bottom: 30px;
            }
            input[type=text],
            input[type=password],
            input[type=email] {
                width: 100%;
                height: 40px;
                padding: 12px 20px;
                display: inline-block;
                margin: 8px 0px;
            }
            .btn {
                width: 100%;
                padding: 14px 20px;
                margin: 8px 0px;
                border: none;
                cursor: pointer;
                background-color: #3B4953;
                color: white;
            }
            .btn:hover {
                background-color: #5A7863;
            }
            .bottom {
                margin-top: 10px;
            }
            @media (min-width: 668px) {
                .container {
                    width: 300px;
                }
            }
            @media (min-width: 1024px) {
                .container {
                    width: 400px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div id="alertMessage" class="alert alert-danger d-none"></div>
            <form action="process/regis_db.php" method="post" id="regisForm">
                <h1>Register</h1>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <button class="btn" name="register" type="submit">Register</button>
            </form>
            <div class="bottom">
                <span>Already have an account? </span><a href="login.php">login</a>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#regisForm').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "process/regis_db.php",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(response) {
                            if (response.status === 'success') {
                                window.location.href = response.redirect;
                            } else {
                                $('#alertMessage').text(response.message).removeClass('d-none');
                            }
                        },
                        /*error: function() {
                            alert('เกิดข้อผิดพลาดในการเชื่อมต่อระบบ');
                        }*/
                       error: function(xhr, status, error) {
                            console.log(xhr.responseText); 
                            alert('Error: ' + xhr.responseText); 
                        }
                    });
                });
            });
        </script>
    </body>
</html>