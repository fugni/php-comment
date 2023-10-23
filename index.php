<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php comment section</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div id="content">
        <div id="video">
            <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/iRDJzPbn5jw?si=vYFbR19oD7gtwpeD" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <p>"What's Up" is a violation of the Geneva Conventions</p>
        </div>
        <div id="comment-container">
            <div id="comment-input">
                <form action="" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name">
                    <label for="email">Email:</label>
                    <input type="email" id="email">
                    <br>
                    <label for="commentation">Comment:</label>
                    <input type="text" id="commentation">
                    <br>
                    <input type="submit" value="Submit!">
                </form>
            </div>
            <div id="comments">

            </div>
        </div>
    </div>
</body>
</html>