<?php
    include('conexao.php');
    include('protecao.php');

    if(isset($_GET["id"])){
   $id = $_GET['id'];
   $sql_code = "DELETE FROM tb_cadastro WHERE id = '$id'";
   $sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
    header("location: ../../includes/sistema.php");
    } else {
        echo "Não funfou";
    }
?>