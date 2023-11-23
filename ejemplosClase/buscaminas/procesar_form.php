<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['marcarCas'])) {
        echo 'Yepa ya estoy por aqui';
    }
}