<?php
require 'quiz.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>QUIZ</title>
    <link type="text/css" rel="stylesheet" href="css/question.css" />

</head>

<body>
    <header>
        <div class="container">
            <h1>QUIZ</h1>
        </div>
    </header>
    <main>
        <div class="content" style="
    margin-top:10%;
    margin-left:40%;
    ">
            <h1><strong> COMPLETE </strong></h1>
            </p>
            <br><br>
            <p>
                <strong> USERNAME :
                    <?php echo $user['username']; ?>
                </strong>
            </p>
            <br>
            <p>
                <strong> SCORE :
                    <?php echo $user['score']; ?><br><br
                </strong>
                <a href="logout.php" class="buttton">LOG OUT</a></li>
        </div>
    </main>
    <footer>
        <div class="container">
            copyright &copy; 2019 MANVENDRA
        </div>
    </footer>
</body>

</html>