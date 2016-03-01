<?php
  include '_vars.php';

  if($_POST) {
    $from = strip_tags($_POST['email']);
    $name = strip_tags($_POST['nome']);
    $subject = "Contacto (Marco Gil - Fotografia)";
    $message = $_POST['message'];

    $headers = "From:" . $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $htmlmessage = "<html lang='en'><body>";
    $htmlmessage .= "<h1>Mensagem de <a href='mailto:" . $from . "' style='text-decoration: none; color: #474955'>" . $name . "</a></h1>";
    $htmlmessage .= "<p>" . $message . "</p>";
    $htmlmessage .= "</body></html>";

    //mail($mail,$subject,$htmlmessage,$headers);    //testing purposes, using marco's personal email account
    mail($noreply,$subject,$htmlmessage,$headers); //testing purposes, using nextepisode.pw noreply mail account
  };
?>
