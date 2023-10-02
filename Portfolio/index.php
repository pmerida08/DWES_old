<?php
    /**
     * 
     * 
     * 
     */

     include('config/config.php');

     $nombre = $datos['nombre'];
     $apellidos = $datos['apellidos'];
     $catprofesional = $datos['catprofesional'];
     $logo = $datos['logo'];
     $email = $datos['email'];
     $telefono = $datos['telefono'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Portfolio</title>
    <link rel="icon" type="image/x-icon" href="./img/logo.jpeg">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>


    <nav class="navbar">
        <div class="logo">
            <?php echo $logo?>
        </div>
        <ul>
            <li><a href="#top">About</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
    
    <main>
        <div class="tags">
            <section id="about">
                <h1>Hi! 👋, </h1>
                <h2>I'm <?php echo $nombre . ' ' . $apellidos?></h2>
                <p>
                    I'm a young boy attempting to learn about web development. Python, HTML, CSS is some of the languages I've just started to learn.
                </p>
                <p>
                    Nowadays, I'm just learning about news things like JavaScript or PHP :D
                </p>
                <h3><?php echo $catprofesional ?></h3>
                <div class="lang">
                    <img src="./img/python.png" alt="Python" width="9%" height="9%">
                    <img src="./img/html.png" alt="HTML" width="9%" height="9%">
                    <img src="./img/css.png" alt="CSS" width="9%" height="9%">
                </div>
                
            </section>
        </div>
        <div class="tags">
            <h2>PROJECTS</h2>
            <div class="group">
                <div id="projects">
                    <div class="project">
                        <img src="img/default_photo.png" alt="default_photo">
                        <h3>Project #1</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod.</p>
                    </div>
                    <div class="project">
                        <img src="img/default_photo.png" alt="default_photo">
                        <h3>Project #2</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod.</p>
                    </div>
                    <div class="project">
                        <img src="img/default_photo.png" alt="default_photo">
                        <h3>Project #3</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod.</p>
                    </div>
                    <div class="project">
                        <img src="img/default_photo.png" alt="default_photo">
                        <h3>Project #4</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod.</p>
                    </div>
                    <div class="project">
                        <img src="img/default_photo.png" alt="default_photo">
                        <h3>Project #5</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod.</p>
                    </div>
                    <div class="project">
                        <img src="img/default_photo.png" alt="default_photo">
                        <h3>Project #6</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="tags">
            <h2>CONTACT</h2> 
            <p>Gmail: <?php echo $email?></p>
            <p>Telefono: <?php echo $telefono?></p>
            <section id="contact">
                <form class="form">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" placeholder="Enter your name: "><br>
                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email" placeholder="Enter your email: "><br>
                    <label for="comments">Comments: </label><br>
                    <textarea name="comments" id="comments" placeholder="Comment here..." cols="30" rows="10"></textarea>
                    <button class="button button1">SUBMIT</button>
                </form>
                
            </section>
        </div>
    </main>
    
    <footer>© Pablo Mérida 2023</footer>
</body>
</html>