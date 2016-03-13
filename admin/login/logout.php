<?php
include_once "../php-resources/db_config.php";

session_start();
if (isset($_SESSION['username']) || isset($_COOKIE[COOKIE_NAME])) {
  session_destroy(); //destroy the session
  setcookie(COOKIE_NAME, '', time() -1); //destroy the cookie
  header('Location: ./../');
} else {
  $errorMsg = "Não tem sessão iniciada.";
  header('Location: ./../php-resources/error.php?err='. $errorMsg);
}
?>
