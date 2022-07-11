<?php
require_once("../db.class.php");

$objDb = new db();
$link = $objDb->conecta_mysql();

$id_noticia = $_POST['id_noticia'];
$novo_tipo_noticia = $_POST['novo_tipo_noticia'];
$novo_titulo = $_POST['novo_titulo'];
$novo_texto_noticia = $_POST['novo_texto_noticia'];

$sql = "UPDATE noticias set tipo_noticia = '$novo_tipo_noticia', titulo = '$novo_titulo', texto_noticia = '$novo_texto_noticia' WHERE id = $id_noticia";

$resultado = mysqli_query($link, $sql);
