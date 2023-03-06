<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8">
</head>
<body>
    
    <h2>Login form</h2>
    <form action="home.php" method="POST">
    <p>Enter login: <input type="text" name="login" pattern="[A-Za-z0-9]+" min="4" max="16"/></p>
    <p>Enter password: <input type="password" name="password" pattern="[A-Za-z0-9]+" min="8" max="16"/></p>
    <input type="submit" value="Send">
    </form>     
    <a href="register.php">
        Sign up
    </a>
</form>
</body>
</html>