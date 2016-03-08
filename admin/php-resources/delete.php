<?php
  if (isset($_GET['d'])) {
    $del = $_GET['d'];

    //unlink('../../img/cats/'. $cat .'/'. $del);

    echo 'O ficheiro '. $del .' foi apagado com sucesso.';
  };
?>
