<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php?erro=1");
}

require_once("../db.class.php");

$id_noticia = $_POST['id_noticia'];
$texto_comentario = $_POST['texto_comentario'];
$id_usuario = $_SESSION["id_usuario"];

$objDb = new db();
$link = $objDb->conecta_mysql();

$inserir_comentarios = "INSERT INTO comentarios(id_noticia, id_usuario, comentario) values($id_noticia, $id_usuario,'$texto_comentario')";

mysqli_query($link,  $inserir_comentarios);
