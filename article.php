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

    $articleLink = htmlentities($_GET['article'], ENT_QUOTES, 'UTF-8');

    $sql = "SELECT * FROM article WHERE link = :article_link";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(":article_link", $articleLink);

    $stmt->execute();

    echo "<span>/".htmlentities($articleLink, ENT_QUOTES, 'UTF-8')."</span>";

    if($stmt->rowCount() > 0) 
    {
        foreach($stmt as $row) {
            $articleName = $row["name"];
            $articleText = $row["fullarticle"];
            $articleLink = $row["link"];

            echo "<h2>".htmlentities($articleName, ENT_QUOTES, 'UTF-8')."</h2>";
            echo "<p>".htmlentities($articleText, ENT_QUOTES, 'UTF-8')."</p>";
        }
    }

    ?>

    <a href="/home.php?user=<?php echo htmlentities($_GET['user'], ENT_QUOTES, 'UTF-8'); ?>">Back to home page</a>

    <hr />

    <h4>Comments</h4>

    <form action="comment.php" method="POST">
        <p>User: <?php echo htmlentities($_GET['user'], ENT_QUOTES, 'UTF-8'); ?></p>
        <input type="text" value="<?php echo htmlspecialchars($_GET['user'], ENT_QUOTES, 'UTF-8'); ?>" style="display: none;" name="username">
        <input type="text" value="<?php echo htmlspecialchars($_GET['article'], ENT_QUOTES, 'UTF-8'); ?>" style="display: none;" name="article">
    </form>

    <hr>
    
    <?php 

        $articleLink = htmlentities($_GET['article'], ENT_QUOTES, 'UTF-8');

        $sql = "SELECT * FROM comments WHERE article = :article_link";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":article_link", $articleLink);

        $stmt->execute();

        if($stmt->rowCount() > 0) 
        {
            foreach($stmt as $row) {
                $username = $row["username"];
                $text = $row["text"];

                echo "<a href='profile.php?user=".htmlentities($username, ENT_QUOTES, 'UTF-8')."'>".htmlentities($username, ENT_QUOTES, 'UTF-8')."</a>";
                echo "<p>".htmlentities($username, ENT_QUOTES, 'UTF-8')."</p>";
                echo "<hr>";
            }
        }

    ?>


</body>
</html>