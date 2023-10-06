<?php
    if (!isset($_GET['submit'])) {
        echo "Acceso no autorizado";
    } else {
        echo $_GET['nombre'];
        echo $_GET['apellidos'];
    };
