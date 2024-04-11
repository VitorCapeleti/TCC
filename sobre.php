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
<div class="container">

    <div class="left">
        <img src="assets/imagens/logo.png" alt="logo do site" class="logo">
        <h2>A <span class="unitec">Unitec's </span>ajuda você a se conectar com a Etec</h2>
    </div>

        <div>  

        <form action="home.php">
        
        <div class="user-profile">
        <img src="assets/imagens/sobre-vitorc.jpg" alt="">
            <div>

            <p style= "color:#d00023; font-weight:bolder; padding:10px;">Vitor Capeleti Gomes - Criador, Desenvolvedor Front End e Back End <p>

        </div>

        </div>
            <p style= " font-weight:500; padding:10px;">Olá, tudo bem? Me chamo Vitor Capeleti Gomes e primeiro gostaria de agradecer a você que está usando esse site, é uma honra te ter aqui. Sou técnico em Desenvolvimento de Sistemas e, desenvolvi este site no meu trabalho de conclusão de curso (TCC). O projeto surgiu de uma ideia de ajudar aqueles alunos que se sentem perdido, e não sabem qual caminho tomar ou qual curso vai seguir. A ideia foi totalmente de minha autoria, pensado e imaginado por mim, hoje é um prazer apresentar a vocês o meu trabalho. Espero que a Unitec’s possa ajudar você a se identificar com sua área de atuação, assim minha tarefa estará cumprida. Muito obrigado pelo seu acesso.</p>

            <div class="user-profile">
        <img src="assets/imagens/sobre-felipe.png" alt="">
            <div>

            <p style= "color:#d00023; font-weight:bolder; padding:10px;">Felipe dos Santos da Silva Campos - Desenvolvedor Front End<p>

        </div>

        </div>
            <p style= " font-weight:500; padding:10px;">Minha jornada no curso de Desenvolvimento de Sistemas na ETEC Dr. Geraldo José Rodrigues Alckmin foi incrivelmente gratificante. Desde o início, estava empolgado para aprender e aplicar meus conhecimentos.

O começo do meu Trabalho de Conclusão de Curso (TCC) foi marcado por um objetivo claro: criar algo que pudesse beneficiar outras pessoas. Essa motivação me impulsionou ao longo de todo o processo.

Durante o desenvolvimento do projeto de TCC, criamos uma rede social voltada para a comunicação entre os cursos da ETEC. O objetivo era proporcionar um espaço onde os alunos pudessem compartilhar experiências, informações e tirar dúvidas sobre os cursos disponíveis na instituição.

Sinto-me imensamente feliz por ter contribuído para a criação desse projeto. Espero que, no futuro, o site possa ser uma ferramenta valiosa para os alunos, auxiliando-os na escolha do curso que melhor se adapte às suas necessidades e interesses. Acredito que essa iniciativa pode fazer a diferença na vida de muitos estudantes</p>


            <a href="home.php" style= " text-decoration:none;"><input class="entrar" value="Voltar" type="submit" name="SendLogin"></a>
        </form>
    </div>


</div>


</body>
</html>