<?php
// Se não tiver se não inicia a sessão
if(!isset($_SESSION)) {
    session_start();
}
// Destroi a sessão sessão
session_destroy();
// Redireciona o usuario ao index 
header("Location: ../../index.php");

?>