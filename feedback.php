<?php
    session_start();
    ob_start();
    include_once '../TCC/assets/php/conexao.php';

    if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "Erro, faça login";
        header("Location: index.php");
    }
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


<div class="write-post-container">



<!--Inicio post textarea-->
    <?php 
        //seleciona os dados do usuário para o select da postagem - id
        $sql_id_user_feedback = "SELECT * FROM user ORDER BY id_user ASC";
        $sql_query_user_feedback = $conn->query($sql_id_user_feedback) or die($conn->errorInfo());

        //verifica se o arquivo foi selecionado
        if(isset($_POST['feedbtn'])){
            //pasta onde será armazenada o arquivo
            $idUserFeed = $_POST['id-artigo-usuario-feedback'];
            $descFeed= $_POST['descricao-feed'];
            
            $conn->query("INSERT INTO feedback (id_user_feedback , desc_feedback) 
            VALUES ('$idUserFeed', '$descFeed') ");
                //echo "<p>veja seu arquivo <a target = \"_blank\" href=\"arquivos/$novoNomeDoArquivo.$extensao\">aqui</a></p>" 
            header('Location: home.php');
                //FALTA COLOCAR UMA MANEIRA DE REFERENCIAR A CHAVE ESTRANGEIRA NO INSERT COLOCAR ALGUMA FORMA DE ADICONAR PELO FORMULARIO
        } else
        //Observar se tem como fazer com o button para exibir mensagem
        echo '';
        //seleciona os dados do usuário para o select da postagem - nome
        //$sql_id_user_nome = "SELECT * FROM user ORDER BY id_user ASC";
        //$sql_query_user_nome = $conn->query($sql_id_user_nome) or die($conn->errorInfo());

    ?>

<form method="post" enctype="multipart/form-data" action="feedback.php" class="form_feed">

    <!--Inicio foto post user site-->
    <div class="user-profile">
<img src="assets/imagens/icon-user.jpg" alt="">
    <div>

    <p><?php echo $_SESSION['nome'] ?></p>
    <small>#ID: <?php echo $_SESSION['id'] ?><!--<i class="fa-solid fa-caret-down"></i>--></small>

</div>

</div>
<!--Fim foto post user site-->

<div class="post-input-container">

    <!--select para definir o usuário da postagem de forma automática-->
    <select name="id-artigo-usuario-feedback">
        <option value=""> selcione um usuario</option>
        <?php while($user_artigo_feedback = $sql_query_user_feedback->fetch(PDO::FETCH_ASSOC)) { ?>
        <option <?php if(isset ($user_artigo_feedback['id_user']) && $user_artigo_feedback['id_user'] == $_SESSION['id']) echo "selected" ?> value="<?php echo $user_artigo_feedback['id_user'] ?>">
        <?php echo $user_artigo_feedback['id_user'] ?>
        </option>
        <?php }?>
    </select>
    <!--<select name="id-artigo-usuario-nome">
        <option value=""> selcione um usuario</option>
        <php while($user_artigo_nome = $sql_query_user_nome->fetch(PDO::FETCH_ASSOC)) { ?>
        <option <php if(isset ($user_artigo_nome['nome_user']) && $user_artigo_nome['nome_user'] == $_SESSION['nome']) echo "selected" ?> value="<php echo $user_artigo_nome['nome_user'] ?>">
        <php echo $user_artigo_nome['nome_user'] ?>
        </option>
        <php }?>
    </select>-->
    
    

    <!--adiciona o titulo do seu artigo-->
    <!--<div class="search-box-2">
    <input name="titulo-artigo" type="text" placeholder="Título do seu artigo">
    </div>-->

    <!--adicona descrição ao artigo-->
    <h2 style= "color:#d00023; font-weight:bolder; padding:10px;">Insira seu feedback</h2>
    <div class="search-box-2">
    <input name="descricao-feed" type="text" placeholder="Descrição do feedback">
    </div>
    
    <!--adiciona o arquivo ao artigo-->
    <!--<label for="arquivo" class="artigo-arquivo"> <span>Escolha o arquivo</span></label>
    <input name="arquivo" type="file" id="arquivo">-->
    
    

<!--Inicio links do post-->
<div class="add-post-links">
<!--confirmação de postagem-->
<button type="submit" name="feedbtn"><a href="#"><img src="assets/imagens/send.png" alt="">Enviar</a></button>
<!--<a href="#"><img src="assets/imagens/photo.png" alt="">Foto</a>
<a href="#"><img src="assets/imagens/feeling.png" alt="">Atividades</a>-->
</div>
<!--Fim links do post-->

</div>

</form>
<!--Fim post textarea-->

</div>

<button type="button" class="load-more-btn"><a href="home.php">Voltar</a></button>

</body>
</html>