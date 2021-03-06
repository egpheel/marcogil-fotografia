<?php
  $uploadOk = 1;

  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      $cat = $_POST["categories"];
      if($check !== false) {
          $uploadOk = 1;
      } else {
          $uploadOk = 0;
      }

      $check = getimagesize($_FILES["thumbToUpload"]["tmp_name"]);
      $cat = $_POST["categories"];
      if($check !== false) {
          $uploadOk = 1;
      } else {
          $uploadOk = 0;
      }
  }

  $target_dir = "../../img/cats/". $cat ."/";
  $foto = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = pathinfo($foto,PATHINFO_EXTENSION);

  $desc_file = $target_dir ."_desc.txt";
  $loc_file = $target_dir ."_loc.txt";

  $temp = explode('.', basename($_FILES["fileToUpload"]["name"]));
  $ext  = array_pop($temp);
  $pic_name = implode('.', $temp);

  $text = $pic_name . ": " . str_replace("\n", "<br />", $_POST["texto"]) . "\r\n";
  $loc = $pic_name . ": " . $_POST["loc"] . "\r\n";

  $target_dir = "../../img/cats/". $cat ."/thumbs/";
  $thumbnail = $target_dir . basename($_FILES["thumbToUpload"]["name"]);
  $imageFileType = pathinfo($thumbnail,PATHINFO_EXTENSION);

  function writeFile($inputfile, $what, $firstline="# INFO FEED FILE\r\n") {
    if(!file_exists($inputfile)) {
      $file = tmpfile();
      file_put_contents($inputfile, $firstline, FILE_APPEND);
    }

    $file = fopen($inputfile, "a+");

    file_put_contents($inputfile, $what, FILE_APPEND);
    fclose($file);
  }

  if (basename($_FILES["fileToUpload"]["name"]) != basename($_FILES["thumbToUpload"]["name"])) {
    echo "O ficheiro e o thumbnail têm de ter o mesmo nome.<br />";
    $uploadOk = 0;
  }

  if (file_exists($foto)) {
      echo "O ficheiro já existe.<br />";
      $uploadOk = 0;
  }

  if ($_FILES["fileToUpload"]["size"] > 1000000) {
      echo "O ficheiro é demasiado grande.<br />";
      $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Apenas ficheiros JPG, JPEG, PNG & GIF são permitidos.<br />";
      $uploadOk = 0;
  }

  if ($uploadOk == 0) {
      echo "O ficheiro não foi enviado.<br />";
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $foto)) {
          echo "O ficheiro ". basename( $_FILES["fileToUpload"]["name"]). " foi enviado com sucesso.<br />";
          writeFile($desc_file, $text);
      } else {
          echo "Ocorreu um erro no envio do ficheiro.<br />";
      }
  }

  if (file_exists($thumbnail)) {
      echo "O thumbnail já existe.<br />";
      $uploadOk = 0;
  }

  if ($_FILES["thumbToUpload"]["size"] > 1000000) {
      echo "O thumbnail é demasiado grande.<br />";
      $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Apenas thumbnails com formato JPG, JPEG, PNG & GIF são permitidos.<br />";
      $uploadOk = 0;
  }

  if ($uploadOk == 0) {
      echo "O thumbnail não foi enviado.";
      echo "<br /><a href='../'>Voltar</a>";
  } else {
      if (move_uploaded_file($_FILES["thumbToUpload"]["tmp_name"], $thumbnail)) {
          echo "O thumbnail ". basename( $_FILES["thumbToUpload"]["name"]). " foi enviado com sucesso.";
          echo "<br /><a href='../'>Voltar</a>";
          writeFile($loc_file, $loc);
      } else {
          echo "Ocorreu um erro no envio do thumbnail.";
          echo "<br /><a href='../'>Voltar</a>";
      }
  }
?>
