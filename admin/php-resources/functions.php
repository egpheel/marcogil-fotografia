<?php
include_once "db_config.php";
include_once "db_connect.php";

function login() {
  if (isset($_POST["login"])) {
    $email = $_POST["inputEmail"];
    $pass = $_POST["inputPassword"];
    $remember = $_POST["inputRemember"];
    global $db;
    $errorMsg = "";

    $sql = "SELECT username FROM users WHERE email='$email'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $user = $row['username'];

    $sql = "SELECT id FROM users WHERE email='$email'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $user_id = $row['id'];

    $user_id = mysqli_real_escape_string($db, $user_id);

    $email = mysqli_real_escape_string($db, $email);

    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) == 1) {
      // email exists on the db
      $sql = "SELECT password FROM users WHERE email ='$email'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

      $hash = $row['password'];

      if (password_verify($pass, $hash)) {
        //Success!
        $query = mysqli_query($db, "DELETE FROM user_sessions WHERE user_id='$user_id'");

        if (!$remember) { //if remember me is NOT checked
          $_SESSION['username'] = $user;
          header('Location: ./../');
        } else {
          $session_key = generateSessionKey();
          $token = generateToken();

          $query = mysqli_query($db, "INSERT INTO user_sessions (user_id, session_key, token) VALUES ('$user_id', '$session_key', '$token')");
          setcookie(COOKIE_NAME, "$session_key|$token", time() + (3600*24*30)); //30 days
          header('Location: ./../');
        }
      } else {
        $errorMsg = "Password incorrecta.";
        header('Location: ./../php-resources/error.php?err='.$errorMsg);
      }
    } else {
      $errorMsg = "Email incorrecto.";
      header('Location: ./../php-resources/error.php?err='.$errorMsg);
    }
  }
}

function generateSessionKey() {
  $max = (int)str_pad('', strlen(mt_getrandmax()) - 1, 9);
  $min = (int)str_pad('1', strlen($max), 0, STR_PAD_RIGHT);

  $key = '';

  while (strlen($key) < 19) {
    $key .= mt_rand($min, $max);
  }

  return substr($key, 0, 19);
}

function generateToken() {
  $max = (int)str_pad('', strlen(mt_getrandmax()) - 1, 9);
  $min = (int)str_pad('1', strlen($max), 0, STR_PAD_RIGHT);

  $key = '';

  while (strlen($key) < 4) {
    $key .= mt_rand($min, $max);
  }

  return substr($key, 0, 5);
}
?>
