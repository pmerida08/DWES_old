<?php
    /**
    *   autor: Pablo Mérida Velasco
    *   
    *
    */

    $email = "pablomerida03@gmail.com";
    $phone = "657765765";
    $name = "Pablo";
    $lastname = "Merida Velasco";
    $linkdn = "https://www.linkedin.com/in/pablo-m%C3%A9rida-10a2ab221/";
    $twitter = "https://twitter.com/pmerida_";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pablo Mérida Velasco</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo $name. " ". $lastname?></h1>
    <div class="info">
        <h2>Información</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque enim rerum impedit voluptatibus, quae quam velit. Totam tenetur temporibus, id repudiandae tempore perspiciatis nemo non animi. Aliquid placeat laboriosam ipsa.
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic voluptates harum nulla a velit quo sit perspiciatis error quam officiis, dolorum natus facere ad minima assumenda iusto consequatur eaque. Doloremque.
        </p>
    </div>
    <div class="skills">
        <h2>Skills</h2>
        <ul>
            <li>Python</li>
            <li>HTML & CSS</li>
            <li>JavaScript</li>
        </ul>
    </div>
    <div class="contactos">
        <h2>Contactos</h2>
        <ul>
            <li><a href="<?php echo $twitter ?>">Twitter</a></li>
            <li><a href="<?php echo $linkdn ?>">Linkdn</a></li>
            <li>Phone: <?php echo $phone ?></li>
            <li>Email: <?php echo $email ?></li>
        </ul>
    </div>

    </body>
</html>