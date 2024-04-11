<?php 
session_start();
ob_start();
include_once '../TCC/assets/php/conexao.php';

if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){
    $_SESSION['msg'] = "Erro, faça login";
    header("Location: index.php");
}

if(!isset($_SESSION["pesquisa"])){

    $id_usuario_pesquisa =$_POST["pesquisa"];
    $sql_id_usuario_pesquisa = "SELECT * FROM article WHERE id_article_user = $id_usuario_pesquisa";
    $sql_query_id_usuario_pesquisa = $conn->query($sql_id_usuario_pesquisa) or die($conn->errorInfo());

		if( $sql_query_id_usuario_pesquisa->rowCount() >= 1){
			//echo "Artigos do usuário encontrados";
            ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>pesquisa de usuarios</title>
                <link rel="stylesheet" href="style.css">
                <script src="https://kit.fontawesome.com/3c30089a14.js" crossorigin="anonymous"></script>
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

                <table class="post-container-main">
                <?php while($artigo_usuario_pesquisa = $sql_query_id_usuario_pesquisa->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                <td>
                    <div class="space"></div>
                    </td>
            
                <td> 
                <div class="post-container-2">
                            <div class="post-row">

                <!--Inicio foto post user site-->
                <div class="user-profile">
                <img src="assets/imagens/icon-user.jpg" alt="">
                <div>

                <p><?php echo $artigo_usuario_pesquisa['nome_article_user']?> </p>
                <small>#ID: <?php echo $artigo_usuario_pesquisa['id_article_user']?>  </small> <!--ATENÇÃO AO BUG-->

                </div>

                </div>
                <!--Fim foto post user site-->
                <!--<a href="#"><i class="fa-solid fa-ellipsis-v"></i></a>-->

                </div>   
                <!-- <php //echo $artigo_usuario['id_user']; echo $artigo_usuario['nome_user']   
                var_dump($artigo_usuario) ?>-->
                </div>
                </td>

                
                <td><div class="post-container-2"><p><span>Artigo: </span> <?php echo $artigo_usuario_pesquisa['titulo_article']?></p></div></td>

                <td><div class="post-container-2"><p class="post-text">Descrição: <?php echo $artigo_usuario_pesquisa['desc_article']?></p></div></td>

                <td><div class="post-container-2"><a href="<?php echo $artigo_usuario_pesquisa['path_article']?>" target="_blank"><?php echo $artigo_usuario_pesquisa['name_article']?></a></div></td>

            </tr>
                    <?php } ?>
                    </table>
                    <button type="button" class="load-more-btn"> <a href="home.php">Voltar</a> </button>
                
                <script src="script.js"></script>
                </body>
            </html>
                <?php
    } else { echo '<p style="text-align:center; padding:30px; font-size:20px;">Usuário não existe ou não possui artigos</p>'; ?>
                   <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>pesquisa de usuarios</title>
                <link rel="stylesheet" href="style.css">
                <script src="https://kit.fontawesome.com/3c30089a14.js" crossorigin="anonymous"></script>
            </head>
            <body>
        <button type="button" class="load-more-btn"> <a href="home.php">Voltar</a> </button>
        </body>
            </html>
        <?php
    }
}

?>
