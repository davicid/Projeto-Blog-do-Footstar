<?php

session_start();

require_once("db.class.php");

$usuario = $_POST["usuario"];
$senha = md5($_POST["senha"]);

$sql = "SELECT id, nome, usuario, email, tipo_usuario FROM usuarios where usuario = '$usuario' AND senha = '$senha' ";

$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);


if ($resultado_id) {
    $dados_usuario = mysqli_fetch_array($resultado_id);

    if (isset($dados_usuario["usuario"]) && isset($dados_usuario["tipo_usuario"])) {

        $_SESSION["nome"] = $dados_usuario["nome"];
        $_SESSION["id_usuario"] = $dados_usuario["id"];
        $_SESSION["usuario"] = $dados_usuario["usuario"];
        $_SESSION["email"] = $dados_usuario["email"];
        $_SESSION["tipo_usuario"] = $dados_usuario["tipo_usuario"];

        if ($dados_usuario["tipo_usuario"] == "comum") {
            header("Location: index.php");
        }
        if ($dados_usuario["tipo_usuario"] == "jornalista") {
            header("Location: area_jornalistas.php");
        }
        if ($dados_usuario["tipo_usuario"] == "administrador") {
            header("Location: area_administrador.php");
        }
    } else {
        header("Location: login.php?erro=1");
    }
} else {
    echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
}
