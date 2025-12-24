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
                font-family: Sans-Serif;
            }
            body {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            }
            .container {
                
            }
            input[type=text],
            input[type=password],
            input[type=email] {
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form action="#">
                <h1>Register</h1>
                <input type="text" id="username" placeholder="Username" required>
                <input type="email" id="email" placeholder="Email" required>
                <input type="password" id="password" placeholder="Password" required>
                <input type="submit" value="Register">
            </form>
            <div class="bottom">
                <span>Already have an account? </span><a href="login.php">login</a>
            </div>
        </div>
    </body>
</html>