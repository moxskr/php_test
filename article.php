<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['article'] ?></title>
</head>
<body>
    
    <?php 

        $conn = new PDO("mysql:host=localhost;dbname=diplom", "root", "");

        $articleLink = $_GET['article'];

        $sql = "SELECT * FROM article WHERE link = :article_link";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":article_link", $articleLink);

        $stmt->execute();

        echo "<span>/".$articleLink."</span>";

        if($stmt->rowCount() > 0) 
        {
            foreach($stmt as $row) {
                $articleName = $row["name"];
                $articleText = $row["fullarticle"];
                $articleLink = $row["link"];
        
                echo "<h2>".$articleName."</h2>";
                echo "<p>".$articleText."</p>";
            }
        }

    ?>

    <a href="/home.php?user=<?php echo $_GET['user']?>">Back to home page</a>

    <hr />

    <h4>Comments</h4>

    <form action="comment.php" method="POST">
        <p>User: <?php echo $_GET['user']?></p>
        <input type="text" value="<?php echo $_GET['user']?>" style="display: none;" name="username">
        <input type="text" value="<?php echo $_GET['article']?>" style="display: none;" name="article">
        <p><textarea name="text" placeholder="Leave comment"></textarea></p>
        <input type="submit" value="Send">
    </form>

    <hr>
    
    <?php 

        $articleLink = $_GET['article'];

        $sql = "SELECT * FROM comments WHERE article = :article_link";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":article_link", $articleLink);

        $stmt->execute();

        if($stmt->rowCount() > 0) 
        {
            foreach($stmt as $row) {
                $username = $row["username"];
                $text = $row["text"];

                echo "<a href='profile.php?user=".$username."'>".$username."</a>";
                echo "<p>".$text."</p>";
                echo "<hr>";
            }
        }

    ?>


</body>
</html>