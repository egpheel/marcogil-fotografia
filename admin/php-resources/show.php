<?php
  if (isset($_GET['e'])) {
    $cat = $_GET['e'];

    $dir = '../../img/cats/'. $cat .'/';

    if (count(glob($dir .'*')) > 3) {

      $directory = new DirectoryIterator($dir);
      foreach ($directory as $fileinfo) {
        if ($fileinfo->isFile()) {
          if (strtolower($fileinfo->getExtension()) == 'jpg' || strtolower($fileinfo->getExtension()) == 'jpeg' || strtolower($fileinfo->getExtension()) == 'png' || strtolower($fileinfo->getExtension()) == 'gif') {
            $pictures[] = $fileinfo->getFilename();
          };
        };
      };

      foreach ($pictures as $pic) {
        echo '<div class="pic-wrap" id='. $pic .'>';
        echo '<img src="../img/cats/'. $cat .'/thumbs/' . $pic .'">';
        echo '<p>'. $pic . '</p>';
        echo '<input type="button" class="btn btn-default" id="delBtn" value="Apagar">';
        echo '</div>';
      };
    } else {
      echo '<p>Não existem fotografias nesta categoria</p>';
    };
  };
?>
