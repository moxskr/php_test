<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
    try{
        $conn = new PDO("mysql:host=localhost;dbname=diplom", "root", "");

        $sql = "INSERT INTO Users (username, password) VALUES (:username, :password)";
        $stmt = $conn->prepare($sql);

        $login = $_POST["login"];
        $password = $_POST["password"];

        $stmt->bindValue(":username", $login);
        $stmt->bindValue(":password", $password);

        $stmt->execute();
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
    
</body>
</html>