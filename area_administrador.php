<?php

session_start();

if (!isset($_SESSION["usuario"]) && !($_SESSION["tipo_usuario"] == "administrador")) {
    header("Location: index.php?erro=1");
}

require_once("estilo_pagina/barra_navegacao.php");
?>

<br><br><br><br><br><br>
<div class="container">
    <h1>Ainda em contrução</h1>
</div>

<?php require_once("estilo_pagina/rodape.php"); ?>