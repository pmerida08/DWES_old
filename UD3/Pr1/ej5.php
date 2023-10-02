<?php
    /**
     * 
     * @author Pablo Merida Velasco
     * 
     * 5. Script que muestre una lista de enlaces en función del perfil de usuario:
     * Perfil Administrador: Pagina1, Pagina2, Pagina3, Pagina4
     * Perfil Usuario: Pagina1, Pagina2
     * 
     */

    
    $enlaces = array('Pagina1', 'Pagina2', 'Pagina3', 'Pagina4');
    $perfil = 'usuario';

    if ($perfil == 'administrador') {
        foreach ($enlaces as $enlace) {
            echo $enlace.'<br>';
        };
    } elseif ($perfil == 'usuario') {
        for ($i=0; $i < 2; $i++) { 
            echo $enlaces[$i].'<br>';
        };
    } else {
        echo 'El perfil '.$perfil.' es erróneo'; 
    };
?>