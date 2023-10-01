 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="style.css">
 </head>
 <body>
    <table class="table1">
        <?php
            for ($i=1; $i <= 10; $i++) { 
                echo('<tr class="column">');
                for ($j=1; $j <= 10; $j++) { 
                    echo('<th class="row">'.($j*$i).'</th>');
                }
                echo('</tr>');
            }
        ?>
    </table>
 </body>
 </html>

