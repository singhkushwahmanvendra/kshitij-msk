<?php
require 'registerphp.php'
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
      <form action="register.php" method="POST">
        username: <input type="text" name="username"><br><br>
        password: <input type="password" name="password"><br><br>
        confirm password : <input type="password" name="password_again"><br><br>
        <input type="submit" value="register" class="button" style="cursor:pointer;">
      </form>
    </div>
  </main>
  <footer>
    <div class="container">
      copyright &copy; 2019 MANVENDRA
    </div>
  </footer>
</body>

</html>