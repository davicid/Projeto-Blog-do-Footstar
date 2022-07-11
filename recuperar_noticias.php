<?php

function paginaNoticia($id_noticia)
{
    require_once("db.class.php");

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT DATE_FORMAT(n.data_inclusao, '%d %b %Y %T') AS data_inclusao, n.titulo, n.texto_noticia, n.id, n.tipo_noticia, u.usuario, u.nome FROM noticias AS n JOIN usuarios AS u WHERE n.id_usuario = u.id AND n.id = $id_noticia AND n.ativo = 1 ORDER BY n.data_inclusao DESC";

    $resultado = mysqli_query($link, $sql);

    if ($resultado) {
        while ($noticia = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            $id_noticia = $noticia['id'];
            echo "<div class='list-group-item texto_noticias'>";
            echo "<h3 class='list-group-item-heading nome_jornalista'>" . $noticia['nome'] . " <small> - " . $noticia['data_inclusao'] . "</small></h3>";
            echo "<hr>";
            echo "<h1 class='list-group-item-heading titulo_noticias'>" . "<b>" . $noticia["titulo"] . "</b>" . "</h1></a>";
            echo "<hr>";
            echo "<p class='list-group-item-text texto_noticias'>" . "<b>" . nl2br($noticia["texto_noticia"]) . "</b>" . "</p>";

            if (!isset($_SESSION["usuario"]) || (!($_SESSION["tipo_usuario"] == "jornalista") && !($_SESSION["tipo_usuario"] == "administrador"))) {
            } else {
                echo "<form id='alterar_noticia'>";
                echo "<input type='hidden' id='noticia_ativa' name='noticia_ativa' value = 0>";
                echo "<input type='hidden' id='id_noticia' name='id_noticia' value = '$id_noticia'>";
                echo "<a href='editar.php?id_noticia=$id_noticia'><button class='btn btn-link' id='btn_editar' type='button' value ='$id_noticia'>Editar</button></a>";
                echo "<a href='#'><button class='btn btn-link' id='btn_remover' type='button'>Apagar</button></a>";
                echo "</form>";
            }
            echo "</div>";
            echo "<br/>";
        }
    } else {
        echo "Erro na consulta de noticias no banco de dados";
    }
}

function mostrarNoticias($tipo_noticia)
{
    require_once("db.class.php");

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT DATE_FORMAT(n.data_inclusao, '%d %b %Y %T') AS data_inclusao, n.id, n.titulo, n.texto_noticia, u.usuario, u.nome FROM noticias AS n JOIN usuarios AS u WHERE n.id_usuario = u.id AND tipo_noticia = $tipo_noticia AND n.ativo = 1 ORDER BY n.data_inclusao DESC";

    $resultado = mysqli_query($link, $sql);


    if ($resultado) {
        while ($noticia = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            $id_noticia = $noticia['id'];
            echo "<div class='list-group-item'>";
            echo "<a href='noticia.php?id_noticia=$id_noticia'><h1 class='list-group-item-heading'>" . "<b>" . $noticia["titulo"] . "</b>" . "</h1></a>";
            echo "</div>";
            echo "<br/><br/>";
        }
    } else {
        echo "Erro na consulta de noticias no banco de dados";
    }
}

function editarNoticia($id_noticia)
{
    require_once("db.class.php");

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT DATE_FORMAT(n.data_inclusao, '%d %b %Y %T') AS data_inclusao, n.titulo, n.texto_noticia, n.id, n.tipo_noticia, u.usuario, u.nome FROM noticias AS n JOIN usuarios AS u WHERE n.id_usuario = u.id AND n.id = $id_noticia AND n.ativo = 1 ORDER BY n.data_inclusao DESC";

    $resultado = mysqli_query($link, $sql);

    if ($resultado) {
        while ($noticia = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            $tipo_noticia = $noticia['tipo_noticia'];
            $titulo_noticia = $noticia['titulo'];
            $texto_noticia = $noticia['texto_noticia'];
            echo "<section class='container area_insercao'>";
            echo "<div class='col-md-3 center'></div>";
            echo "<div class='panel panel-default'>";
            echo "<div class='panel-body'>";
            echo "<form id='editar_noticia' class='input-group-md mb-12'>";
            echo "<input type='hidden' id='id_noticia' name='id_noticia' value = $id_noticia>";
            echo "<select name='novo_tipo_noticia' id='novo_tipo_noticia' class='form-select' aria-label='Default select example'>";
            echo "<option value= '$tipo_noticia'>" . $tipo_noticia . "</option>";
            echo "<option value='Ultimas Atualizações'>Ultimas Atualizações</option>";
            echo "<option value='Federação Brasileira'>Federação Brasileira</option>";
            echo "<option value='Tutoriais'>Tutoriais</option>";
            echo "<option value='Competições Nacionais'>Competições Nacionais</option>";
            echo "<option value='Competições Internacionais'>Competições Internacionais</option>";
            echo "<option value='Seleção Brasileira'>Seleção Brasileira</option>";
            echo "</select>";
            echo "<br><br>";
            echo "<input class='form-control' type='text' id='novo_titulo' name='novo_titulo' placeholder='Insira o título da notícia' maxlength='100' value='$titulo_noticia'";
            echo "<br><br>";
            echo "<textarea class='form-control' type='text' id='novo_texto_noticia' name='novo_texto_noticia' placeholder='Insira o resumo da notícia' maxlength='5000' rows='10'>" . $texto_noticia . "</textarea>";
            echo "<br>";
            echo "<spam class='botao'>";
            echo "<button class=' btn btn-primary' id='btn_salvar' type='button'>Salvar</button>";
            echo "</spam>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</section>";
        }
    } else {
        echo "Erro na consulta de noticias no banco de dados";
    }
}

function ultimasNoticia()
{
    require_once("db.class.php");

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT DATE_FORMAT(n.data_inclusao, '%d %b %Y %T') AS data_inclusao, n.titulo, n.texto_noticia, n.id, n.tipo_noticia, u.usuario, u.nome FROM noticias AS n JOIN usuarios AS u WHERE n.id_usuario = u.id AND n.ativo = 1 ORDER BY n.data_inclusao DESC";

    $resultado = mysqli_query($link, $sql);

    if ($resultado) {
        $i = 1;
        while ($noticia = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            if ($i <= 10) {
                $id_noticia = $noticia['id'];
                echo "<div class='list-group-item'>";
                echo "<a href='noticia.php?id_noticia=$id_noticia'><h4 class='list-group-item-heading'>" . "<b>" . $noticia["titulo"] . "</b>" . "</h4></a>";
                echo "</div>";
                echo "<br>";
                $i++;
            }
        }
    } else {
        echo "Erro na consulta de noticias no banco de dados";
    }
}
