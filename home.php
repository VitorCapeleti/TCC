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
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/3c30089a14.js" crossorigin="anonymous"></script>
    <title>Unitec's</title>
</head>
<body>
    <nav>

    <!--Inicio logo e icones-->
    <div class="nav-left">
        <img src="assets/imagens/logo.png" alt="Nome do site" class="logo">
       <!-- <ul>
            <li><img src="assets/imagens/notification.png" alt=""></li>
            <li><img src="assets/imagens/inbox.png" alt=""></li>
            <li><img src="assets/imagens/video.png" alt=""></li>
        </ul>-->
    </div>
    <!--Fim logo e icones-->

    <!--Inicio menu e busca-->
    <div class="nav-right">

         <!--Inicio busca-->
 
        <form method="post" action="pesquisar.php">
            <div class="search-box">
            
                <input type="text" name="pesquisa" placeholder="Pesquisar ID">
                <button type="submit" name="enviar-pesquisa" ><img src="assets/imagens/search.png" alt=""></button>
            
            </div>
        </form>

        <!--Fim busca-->

     <!--Inicio perfil foto-->
    <div class="nav-user-icon online" onclick="abreConfig()">
        <img src="assets/imagens/icon-user.jpg"" alt="">
    </div>
    <!--Fim perfim foto-->
    
    </div>
        
    <!--Fim menu e busca-->

    <!--Inicio configurações-->
<div class="settings-menu">
    <div id="dark-btn">
        <span></span>
    </div>

<div class="settings-menu-inner">

 <!--Inicio foto post user site-->
            <div class="user-profile">
                <img src="assets/imagens/icon-user.jpg"" alt="">
                    <div>
                        <?php
                            $sql_id_user_perfil = "SELECT * FROM user ORDER BY id_user ASC";
                            $sql_query_user_perfil = $conn->query($sql_id_user_perfil) or die($conn->errorInfo());
                        ?>
                        <p><?php echo $_SESSION['nome'] ?></p>
                        
                <form action="perfil.php" method="post">

                    
                   

                   <select name="id-artigo-usuario-perfil">
        <option value=""> selcione um usuario</option>
        <?php while($user_artigo_perfil = $sql_query_user_perfil->fetch(PDO::FETCH_ASSOC)) { ?>
        <option <?php if(isset ($user_artigo_perfil['id_user']) && $user_artigo_perfil['id_user'] == $_SESSION['id']) echo "selected" ?> value="<?php echo $user_artigo_perfil['id_user'] ?>">
        <?php echo $user_artigo_perfil['id_user'] ?>
        </option>
        <?php }?>
        </select>

       <button type="submit" class="btn_perfil" ><a>Meu Perfil</a></button>

                   </form>
                </div>
                
                </div>
    <!--Fim foto post user site-->
    <hr>

     <!--Inicio foto post user site-->
     <div class="user-profile">
        <img src="assets/imagens/feedback.png" alt="">
            <div>
         <p>Deixe seu feedback </p>
           <a href="feedback.php">Ajuda</a>
        
        </div>
        
        </div>
    
<!--Fim foto post user site-->
<hr>


  <!--Inicio links de configurações-->
<!--<div class="settings-links">
<img src="assets/imagens/setting.png" alt="" class="settings-icon">
<a href="#">Configurações e Privacidade <img src="assets/imagens/arrow.png" alt="" width="10px"></a>
</div>-->
<!--Fim links de configurações-->

<!--Inicio links de configurações-->
<div class="settings-links">
    <img src="assets/imagens/help.png" alt="" class="settings-icon">
    <a href="ajuda.php">Ajuda e suporte <img src="assets/imagens/arrow.png" alt="" width="10px"></a>
    </div>
    <!--Fim links de configurações-->

    <!--Inicio links de configurações-->
<div class="settings-links">
    <img src="assets/imagens/logout.png" alt="" class="settings-icon">
    <a href="../TCC/sair.php">Sair<img src="assets/imagens/arrow.png" alt="" width="10px"></a>
    </div>
    <!--Fim links de configurações-->

</div>

</div>
<!--Fim configurações-->

   
    </nav>

    <!--Inicio corpo do site-->
    <div class="container">
        
        <!--Inicio barra lateral esquerda site-->
        <div class="left-sidebar">

<div class="imp-links">
            
<a href="https://www.vestibulinhoetec.com.br/home/" target="_blank"><img src="assets/imagens/news.png" alt="">Notícias da Etec</a>
<!--<a href="#"><img src="assets/imagens/friends.png" alt="">Amigos</a>-->
<a href="https://www.instagram.com/etectaubate_oficial/" target="_blank"><img src="assets/imagens/watch.png" alt="">Rede Social</a>

<a href="sobre.php"><img src="assets/imagens/group.png" alt="">Sobre nós</a>
<!--<a href="#"><img src="assets/imagens/marketplace.png" alt="">Marketplace</a>-->


</div>            

<div class="shortcut-links">

    <!--<p>Seus Atalhos</p>
<a href="#" title=""><img src="assets/imagens/shortcut-1.png" alt="">Sheep PHP</a>
<a href="#" title=""><img src="assets/imagens/shortcut-2.png" alt="">Cobranças Recorrentes</a>
<a href="#" title=""><img src="assets/imagens/shortcut-3.png" alt="">Node JS</a>
<a href="#" title=""><img src="assets/imagens/shortcut-4.png" alt="">Clone Facebook</a>-->
</div>

        </div>
        <!--Inicio barra lateral esquerda site-->

    <!--Inicio conteudo site-->
    <div class="main-content">

   <!--Inicio story galerry site-->
<!--<div class="story-gallery">

    <!--Inicio story site-->

   <!-- <div class="story story1">
    <img src="assets/imagens/upload.png" alt="">
    <p>Postar Story</p>
    </div>
    <!--Fim story site-->

    <!--Inicio story site-->

    <!--<div class="story story2">
        <img src="assets/imagens/member-1.png" alt="">
        <p>Vitor</p>
        </div>
        <!--Fim story site-->

        <!--Inicio story site-->

    <!--<div class="story story3">
        <img src="assets/imagens/member-2.png" alt="">
        <p>Bella</p>
        </div>
        <!--Fim story site-->

        <!--Inicio story site-->

    <!--<div class="story story4">
        <img src="assets/imagens/member-3.png" alt="">
        <p>Lais</p>
        </div>
        <!--Fim story site-->

        <!--Inicio story site-->

    <!--<div class="story story5">
        <img src="assets/imagens/member-4.png" alt="">
        <p>Felipe</p>
        </div>
        <!--Fim story site-->
        
        
<!--</div> -->
<!--Fim story gallery site-->

<!--Inicio post user site-->
<div class="write-post-container">



<!--Inicio post textarea-->
    <?php 
        //seleciona os dados do usuário para o select da postagem - id
        $sql_id_user = "SELECT * FROM user ORDER BY id_user ASC";
        $sql_query_user = $conn->query($sql_id_user) or die($conn->errorInfo());

        //verifica se o arquivo foi selecionado
        if(isset($_FILES['arquivo'])){
            $arquivo = $_FILES['arquivo'];
            
            //verifica se deu erro ao enviar o arquivo
            if($arquivo['error'])
                die("Falha ao enviar arquivo");
            
            //define o tamanho do arquivo
            if($arquivo['size'] > 10485760)
                die("Arquivo é muito grande! Max: 10MB");  
            
            //pasta onde será armazenada o arquivo
            $pasta = "arquivos/";
            $idUserArt = $_POST['id-artigo-usuario'];
            $nomeUserArt = $_POST['id-artigo-usuario-nome'];
            $tituloArt = $_POST['titulo-artigo'];
            $descArt = $_POST['descricao-artigo'];
            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

            if($extensao != "pdf")
                die("Tipo de arquivo não aceito");
            
            $path = $pasta.$novoNomeDoArquivo.".".$extensao;

            //caso de certo todos os processos inserimos no banco de dados
            $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
            if($deu_certo)
            $conn->query("INSERT INTO article (id_article_user , nome_article_user, titulo_article, desc_article, name_article, path_article) 
            VALUES ('$idUserArt', '$nomeUserArt', '$tituloArt','$descArt','$nomeDoArquivo','$path') ");
                //echo "<p>veja seu arquivo <a target = \"_blank\" href=\"arquivos/$novoNomeDoArquivo.$extensao\">aqui</a></p>" 
            header("Refresh: 0");
                //FALTA COLOCAR UMA MANEIRA DE REFERENCIAR A CHAVE ESTRANGEIRA NO INSERT COLOCAR ALGUMA FORMA DE ADICONAR PELO FORMULARIO
        } else
        //Observar se tem como fazer com o button para exibir mensagem
        echo '';
        //seleciona os dados do usuário para o select da postagem - nome
        $sql_id_user_nome = "SELECT * FROM user ORDER BY id_user ASC";
        $sql_query_user_nome = $conn->query($sql_id_user_nome) or die($conn->errorInfo());

    ?>

<form method="post" enctype="multipart/form-data" action="">

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
    <select name="id-artigo-usuario">
        <option value=""> selcione um usuario</option>
        <?php while($user_artigo = $sql_query_user->fetch(PDO::FETCH_ASSOC)) { ?>
        <option <?php if(isset ($user_artigo['id_user']) && $user_artigo['id_user'] == $_SESSION['id']) echo "selected" ?> value="<?php echo $user_artigo['id_user'] ?>">
        <?php echo $user_artigo['id_user'] ?>
        </option>
        <?php }?>
    </select>
    <select name="id-artigo-usuario-nome">
        <option value=""> selcione um usuario</option>
        <?php while($user_artigo_nome = $sql_query_user_nome->fetch(PDO::FETCH_ASSOC)) { ?>
        <option <?php if(isset ($user_artigo_nome['nome_user']) && $user_artigo_nome['nome_user'] == $_SESSION['nome']) echo "selected" ?> value="<?php echo $user_artigo_nome['nome_user'] ?>">
        <?php echo $user_artigo_nome['nome_user'] ?>
        </option>
        <?php }?>
    </select>
    
    

    <!--adiciona o titulo do seu artigo-->
    <div class="search-box-2">
    <input name="titulo-artigo" type="text" placeholder="Título do seu artigo">
    </div>

    <!--adicona descrição ao artigo-->
    <div class="search-box-2">
    <input name="descricao-artigo" type="text" placeholder="Descrição do seu artigo">
    </div>
    
    <!--adiciona o arquivo ao artigo-->
    <label for="arquivo" class="artigo-arquivo"> <span>Escolha o arquivo</span></label>
    <input name="arquivo" type="file" id="arquivo">
    
    

<!--Inicio links do post-->
<div class="add-post-links">
<!--confirmação de postagem-->
<button type="submit"><a href="#"><img src="assets/imagens/send.png" alt="">Postar</a></button>
<!--<a href="#"><img src="assets/imagens/photo.png" alt="">Foto</a>
<a href="#"><img src="assets/imagens/feeling.png" alt="">Atividades</a>-->
</div>
<!--Fim links do post-->

</div>

</form>
<!--Fim post textarea-->

</div>
<!--Fim post user site-->

<!-------------------------------------------------Inicio post 1 feed------------------------------------------------------>
<!-- pega os dados da tabela article -->
<?php 
    //pega os dados da tabela article
    $sql_id_article = "SELECT * FROM article ORDER BY id_article DESC";
    $sql_query_article = $conn->query($sql_id_article) or die($conn->errorInfo());

    //vou deixar esse código, pois, com ele foi possível importar valores da tabela (obs: Não sei se ta certo)
    $sql_id_article_user = "SELECT id_user ,nome_user
        FROM user INNER JOIN article
        WHERE (id_user = id_article_user )";
    $sql_query_article_user = $conn->query($sql_id_article_user) or die($conn->errorInfo());
    
     ?>


    <table class="post-container-main">
    <?php while($artigo_usuario = $sql_query_article_user->fetch(PDO::FETCH_ASSOC)) { ?>
        <?php while($artigo = $sql_query_article->fetch(PDO::FETCH_ASSOC)) {?>
            
            <tr>
            <td>
                <div class="space"></div>
                </td>
        
            <td> 
            <div class="post-container-1">
                        <div class="post-row">

            <!--Inicio foto post user site-->
            <div class="user-profile">
            <img src="assets/imagens/icon-user.jpg" alt="">
            <div>

            <p><?php echo $artigo['nome_article_user']?> </p>
            <small>#ID: <?php echo $artigo['id_article_user']?>  </small> <!--ATENÇÃO AO BUG-->

            </div>

            </div>
            <!--Fim foto post user site-->
            <!--<a href="#"><i class="fa-solid fa-ellipsis-v"></i></a>-->

            </div>   
              <!-- <php //echo $artigo_usuario['id_user']; echo $artigo_usuario['nome_user']   
               var_dump($artigo_usuario) ?>-->
               </div>
            </td>

            
            <td><div class="post-container-1"><p><span>Artigo: </span> <?php echo $artigo['titulo_article']?></p></div></td>

            <td><div class="post-container-1"><p class="post-text">Descrição: <?php echo $artigo['desc_article']?></p></div></td>

            <td><div class="post-container-1"><a href="<?php echo $artigo['path_article']?>" target="_blank"><?php echo $artigo['name_article']?></a></div></td>

        </tr>

        <?php }?>
        <?php }?>
    </table>
   



<!--<div class="post-container">
    
    <!--Inicio post perfil-->
    <!--<div class="post-row">

         <!--Inicio foto post user site-->
    <!--<div class="user-profile">
        <img src="assets/imagens/icon-user.jpg" alt="">
            <div>
        
            <p>Felipe</p>
            <small>#ID: </small>
        
        </div>
        
        </div>
        <!--Fim foto post user site-->
       <!-- <a href="#"><i class="fa-solid fa-ellipsis-v"></i></a>

    </div>
     <!--Fim post perfil-->

<!--<p class="post-text">
    Criando um site do zero <span>@Etec</span> e Desenvolvimento de Sistemas - Felipe Santos
</p>
<!--<img src="assets/imagens/feed-image-1.png" alt="" class="post-img">-->

 <!--Inicio post icones feeds-->
<!--<div class="post-row">

<div class="actived-icons">
    <div><img src="assets/imagens/like-blue.png" alt="">170</div>
    <div><img src="assets/imagens/comments.png" alt="">78</div>
    <div><img src="assets/imagens/share.png" alt="">155</div>
</div>

<div class="post-profile-icon">
    <img src="assets/imagens/profile-pic.png" alt="">
    <i class="fa-solid fa-caret-down"></i>
</div>
</div>
<!--Inicio post icones feeds-->

<!--</div>-->
<!-----------------------------------------------------Fim post 1 feed------------------------------------------------------------------>

<!-------------------------------------------------Inicio post 2 feed------------------------------------------------------>
<!--<div class="post-container">
    
    <!--Inicio post perfil-->
    <!--<div class="post-row">

         <!--Inicio foto post user site-->
    <!--<div class="user-profile">
        <img src="assets/imagens/profile-pic.png" alt="">
            <div>
        
            <p>Felipe</p>
            <small>22 de março de 2023 ás 7:00hs</small>
        
        </div>
        
        </div>
        <!--Fim foto post user site-->
       <!-- <a href="#"><i class="fa-solid fa-ellipsis-v"></i></a>

    </div>
     <!--Fim post perfil-->
<!--<p class="post-text">
    Criando um site do zero <span>@Etec</span> e Desenvolvimento de Sistemas - Felipe Santos
    <a href="#">#Vipers</a>
    <a href="#">#Etec</a>
</p>
<img src="assets/imagens/feed-image-2.png" alt="" class="post-img">

 <!--Inicio post icones feeds-->
<!--<div class="post-row">

<div class="actived-icons">
    <div><img src="assets/imagens/like-blue.png" alt="">170</div>
    <div><img src="assets/imagens/comments.png" alt="">78</div>
    <div><img src="assets/imagens/share.png" alt="">155</div>
</div>

<div class="post-profile-icon">
    <img src="assets/imagens/profile-pic.png" alt="">
    <i class="fa-solid fa-caret-down"></i>
</div>
</div>
<!--Inicio post icones feeds-->

<!--</div>-->
<!-----------------------------------------------------Fim post 2 feed------------------------------------------------------------------>

<!-------------------------------------------------Inicio post 3 feed------------------------------------------------------>
<!--<div class="post-container">
    
    <!--Inicio post perfil-->
    <!--<div class="post-row">

         <!--Inicio foto post user site-->
    <!--<div class="user-profile">
        <img src="assets/imagens/profile-pic.png" alt="">
            <div>
        
            <p>Felipe</p>
            <small>22 de março de 2023 ás 7:00hs</small>
        
        </div>
        
        </div>
        <!--Fim foto post user site-->
       <!-- <a href="#"><i class="fa-solid fa-ellipsis-v"></i></a>

    </div>
     <!--Fim post perfil-->
<!--<p class="post-text">
    Criando um site do zero <span>@Etec</span> e Desenvolvimento de Sistemas - Felipe Santos
    <a href="#">#Vipers</a>
    <a href="#">#Etec</a>
</p>
<img src="assets/imagens/feed-image-3.png" alt="" class="post-img">

 <!--Inicio post icones feeds-->
<!--<div class="post-row">

<div class="actived-icons">
    <div><img src="assets/imagens/like-blue.png" alt="">170</div>
    <div><img src="assets/imagens/comments.png" alt="">78</div>
    <div><img src="assets/imagens/share.png" alt="">155</div>
</div>

<div class="post-profile-icon">
    <img src="assets/imagens/profile-pic.png" alt="">
    <i class="fa-solid fa-caret-down"></i>
</div>
</div>
<!--Inicio post icones feeds-->

<!--</div>-->
<!-----------------------------------------------------Fim post 3 feed------------------------------------------------------------------>

<button type="button" class="load-more-btn">Espere Por Mais</button>
</div>
<!--Fim conteudo site-->

    <!--Inicio barra lateral direita site-->   
    <div class="right-sidebar">

        <!--Inicio titulo barra lateral direita site-->   
        <div class="sidebar-title">

        <h4>Eventos 2023</h4>
        <a href="#">Veja todos</a>

        </div>
        <!--Fim titulo barra lateral direita site-->   

        <!--Inicio evento barra lateral direita site-->
        <div class="events">

            <div class="left-events">
                <h3>19</h3>
                <span>Outubro</span>
            </div>
            
            <div class="right-events">
<h4>Recurso do pedido de redução</h4>
<p ><i class="fa-solid fa-location-dot"></i> online</p>
<a href="https://www.vestibulinhoetec.com.br/home/" target="_blank">Mais informações</a>
            </div>
        </div>
        <!--Fim evento barra lateral direita site-->

        <!--Inicio evento barra lateral direita site-->
        <div class="events">

            <div class="left-events">
                <h3>08</h3>
                <span>Novembro</span>
            </div>
            
            <div class="right-events">
<h4>Inscrições Vestibulhinho Etec</h4>
<p><i class="fa-solid fa-location-dot"></i> online</p>
<a href="https://www.vestibulinhoetec.com.br/home/" target="_blank">Mais informações</a>
            </div>
        </div>
        
        <!--Fim evento barra lateral direita site-->
		
		<!--Inicio titulo barra lateral direita site-->   
        <!--<div class="sidebar-title">

        <h4>Patrocinados</h4>
        <a href="#">Fechar</a>

        </div>
        <!--Fim titulo barra lateral direita site
		<img src="assets/imagens/advertisement.png" alt="" class="sider-ads"> --> 
		
		<!--Inicio titulo barra lateral direita site   
        <!--<div class="sidebar-title">

        <h4>Contatos</h4>
        <a href="#">Fechar Chats</a>
		
        </div>
        <!--Fim titulo barra lateral direita site-->
		
		<!--Inicio usuarios online barra lateral direita site-->  
		<!--<div class="online-list">
		<div class="online">
		<img src="assets/imagens/member-1.png" alt="">

		
		<!--</div>
        <p>Vitor Capeleti</p>
		</div>
		<!--Fim usuarios online barra lateral direita site-->
		
		<!--Inicio usuarios online barra lateral direita site-->  
		<!--<div class="online-list">
		<div class="online">
		<img src="assets/imagens/member-2.png" alt="">

		
   <!-- </div>
    <p>Felipe Santos</p>
		</div>
		<!--Fim usuarios online barra lateral direita site-->
		
		<!--Inicio usuarios online barra lateral direita site-->  
		<!--<div class="online-list">
		<div class="online">
		<img src="assets/imagens/member-3.png" alt="">

		
		<!--</div>
        <p>Lais Souza</p>
		</div>
		<!--Fim usuarios online barra lateral direita site-->
       <!-- </div>-->
    <!--Fim barra lateral direita site-->   
    
    </div>
    <!--Fim corpo do site-->
<script src="script.js"></script>
</body>
</html>