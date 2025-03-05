<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
    <link href="../css/screen.css" type="text/css" rel="stylesheet" />
    <link href="../css/sidebar.css" type="text/css" rel="stylesheet" />
    <link href="../css/blog.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/favicon.ico" />
</head>

<body>

    <section id="wrapper">
        <header id="header">
            <div class="top">
                <nav>
                    <ul class="navigation">
                        <li><a href="index_sb.php">Home</a></li>
                        <li><a href="about_sb.php">About</a></li>
                        <li><a href="contact_sb.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <hgroup>
                <h2><a href="index_sb.php/">symblog</a></h2>
                <h3><a href="index_sb.php/">creating a blog in Symfony2</a></h3>
            </hgroup>
        </header>

        <section class="main-col">

            <?php
            $blogs = $data['blogs'];
            foreach ($blogs as $blog) {
                echo "<article class='blog'>";
                echo "<h2>" . $blog->title . "</h2>";
                echo "<img src='../img/" . $blog->image . "' />";

                echo "<span class='tag'>" . $blog->tags . "</span>";

                echo "<p class='p'>" . $blog->author . "</p>";
                echo "<p class='p'>" . $blog->blog . "</p>";

                echo "<p class='date'>Creado el: " . $blog->created_at . "</p>";
                echo "<p class='date'>Actualizado el: " . $blog->updated_at . "</p>";
                echo "</article>";
            }
            ?>
        </section>

        <aside class="sidebar">
            <section class="section">
                <header>
                    <h3>Tag Cloud</h3>
                </header>
                <p class="tags">
                    <span class="weight-1">magic</span>
                    <span class="weight-5">symblog</span>
                    <span class="weight-4">movie</span>
                </p>
            </section>
        </aside>

        <div id="footer">
            dwes symblog - created by <a href="#">dwes</a>
        </div>
    </section>

</body>

</html>