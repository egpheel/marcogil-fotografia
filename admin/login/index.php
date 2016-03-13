<?php
include_once "../php-resources/functions.php";

session_start();

if(isset($_SESSION['username'])) {
  header("Location: ./../");
  exit;
} else if (isset($_COOKIE[COOKIE_NAME])) {
  header("Location: ./../");
  exit;
}

$_SESSION['origin_page'] = $_SERVER['REQUEST_URI'];

login();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!--my JS-->
    <script src="js/functions.js"></script>
    <!--my CSS-->
    <link rel="stylesheet" href="css/layout.css">
    <title>Marco Gil - Painel de administração</title>
  </head>

<body>
  <div class="container">
    <div class="col-md-4 col-md-offset-4">
      <form method="post">
        <h2>Login</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Entrar</button>
      </form>
    </div>
  </div>
</body>

</html>
