<?php
session_start();
ob_start();
include_once '../TCC/assets/php/conexao.php'
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-login.css">
    <title>Unitec's - Entre ou Cadastra-se</title>
    <script src="assets/js/script-login.js" defer ></script>
    <script src="https://kit.fontawesome.com/3c30089a14.js" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">

    <div class="left">
        <img src="assets/imagens/logo.png" alt="logo do site" class="logo">
        <h2>A <span class="unitec">Unitec's </span>ajuda você a se conectar com a Etec</h2>
    </div>

    <div>  
          <?php
          $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
          
          if(!empty($dados['SendLogin'])){
            //var_dump($dados);
            $query_sql = "SELECT id_user, nome_user, email_user, senha_user, data_user
                            FROM user 
                            WHERE email_user = '".$dados['email']."' AND senha_user = '".$dados['senha']."' ";
            $result_usuario = $conn->prepare($query_sql);
            $result_usuario->execute();

            if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
                $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                //var_dump($row_usuario);
                //echo"usario logado";
                $_SESSION['id'] = $row_usuario['id_user'];
                $_SESSION['nome'] = $row_usuario['nome_user'];
                header("Location: home.php");

            }else{
                $_SESSION['msg'] = "Email ou senha inválida";
           }

          }
          if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
          ?>
        <form method="POST" action="">
            <input type="text" name="email" placeholder="Email" value="<?php if(isset($dados['email'])){ echo $dados['email']; } ?>" required>
            <input type="password" name="senha" placeholder="Senha" value="<?php if(isset($dados['senha'])){ echo $dados['senha']; } ?>" required>
            <input class="entrar" value="Entrar" type="submit" name="SendLogin">
            <button class="criar-conta">Criar nova conta</button>
        </form>
    </div>

</div>

<?php
if(isset($_POST['nome_cad']) || isset($_POST['email_cad']) || isset($_POST['senha_cad']) || isset($_POST['data_cad'])) {
 
    if(strlen($_POST['nome_cad']) == 0) {
    
        echo "Preencha seu nome";
        
    }

    if(strlen($_POST['email_cad']) == 0) {
    
    echo "Preencha seu e-mail";
    
    }
    if(strlen($_POST['senha_cad']) == 0) {
    
        echo "Preencha sua senha";
        
    }
     else if(strlen($_POST['data_cad']) == 0) {
    
     echo "Preencha a data";
    
    }
else if(strlen($_POST['nome_cad']) || strlen($_POST['email_cad']) ||  strlen($_POST['senha_cad']) ||  strlen($_POST['data_cad'])  == 1){
    $nome = $_POST['nome_cad'];
    $email = $_POST['email_cad'];
    $senha = $_POST['senha_cad'];
    $data = $_POST['data_cad'];


$inserir = "INSERT INTO user( nome_user ,email_user, senha_user, data_user) VALUES ('$nome', '$email', '$senha', '$data')";
    $result_cadastro = $conn->prepare($inserir);
    $result_cadastro -> execute();
}
}
?>

<section id="menu-flutuante" class="inscription hidden">
    <form action="" method="POST">
      <i class="fa-solid fa-xmark"></i>
      <h1>Cadastro</h1>
      <input type="text" name="nome_cad" placeholder="Nome" maxlength="35" minlength="3" required>
      <input type="text" name="email_cad" placeholder="E-mail" required>
      <input type="password" name="senha_cad" placeholder="Senha" required>
      <input type="date" name="data_cad" placeholder="Data de Aniversário" required>
      <button id="criar-conta-btn" type="submit">Criar Conta</button>
    </form>
  </section>
 
  

</body>
</html>