<?php

require_once("db.class.php");

$objDb = new db();
$link = $objDb->conecta_mysql();

$id_noticia = $_POST['id_noticia'];
$comentario_ativo = 0;
$id_comentario = $_POST["id_comentario"];

$sql = "UPDATE comentarios set ativo = $comentario_ativo WHERE id = $id_comentario";

$resultado = mysqli_query($link, $sql);

if ($resultado) {
    header("location: noticia.php?id_noticia=$id_noticia");
}
