<?php
  if (isset($_GET['d']) && isset($_GET['c'])) {
    $pic = $_GET['d'];
    $cat = $_GET['c'];

    $temp = explode('.', $pic);
    $ext  = array_pop($temp);
    $pic_name = implode('.', $temp);

    $desc = '../../img/cats/'. $cat .'/_desc.txt';
    $loc = '../../img/cats/'. $cat .'/_loc.txt';
    $desc_file = file($desc, FILE_IGNORE_NEW_LINES);
    $loc_file = file($loc, FILE_IGNORE_NEW_LINES);
    $new_desc = array();
    $new_loc = array();

    foreach ($desc_file as $line) {
      if (strpos($line, $pic_name) !== 0) {
        $new_desc[] = $line ."\r\n";
      };
    };

    foreach ($loc_file as $line) {
      if (strpos($line, $pic_name) !== 0) {
        $new_loc[] = $line ."\r\n";
      };
    };

    if (unlink('../../img/cats/'. $cat .'/'. $pic) && unlink('../../img/cats/'. $cat .'/thumbs/'. $pic)) {
      $file = fopen($desc, 'a+');
      file_put_contents($desc, $new_desc);
      fclose($file);

      $file = fopen($loc, 'a+');
      file_put_contents($loc, $new_loc);
      fclose($file);

      echo '<p>O ficheiro '. $pic .' foi apagado com sucesso.</p>';
    } else {
      echo '<p>Ocorreu um erro ao tentar apagar o ficheiro '. $pic .'.</p>';
    };
  };
?>
