<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id'])){
    header('Location: ../index.php');
        //die("Você não está autorizado a acessar essa pagina ! <p> <a href=\"../index.php\"> Inicio</a> </p>");
    }
?>