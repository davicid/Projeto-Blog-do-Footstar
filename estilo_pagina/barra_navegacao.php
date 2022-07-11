<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Blog Footstar</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="blog_estilo.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-light fixed-top navbar-expand-xl" id="menu_navegacao">
        <div class="container">
            <h3><b id="blog_logo">Blog Footstar</b></h3>
            <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" id="menu_nav">
                <span class="sr-only">Alternar Menu</span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbar" class="collapse navbar-collapse">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="index.php"><b>Página Inicial</b></a></li>

                    <?php if (isset($_SESSION["usuario"]) && (($_SESSION["tipo_usuario"] == "jornalista") || ($_SESSION["tipo_usuario"] == "administrador"))) {
                        echo '<a class="nav-link" href="area_jornalistas.php"><b>Área de Jornalistas</b></a></li>';
                    }
                    if (isset($_SESSION["usuario"]) && ($_SESSION["tipo_usuario"] == "administrador")) {
                        echo '<a class="nav-link" href="area_administrador.php"><b>Área de Administrador</b></a></li>';
                    }

                    if (!isset($_SESSION["usuario"])) {
                        echo '<a class="nav-link" href="cadastrese.php"><b>Cadastre-se</b></a></li>
                          <a class="nav-link" href="login.php"><b>Entrar</b></a></li>';
                    } else {
                        echo '<a class="nav-link" href="estilo_pagina/sair.php"><b>Sair</b></a></li>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </nav>