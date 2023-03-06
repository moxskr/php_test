<?php 

    try{
        $conn = new PDO("mysql:host=localhost;dbname=diplom", "root", "");

        $text = $_POST["text"];
        $article = $_POST["article"];
        $username = $_POST["username"];

        // Видалення HTML-тегів з тексту коментаря
        $text = strip_tags($text);

        // Екранування спеціальних символів HTML-коду в тексті коментаря
        $text = htmlspecialchars($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        // Вставка коментаря до бази даних
        $sql = "INSERT INTO comments (text, article, username) VALUES (:text, :article, :username)";
        $stmt = $conn->prepare($sql);
    
        $stmt->bindValue(":text", $text);
        $stmt->bindValue(":article", $article);
        $stmt->bindValue(":username", $username);

        $stmt->execute();
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>


