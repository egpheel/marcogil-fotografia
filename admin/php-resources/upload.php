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
}

$target_dir = "../../img/cats/". $cat ."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if (file_exists($target_file)) {
    echo "O ficheiro já existe.";
    echo "<br /><a href='../'>Voltar</a>";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "O ficheiro é demasiado grande.";
    echo "<br /><a href='../'>Voltar</a>";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Apenas ficheiros JPG, JPEG, PNG & GIF são permitidos.";
    echo "<br /><a href='../'>Voltar</a>";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "O ficheiro não foi enviado.";
    echo "<br /><a href='../'>Voltar</a>";

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "O ficheiro ". basename( $_FILES["fileToUpload"]["name"]). " foi enviado com sucesso.";
        echo "<br /><a href='../'>Voltar</a>";
    } else {
        echo "Ocorreu um erro no envio do ficheiro.";
        echo "<br /><a href='../'>Voltar</a>";
    }
}
?>
