<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormSubida</title>
</head>
<body>
    <h1>Subida de archivos</h1>
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <label for="file">Filename: </label>
        <input type="file" name="file" id="file"><br>
        <button type="submit" name="submit">Enviar</button>
    </form>
    <h2>Galería de imágenes</h2>
    <?php
        define("UPLOAD", "upload/");
        $files = scandir(UPLOAD);

        foreach ($files as $f) {
            if ($f !== '.' && $f !== '..') {
                echo '<img src='.UPLOAD.$f.'>';        
            } 
        }
    ?>
    
</body>
</html>