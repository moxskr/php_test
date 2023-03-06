<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    
    <h2>Home</h2>

    <hr>

    <?php 

    $username = htmlspecialchars($_GET['user']);

    $conn = new PDO("mysql:host=localhost;dbname=diplom", "root", "");

    $sql = "SELECT * FROM article";

    $result = $conn->query($sql);

    foreach($result as $row) {
        $articleName = htmlspecialchars($row["name"]);
        $articleText = htmlspecialchars($row["text"]);
        $articleLink = htmlspecialchars($row["link"]);

        echo "<h4>".$articleName."</h4>";
        echo "<p>".$articleText."</p>";
        echo "<a href=article.php?article=".$articleLink."&user=".$username."> Read more </a>";
        echo "<hr />";
    }

    ?>

</body>
</html>