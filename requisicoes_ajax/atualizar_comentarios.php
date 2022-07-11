<?php

session_start();

require_once("../db.class.php");

$id_noticia = $_POST['id_noticia'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "SELECT DATE_FORMAT(c.data_inclusao, '%d %b %Y %T') AS data_inclusao, c.id, c.id_noticia, c.comentario, c.id_usuario, u.nome FROM comentarios AS c JOIN usuarios AS u WHERE c.id_usuario = u.id AND c.id_noticia = $id_noticia AND c.ativo = 1 ORDER BY data_inclusao DESC";

$resultado = mysqli_query($link, $sql);


if ($resultado) {
    while ($comentario = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        echo "<br/>";
        $id_comentario = $comentario['id'];
        $id_noticia = $comentario['id_noticia'];
        echo "<div class='container'>";
        echo "<div class='list-group-item'>";
        echo "<h4 class='list-group-item-heading'>" . $comentario['nome'] . " <small> - " . $comentario['data_inclusao'] . "</small></h4>";
        echo "<p class='list-group-item-text'>" . "<b>" . nl2br($comentario["comentario"]) . "</b>" . "</p>";

        if (!isset($_SESSION["usuario"]) || !($_SESSION["tipo_usuario"] == "administrador")) {
        } else {
            echo "<form action='apagar_comentario.php' method='post'>";
            echo "<input type='hidden' id='id_noticia' name='id_noticia' value = '$id_noticia'>";
            echo "<input type='hidden' id='id_comentario' name='id_comentario' value = $id_comentario>";
            echo "<button class='btn btn-link' id='btn_apagar_comentario' type='submit'>Apagar</button>";
            echo "</form>";
        }
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Erro na consulta de comentarios no banco de dados";
}
