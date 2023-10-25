<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php comment section</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <?php

        require 'vendor/autoload.php';

        use Carbon\Carbon;

        $servername = "localhost";
        $username = "root";
        $password = "";     

        try {
            $conn = new PDO("mysql:host=$servername;dbname=comment-section", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            die("Connection failed: " . $e->getMessage());
        }
    ?>

    <div id="content">
        <div id="video">
            <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/iRDJzPbn5jw?si=vYFbR19oD7gtwpeD" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <h3>"What's Up" is a violation of the Geneva Conventions</h3>
        </div>
        <div id="comment-container">
            <div id="comment-input">
                <form action="" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                    <br>    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    <br>
                    <label for="commentation">Comment:</label>
                    <br>
                    <textarea id="commentation" name="commentation"></textarea>
                    <br>
                    <input type="submit" name="submit" value="Submit!">
                </form>
                <?php 
                    if (isset($_POST["submit"]))
                        $name = $_POST["name"];
                        $email = $_POST["email"];
                        $commentation = $_POST["commentation"];
                        $commenttime = Carbon::now();

                        $sql = $conn->prepare("INSERT INTO `comments`(`name`, `email`, `comment-text`, `comment-time`) VALUES ('$name','$email','$commentation','$commenttime')");
                        $sql->execute();
                ?>

            </div>
            <div id="comments">
                <h3>Comments</h1>

                <?php
                    $sql = $conn->prepare("SELECT * FROM comments");
                    $sql->execute();
                    $result = $sql->fetchAll();

                    foreach ($result as $row) {
                        echo "<div class='comment'>";
                        echo "<span><b>".$row['name']."</b></span><br>";
                        echo "<span>".Carbon::createFromDate($row['comment-time'])->diffForHumans()."</span>";
                        echo "<p>".$row['comment-text']."</p>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>