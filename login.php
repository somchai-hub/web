<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>เข้าสู่ระบบ - Local Travel</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<style>
		    * {
		        box-sizing: border-box;
  				font-family: "Nunito", sans-serif;
  				font-optical-sizing: auto;
  				font-weight: 400;
 				font-style: normal;
		    }
		    body {
		        justify-content: center;
		        align-items: center;
		        display: flex;
		        min-height: 100vh;
				background-color: #BBE0EF;
		    }
		    .container {
		        background-color: #F4F4F4;
		        box-shadow: 0 0 20px #00B7B5;
		        transform: translate .2s;
		        padding: 10px 20px;
				border-radius: 10px;
		    }
		    .container h1 {
		        text-align: center;
		        margin-bottom: 30px;
		    }
			.container .guest-pf {
				width: 100px;
				height: 100px;
				margin-bottom: 30px;
				display: block;
				margin-left: auto;
				margin-right: auto;
			}
		    input[type=text],
		    input[type=password] {
		        height: 40px;
		        width: 100%;
		        display: inline-block;
		        padding: 12px 20px;
		        margin: 8px 0px;
		    }
		    button {
		        width: 100%;
		        padding: 14px 20px;
		        border: none;
		        cursor: pointer;
		        margin: 8px 0px;
		        background-color: #005461;
		        color: white;
		    }
		    button:hover {
		        background-color: #00B7B5;
		    }
		    .bottom {
		        display: flex;
		        padding-top: 10px;
		        justify-content: space-between;
		        align-items: center;
		        margin: 0;
		        padding-left: 0;
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
			<form id="loginForm" action="process/login_db.php" method="post">
			    <h1>Login</h1>
				<img src="assets/image/profile/guest.png" class="guest-pf">
			    <label for="username">Username:</label>
				<input type="text" id="username" name="username" placeholder="Enter your username" required>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" placeholder="Enter your password" required>
				<button type="submit" name="login">Login</button>
				<div class="bottom">
			        <a href="register.php">Create an account</a>
			    </div>
			</form>
		</div>
		<script>
        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "process/login_db.php",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            window.location.href = response.redirect;
                        } else {
                            $('#alertMessage').text(response.message).removeClass('d-none');
                        }
                    },
                    error: function() {
                        alert('เกิดข้อผิดพลาดในการเชื่อมต่อระบบ');
                    }
                });
            });
        });
    </script>
	</body>
</html>