<?php
// Se não tiver sessão então inicia a sessão
if(!isset($_SESSION)) {
    session_start();
}
// Destroi a sessão iniciada
session_destroy();
// Redireciona o usuario ao index 
header("Location: ../../index.php");

?>