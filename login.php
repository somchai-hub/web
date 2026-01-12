<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=content-width, initial-scale=1">
		<title>Local Travel - Login Page</title>
		<style>
		    * {
		        box-sizing: border-box;
		        font-family: Sans-Serif;
		    }
		    body {
		        justify-content: center;
		        align-items: center;
		        display: flex;
		        min-height: 100vh;
		    }
		    .container {
		        background-color: #F4F4F4;
		        box-shadow: 0 0 20px #00B7B5;
		        transform: translate .2s;
		        padding: 10px 20px;
		    }
		    .container h1 {
		        text-align: center;
		        margin-bottom: 30px;
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
		    .bottom-remem {
		        display: flex;
		        align-items: center;
		        gap: 4px;
		        cursor: pointer;
		    }
	        @media (min-width: 668px) {
                .container {
                    width: 500px;
                }
            }
            @media (min-width: 1024px) {
                .container {
                    width: 600px;
                }
            }
		</style>
	</head>
	<body>
		<div class="container">
			<form action="#">
			    <h1>Login</h1>
			    <label for="username">Username:</label>
				<input type="text" id="username" placeholder="Enter your username" required>
				<label for="password">Password:</label>
				<input type="password" id="password" placeholder="Enter your password" required>
				<button type="submit">Login</button>
				<div class="bottom">
				    <div class="bottom-remem">
				        <input type="checkbox" name="remember">
				        <span> Remember me</span>
				    </div>
			        <a href="register.php">Create an account</a>
			    </div>
			</form>
		</div>
	</body>
</html>