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


<div style="margin-top: 10px;" class="write-post-container">
<h1 style="text-align: center; margin-top: 10px; color: #3f3f3f;">Tutorial do Site</h1>

<form method="post" enctype="multipart/form-data" action="feedback.php" class="form_feed">


<!--Fim foto post user site-->

<div class="post-input-container">
    <h2 style= "color:#d00023; font-weight:bolder; padding:10px;">Login</h2>
<img style="width: 100%;" src="../TCC/assets/imagens/tutorial/tutorial-login.jpg" class="img_tutorial" alt="">

</div>


</form>

<!--Fim post textarea-->

</div>

<div style="margin-top: 10px;" class="write-post-container">

    <form method="post" enctype="multipart/form-data" action="feedback.php" class="form_feed">
    
    
    <!--Fim foto post user site-->
    
    <div class="post-input-container">
        <h2 style= "color:#d00023; font-weight:bolder; padding:10px;">Cadastro</h2>
    <img style="width: 100%;" src="../TCC/assets/imagens/tutorial/tutorial-cadastro.jpg" class="img_tutorial" alt="">
    
    </div>
    
    
    </form>
    
    <!--Fim post textarea-->
    
    </div>

    <div style="margin-top: 10px;" class="write-post-container">

        <form method="post" enctype="multipart/form-data" action="feedback.php" class="form_feed">
        
        
        <!--Fim foto post user site-->
        
        <div class="post-input-container">
            <h2 style= "color:#d00023; font-weight:bolder; padding:10px;">Barra de superior</h2>
        <img style="width: 100%;" src="../TCC/assets/imagens/tutorial/tutorial-nav-bar.jpg" class="img_tutorial" alt="">
        
        </div>
        
        
        </form>
        
        <!--Fim post textarea-->
        
        </div>

        <div style="margin-top: 10px;" class="write-post-container">

            <form method="post" enctype="multipart/form-data" action="feedback.php" class="form_feed">
            
            
            <!--Fim foto post user site-->
            
            <div class="post-input-container">
                <h2 style= "color:#d00023; font-weight:bolder; padding:10px;">Caixa do usuário</h2>
            <img style="width: 100%;" src="../TCC/assets/imagens/tutorial/tutorial-box-user.jpg" class="img_tutorial" alt="">
            
            </div>
            
            
            </form>
            
            <!--Fim post textarea-->
            
            </div>
            <div style="margin-top: 10px;" class="write-post-container">

                <form method="post" enctype="multipart/form-data" action="feedback.php" class="form_feed">
                
                
                <!--Fim foto post user site-->
                
                <div class="post-input-container">
                    <h2 style= "color:#d00023; font-weight:bolder; padding:10px;">Postagem</h2>
                <img style="width: 100%;" src="../TCC/assets/imagens/tutorial/tutorial-post.jpg" class="img_tutorial" alt="">
                
                </div>
                
                
                </form>
                
                <!--Fim post textarea-->
                
                </div>
                <div style="margin-top: 10px;" class="write-post-container">

                    <form method="post" enctype="multipart/form-data" action="feedback.php" class="form_feed">
                    
                    
                    <!--Fim foto post user site-->
                    
                    <div class="post-input-container">
                        <h2 style= "color:#d00023; font-weight:bolder; padding:10px;">Feedback</h2>
                    <img style="width: 100%;" src="../TCC/assets/imagens/tutorial/tutorial-feedback.jpg" class="img_tutorial" alt="">
                    
                    </div>
                    
                    
                    </form>
                    
                    <!--Fim post textarea-->
                    
                    </div>
                    <div style="margin-top: 10px;" class="write-post-container">

                        <form method="post" enctype="multipart/form-data" action="feedback.php" class="form_feed">
                        
                        
                        <!--Fim foto post user site-->
                        
                        <div class="post-input-container">
                            <h2 style= "color:#d00023; font-weight:bolder; padding:10px;">Perfil - Voltar</h2>
                        <img style="width: 100%;" src="../TCC/assets/imagens/tutorial/tutorial-perfil-voltar.jpg" class="img_tutorial" alt="">
                        
                        </div>
                        
                        
                        </form>
                        
                        <!--Fim post textarea-->
                        
                        </div>
                        <div style="margin-top: 10px;" class="write-post-container">

                            <form method="post" enctype="multipart/form-data" action="feedback.php" class="form_feed">
                            
                            
                            <!--Fim foto post user site-->
                            
                            <div class="post-input-container">
                                <h2 style= "color:#d00023; font-weight:bolder; padding:10px;">Perfil - Artigo</h2>
                            <img style="width: 100%;" src="../TCC/assets/imagens/tutorial/tutorial-perfil-artigo.jpg" class="img_tutorial" alt="">
                            
                            </div>
                            
                            
                            </form>
                            
                            <!--Fim post textarea-->
                            
                            </div>

<button type="button" class="load-more-btn" style="margin-top:10px; margin-bottom:10px;"><a href="home.php">Voltar</a></button>

</body>
</html>