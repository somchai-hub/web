<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Local Travel - Register Page</title>
        <style>
            * {
                box-sizing: border-box;
                font-family: sans-serif;
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
            <form action="regis_db.php" method="post">
                <h1>Register</h1>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <button class="btn" name="register">Register</button>
            </form>
            <div class="bottom">
                <span>Already have an account? </span><a href="login.php">login</a>
            </div>
        </div>
    </body>
</html>