<?php
  $directory = new DirectoryIterator('../img/heroes/');
  $num = 0;
  foreach ($directory as $fileinfo) {
    if ($fileinfo->isFile()) {
      if ($fileinfo->getExtension() == 'jpg') {
        $num++;
      };
    };
  };

  echo $num;
?>
