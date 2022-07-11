<?php

require_once("../db.class.php");

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "SELECT DATE_FORMAT(n.data_inclusao, '%d %b %Y %T') AS data_inclusao, n.titulo, n.texto_noticia, n.id, u.usuario, u.nome FROM noticias AS n JOIN usuarios AS u WHERE n.id_usuario = u.id AND n.ativo = 1 ORDER BY n.data_inclusao DESC";

$resultado = mysqli_query($link, $sql);


if ($resultado) {
    while ($noticia = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        $id_noticia = $noticia['id'];
        echo "<div class='list-group-item'>";
        echo "<h4 class='list-group-item-heading nome_jornalista'>" . $noticia['nome'] . " <small> - " . $noticia['data_inclusao'] . "</small></h4>";
        echo "<a href='noticia.php?id_noticia=$id_noticia'><h2 class='list-group-item-heading'>" . "<b>" . $noticia["titulo"] . "</b>" . "</h2></a>";
        echo '<hr>';
        echo "<p class='list-group-item-text'>" . "<b>" . nl2br($noticia["texto_noticia"]) . "</b>" . "</p>";
        echo '<hr>';
        echo "</div>";
        echo "<br/><br/>";
    }
} else {
    echo "Erro na consulta de noticias no banco de dados";
}
