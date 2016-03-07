<?php
  function galleryCat($cat) {
    $directory = new DirectoryIterator('./img/cats/'. $cat .'/');
    foreach ($directory as $fileinfo) {
      if ($fileinfo->isFile()) {
        if (strtolower($fileinfo->getExtension()) == 'jpg' || strtolower($fileinfo->getExtension()) == 'jpeg' || strtolower($fileinfo->getExtension()) == 'png' || strtolower($fileinfo->getExtension()) == 'gif') {
          $pictures[] = $fileinfo->getFilename();
        };
      };
    };

    shuffle($pictures);

    foreach ($pictures as $pic) {
      $temp = explode('.', $pic);
      $ext  = array_pop($temp);
      $pic_name = implode('.', $temp);

      $desc_file = file('./img/cats/'. $cat .'/_desc.txt');

      foreach($desc_file as $line) {
        if (strpos($line, $pic_name) === 0) {
          $desc = explode($pic_name .': ', $line);
        }
      }

      echo '<div data-toggle="modal" data-target="#myModal" class="pic"><img src="./img/cats/'. $cat .'/thumbs/'. $pic .'">';
      echo '<p>'. $desc[1] .'</p>';
      echo '</div>';
    }
  }
?>
