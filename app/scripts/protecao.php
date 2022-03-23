<?php

// Se não tiver a sessão já iniciada irá redirencionar o usuario para pagina index
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['id'])){
    header('Location: ../index.php');
    }
?>