<?php
/**
 * 
 * @author Pablo Merida
 * 
 */

 if (!isset($_POST['submit'])) {
    header("Location: upload_file.php");
 }

define("UPLOAD", "upload/");
define("MAX_SIZE", "200000");

$ext_allowed = array(
    "gif", "jpeg", "jpg", "png", "nef", "raw" 
);

$formats = array(
    "image/gif", "image/jpg", "image/jpeg", "image/png", "image/nef", "image/raw"
);


$aux = explode(".", $_FILES["file"]["name"]);
$ext = end($aux);


if ($_FILES['file']['size'] < MAX_SIZE && in_array($ext, $ext_allowed) && in_array($_FILES['file']['type'], $formats)) {
    
    if ($_FILES['file']['error'] > 0) {
        echo 'Se ha producido un error'. $_FILES['file']['error']."."; 
    } else {
        $filename = uniqid().".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if (file_exists(UPLOAD.$filename)) {
            echo 'El fichero ya existe maquinon';
            
        }else {       
            move_uploaded_file($_FILES['file']['tmp_name'], UPLOAD.$filename);
        }
    }
} else {
    echo 'Tamaño o formato incorrecto';
}

echo '<br><a href="formSubida.php">Volver</a>';
?>
