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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pefil do usuario</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <link rel="stylesheet" href="assets/css/style-perfil.css" />
  </head>

<!-- Add this inside the <script> tag in the <head> section of your HTML -->
  <!-- Add this inside the <script> tag in the <head> section of your HTML -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const photos = document.querySelectorAll('.photos img');
    const imageContainer = document.createElement('div');
    imageContainer.classList.add('image-container');

    photos.forEach(photo => {
      photo.addEventListener('click', function () {
        const imgSrc = this.getAttribute('src');
        const img = document.createElement('img');
        img.setAttribute('src', imgSrc);

        imageContainer.innerHTML = '';

        const imageSide = document.createElement('div');
        imageSide.classList.add('image-side');
        imageSide.appendChild(img);

        const descriptionSide = document.createElement('div');
        descriptionSide.classList.add('description-side');
        descriptionSide.innerHTML = `
          <span class="close-button">&times;</span>
          <p>Image description goes here...</p>
        `;

        imageContainer.appendChild(imageSide);
        imageContainer.appendChild(descriptionSide);

        document.body.appendChild(imageContainer);

        const closeButton = descriptionSide.querySelector('.close-button');
        closeButton.addEventListener('click', function () {
          document.body.removeChild(imageContainer);
        });
      });
    });
  });

  
</script>
<!-- LEMBRAR DO SUBMIT USANDO O PERFIL, LEVAR O ID PARA O MENU MEU PERFIL USAR SELECT -->

  <body>
    <div class="header__wrapper">
      <header>
        <a href="home.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
      </header>
      <div class="cols__container">
        <div class="left__col">
          <div class="img__container">
            <img src="assets/imagens/icon-user.jpg" alt="Anna Smith" />
            <span></span>
          </div>
          <h2><?php echo $_SESSION['nome'] ?></h2>
          <p>#ID: <?php echo $_SESSION['id'] ?></p>

          <ul class="about">


          </ul>

          <div class="content">
            <p>

            </p>

            <ul>

            </ul>
          </div>
        </div>
        <div class="right__col">
          <nav>
            <ul>
              <li><a href="">Artigos</a></li>
            </ul>

          </nav>
          <?php if(!isset($_SESSION["id-artigo-usuario-perfil"])){

$id_usuario_perfil =$_POST["id-artigo-usuario-perfil"];
$sql_id_usuario_perfil = "SELECT * FROM article WHERE id_article_user = $id_usuario_perfil";
$sql_query_id_usuario_perfil = $conn->query($sql_id_usuario_perfil) or die($conn->errorInfo());

if( $sql_query_id_usuario_perfil->rowCount() >= 0){
  //echo "Artigos do usuário encontrados";?>
          <div class="photos">
          <table class="post-container-main">
                <?php while($artigo_usuario_perfil = $sql_query_id_usuario_perfil->fetch(PDO::FETCH_ASSOC)) { 
                  $_SESSION['id_article'] = $artigo_usuario_perfil['id_article'];
                  ?>
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

                <p><?php echo $artigo_usuario_perfil['nome_article_user']?> </p>
                <small>#ID: <?php echo $artigo_usuario_perfil['id_article_user']?>  </small> <!--ATENÇÃO AO BUG-->

                <?php
                            $sql_id_article_delete = "SELECT * FROM article ORDER BY id_article ASC";
                            $sql_query_article_delete = $conn->query($sql_id_article_delete) or die($conn->errorInfo());
                        ?>

                <form action="excluir.php" method="post">
                <select name="id-artigo-delete">
                  <option value=""> selcione um usuario</option>
                  <?php while($user_artigo_delete = $sql_query_article_delete->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option <?php if(isset ($user_artigo_delete['id_article']) && $user_artigo_delete['id_article'] == $_SESSION['id_article']) echo "selected" ?> value="<?php echo $user_artigo_delete['id_article'] ?>">
                  <?php echo $user_artigo_delete['id_article'] ?>
                  </option>
                  <?php }?>
                </select> 
                <input type="submit" name="" id="delete-button" value="Excluir">
                </form>



                </div>

                </div>
                <!--Fim foto post user site-->
                <!--<a href="#"><i class="fa-solid fa-ellipsis-v"></i></a>-->

                </div>   
                <!-- <php //echo $artigo_usuario['id_user']; echo $artigo_usuario['nome_user']   
                var_dump($artigo_usuario) ?>-->
                </div>
                </td>

                
                <td><div class="post-container-2"><p><span>Artigo: </span> <?php echo $artigo_usuario_perfil['titulo_article']?></p></div></td>

                <td><div class="post-container-2"><p class="post-text">Descrição: <?php echo $artigo_usuario_perfil['desc_article']?></p></div></td>

                <td><div class="post-container-2"><a href="<?php echo $artigo_usuario_perfil['path_article']?>" target="_blank"><?php echo $artigo_usuario_perfil['name_article']?></a></div></td>

            </tr>
                    <?php } ?>
                    </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php } }?>