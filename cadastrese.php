<?php

$erro_usuario = isset($_GET["erro_usuario"]) ? $_GET["erro_usuario"] : 0;
$erro_email = isset($_GET["erro_email"]) ? $_GET["erro_email"] : 0;
$usuario_cadastrado = isset($_GET["usuario_cadastrado"]) ? $_GET["usuario_cadastrado"] : 0;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Blog Footstar</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="blog_estilo.css">

</head>


<body>
    <nav class="navbar navbar-light fixed-top navbar-expand-lg" id="menu_navegacao">
        <div class="container">
            <h3><b id="blog_logo">Blog Footstar</b></h3>
            <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" id="menu_nav">
                <span class="sr-only">Alternar Menu</span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbar" class="collapse navbar-collapse">
                <div class="navbar-nav ml-auto">
                    <a href="index.php"><b>Página Inicial</b></a>
                    <a href="login.php"><b>Entrar</b></a>
                </div>
            </div>
        </div>
    </nav>

    <?php require_once("estilo_pagina/capa.php") ?>

    <section class="area">

        <br />
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3>Cadastre-se já.</h3>
                <br />
                <b>Para a sua própria segurança, evite usar o mesmo login e senha do jogo</b>
                <br />
                <form method="post" action="registrar_usuario.php">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" placeholder="Nome e Sobrenome" required="requiored">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required="requiored">

                        <?php

                        if ($erro_usuario) {
                            echo "<font style='color:#FF0000'>Usuário já existe</font>";
                        }

                        ?>
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">

                        <?php

                        if ($erro_email) {
                            echo "<font style='color:#FF0000'>Email já existe</font>";
                        }

                        ?>

                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
                    </div>
                    <button type="submit" class="btn btn-primary form-control" id="cadastrese">Cadastre-se</button>

                    <?php

                    if ($usuario_cadastrado) {
                        echo "<font style='color:green'>Usuário cadastrado com sucesso!</font>";
                    }

                    ?>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>

        <div class="clearfix"></div>
        <br /><br />
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </section>


    <?php require_once("estilo_pagina/rodape.php"); ?>