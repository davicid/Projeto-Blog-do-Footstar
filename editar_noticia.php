<?php

session_start();

if (!isset($_SESSION["usuario"]) || (!($_SESSION["tipo_usuario"] == "jornalista") && !($_SESSION["tipo_usuario"] == "administrador"))) {
    header("Location: index.php?erro=1");
}


?>

<?php require_once('estilo_pagina/barra_navegacao.php');

$id_noticia = $_GET['id_noticia'];
require_once('recuperar_noticias.php');
editarNoticia($id_noticia);

?>

<script type="text/javascript">
    $(document).ready(function() {

        $("#btn_salvar").click(function() {
            if ($("#novo_titulo").val().length > 0 && $("#novo_texto_noticia").val().length > 0 && $("#novo_tipo_noticia").val().length != "") {

                $.ajax({
                    url: "requisicoes_ajax/editar_noticia.php",
                    method: "post",
                    data: $("#editar_noticia").serialize(),
                    success: function(data) {
                        alert('Notícia editada com sucesso');
                        window.location.href = "area_jornalistas.php";
                    }
                });
            }
        });
    });
</script>

<?php require_once('estilo_pagina/rodape.php'); ?>