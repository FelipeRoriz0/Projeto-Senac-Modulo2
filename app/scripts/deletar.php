<?php
//Importações
    include('conexao.php');
    include('protecao.php');

// Recebe o ID pela URL
    if(isset($_GET["id"])){
   $id = $_GET['id'];

// Recebe a query do Bd pelo ID
   $sql_code = "DELETE FROM tb_cadastro WHERE id = '$id'";
   $sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
// Redireciona ao sistema, ao seja nem sai do proprio sistema
    header("location: ../../includes/sistema.php");
    } else {
        echo "Não funfou";
    }
?>