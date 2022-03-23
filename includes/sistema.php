<?php
// Importações
include('../app/scripts/protecao.php');
include('../app/scripts/conexao.php');

// Variavel que recebe a query de consulta do BD
$consulta="SELECT * FROM tb_cadastro";
// Armazena a consulta do BD na Varivael con & se dê erro mata a execução do problema e mostra o erro
$con = $mysqli->query($consulta) or die($mysqli->error);
// Função para pegar os dados e colocar em um array
$linha = $con->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Sistema</title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <!--Estilo-->
    <link rel="stylesheet" href="../css/sistema.css">
    <!--Favicon-->
    <link rel="shortcut icon" href="../imagens/favicon-sistema.png" type="image/x-icon">
</head>
<body id="fundo-sistema">

<nav class="navbar navbar-light bg-success">


<a class="navbar-brand">
<img src="../imagens/logo.png" width="50" height="50" class="d-inline-block align-top" alt="">

 Bem-vindo ao Sistema <?php echo $_SESSION['nome'];?>

</a>

</nav>
    <br>
    <h1 class="text-center">PESSOAS A SER MONITORADAS</h1>
    
    
    <div class="table-responsive">
    <table class="table">
    <thead >
        
        <tr class="table-success" >
            <td scope="col">Nome</td>
            <td scope="col">CPF</td>
            <td scope="col">RG</td>
            <td scope="col">Data de Nascimento</td>
            <td scope="col">Endereço</td>
            <td scope="col">Anotações</td>
            <td></td>
        </tr>
    <?php
    
    do{
    ?>
        <tr>
         <!--vai exibir o resultado da função abaixo-->    
            <td> <?php echo $linha['nome'] ?? null;?> </td>
            <td> <?php echo $linha['cpf'] ?? null;?> </td>
            <td> <?php echo $linha['rg'] ?? null;?> </td>
            <!--Muda o estilo da data para o padrão BR-->
            <td> <?php echo date("d/m/Y", strtotime($linha['datanascimento'] ?? null));?> </td>
            <td> <?php echo $linha['endereco'] ?? null;?> </td>
            <td> <?php echo $linha['anotacoes'] ?? null;?> </td>

            <td>
                <!--Ao pressionar o botão deletar irá para o script de deletar-->
                <a class="btn btn-danger btn-mg active " role="button" href="../app/scripts/deletar.php?p=deletar&id=<?php echo $linha['id'] ?? null;?>">Deletar</a> <!--pega o id de cada coluna-->
            </td>

        </tr>

        <?php
        // Pega os dados da coluna do BD e armazena no formulario acima, enquanto tiver dados no bd 
        } while($linha = $con->fetch_assoc());
        ?>
    </table>

    </div>
    <!--Ao pressionar o botão Sair, irá para o script logout-->
     <a href="../app/scripts/logout.php" class="btn btn-success btn-mg active " id="botaosair" role="button" aria-pressed="true" >Sair</a> </button>
</body>
</html>
