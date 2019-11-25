<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/cama.css">
</head>
<body>
    <div>
        <form method="POST" action="signup.php">
            <input type="text" name="name" placeholder="Name" required/>
            <input type="password" name="password" placeholder="Password" required/>
            <br>
            <input type="email" name="email" placeholder="Email" required/>
            <input type="password" name="password2" placeholder="Confirm Password" required/>
            <input type="submit" name="register" value="Register" />
        </form>
    </div>
    <br>
    <div>
        <form method="POST" action="signin.php">
            <input type="email" name="email" placeholder="Email" required/>
            <input type="password" name="password" placeholder="Password" required/>
            <input type="submit" name="login" value="Login" />
        </form>
    </div>
</body>
</html>