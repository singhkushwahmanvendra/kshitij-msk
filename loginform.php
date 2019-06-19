<?php
require 'loginphp.php'
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
      <form action="<?php echo $current_file; ?>" method="POST">
        Username : <input type="text" name="username"><br><br>
        Password : <input type="password" name="password"><br><br>
        <input type="submit" value="Log In" class="button" style="cursor:pointer;"><br><br>
      </form>
      <a href="register.php">register</a>
    </div>
  </main>
  <footer>
    <div class="container">
      copyright &copy; 2019 MANVENDRA
    </div>
  </footer>
</body>        
</html>