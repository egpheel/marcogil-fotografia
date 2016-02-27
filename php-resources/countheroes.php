<?php
  $directory = new DirectoryIterator('../img/heroes/');
  foreach ($directory as $fileinfo) {
    if ($fileinfo->isFile()) {
      if ($fileinfo->getExtension() == 'jpg') {
        $heroes[] = $fileinfo->getFilename();
      };
    };
  };

  shuffle($heroes);

  for ($i = 0; $i < count($heroes); $i++) {
    if ($heroes[$i] == 'hero-img1.jpg') {
      $tempFirstPos = $heroes[0];
      $heroes[0] = $heroes[$i];
      $heroes[$i] = $tempFirstPos;
    };
  };

  echo json_encode($heroes);
?>
