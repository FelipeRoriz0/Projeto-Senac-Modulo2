<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Senac</title>
    <!--Favicon -->
    <link rel="shortcut icon" href="imagens/favicon.png" type="image/x-icon">
    <!--Bootstrap-->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <!--CSS -->
    <link rel="stylesheet" href="css/estilo.css">
    
</head>
    <body id="fundo">

    <div class="card" id="telalogin">
    <div class="card-body">
    <form action="" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Informe seu email" name="email">
        <div id="emailHelp" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Senha</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Informe sua senha" name="senha">
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-outline-secondary btn-lg">Entrar</button>
    </div>
    </form>
    </div>

    </body>
    </html>


<?php
 //Importações
 include('app/scripts/conexao.php');

 if(isset($_POST['email']) || isset($_POST['senha'])) {

 //Verifica se existe o email e senha & e se foram ou não preenchidos//
 if(strlen($_POST['email']) == 0) {
     echo "Preencha seu e-mail";
 } else if(strlen($_POST['senha']) == 0) {
     echo "Preencha sua senha";
 } else {


// Proteção para a pessoa não conseguir acessar o BD errando a senha 
 $email = $mysqli->real_escape_string($_POST['email']);
 $senha = $mysqli->real_escape_string($_POST['senha']);

// Recebe a query do BD de usuarios 
 $sql_code = "SELECT * FROM tb_users WHERE email = '$email' AND senha = '$senha'";
// Recebe a variavel sql code e se dêe erro mata a execução e mostra o erro
 $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

// A variavel quantidade recebe a quantidade de linhas da variavel sql_query 
 $quantidade = $sql_query->num_rows;

// se quantidade de linha for igual a 1 irá abrir um sessão
 if($quantidade == 1) {

// Irá pegar os dados do BD e armazenará na variavel Usuario 
     $usuario = $sql_query->fetch_assoc();
// Se não tiver sessão irar iniciar uma sessão
     if(!isset($_SESSION)) {
         session_start();
         }
   
// Irá armanezar na Sessão a ID e irá mostrar o nome do usuario já cadastrado no BD, na pagina do sistema
     $_SESSION['id'] = $usuario['id'];
     $_SESSION['nome'] = $usuario['nome'];

// Irá Redireciona para a pagina de sistema
     header("Location: includes/sistema.php");

     } else {
         echo "Falha ao logar! E-mail ou senha incorretos";
     }

 }
}
?>

