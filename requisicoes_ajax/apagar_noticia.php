<?php

require_once("../db.class.php");

$objDb = new db();
$link = $objDb->conecta_mysql();

$noticia_ativa = $_POST["noticia_ativa"];
$id_noticia = $_POST['id_noticia'];

$sql = "UPDATE noticias set ativo = $noticia_ativa WHERE id = $id_noticia";

$resultado = mysqli_query($link, $sql);
