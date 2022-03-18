<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
    <!--Favicon -->
    <link rel="shortcut icon" href="imagens/favicon.png" type="image/x-icon">
    <!--Bootstrap-->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <!--CSS -->
    <link rel="stylesheet" href="css/estilo.css">

    <body id="fundo">

    <div class="card" id="telalogin">
    <div class="card-body">
    <form action="" method="POST" autocomplete="off">
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
    
</head>


  <?php
    //Importações
    include('includes/conexao.php');
   
    if(isset($_POST['email']) || isset($_POST['senha'])) {
   
    //Analisa se o email e senha estão preenchidos//
    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
   
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
   
    $sql_code = "SELECT * FROM tb_users WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
   
    $quantidade = $sql_query->num_rows;
   
    if($quantidade == 1) {
            
        $usuario = $sql_query->fetch_assoc();
        if(!isset($_SESSION)) {
            session_start();
            }
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
   
        header("Location: includes/sistema.php");
   
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
   
    }
   }
   ?>
    
</div>
</body>
</html>