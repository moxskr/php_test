
<?php 

    try{
        $conn = new PDO("mysql:host=localhost;dbname=diplom", "root", "");

        $sql = "INSERT INTO comments (text, article, username) VALUES (:text, :article, :username)";
        $stmt = $conn->prepare($sql);

        $text = $_POST["text"];
        $article = $_POST["article"];
        $username = $_POST["username"];
    
        $stmt->bindValue(":text", $text);
        $stmt->bindValue(":article", $article);
        $stmt->bindValue(":username", $username);

        $stmt->execute();
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>