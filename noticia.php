<?php

session_start();

?>

<?php
require_once("estilo_pagina/barra_navegacao.php");
require_once("estilo_pagina/capa.php");

$id_noticia = $_GET['id_noticia'];
require_once("recuperar_noticias.php");
paginaNoticia($id_noticia);
?>

<script type="text/javascript">
    $(document).ready(function() {

        $("#btn_comentario").click(function() {
            if ($("#texto_comentario").val().length > 0) {

                $.ajax({
                    url: "inserir/inserir_comentarios.php",
                    method: "post",
                    data: $("#inserir_comentarios").serialize(),
                    success: function(data) {
                        $("#texto_comentario").val("");
                        atualizarComentarios();
                    }
                });
            }
        });

        function atualizarComentarios() {
            $.ajax({
                url: "requisicoes_ajax/atualizar_comentarios.php",
                method: "post",
                data: $("#inserir_comentarios").serialize(),
                success: function comentarios(data) {
                    $("#comentarios").html(data);
                }
            });
        }


        $("#btn_remover").click(function() {
            $.ajax({
                url: "requisicoes_ajax/apagar_noticia.php",
                method: "post",
                data: $("#alterar_noticia").serialize(),
                success: function(data) {
                    alert('Notícia removida com sucesso');
                    window.location.href = "area_jornalistas.php";
                }
            });
        });
        atualizarComentarios();
    });
</script>


<section class="container">
    <div class=" col-md-3 center"></div>
    <div class="panel panel-default">
        <div class="panel-body">
            <form id="inserir_comentarios" class="input-group-md mb-12">
                <input type="hidden" id="id_noticia" name="id_noticia" value=<?= $id_noticia ?>>
                <?php
                if (isset($_SESSION['usuario'])) {
                    echo '<textarea class="form-control" id="texto_comentario" name="texto_comentario" placeholder="Insira um comentário" maxlength="600" rows="8" cols="65" class="area_comentarios"></textarea>
                <br>
                <spam>
                    <button class="btn btn-primary" id="btn_comentario" type="button">Comentar</button>
                </spam>';
                } else {
                    echo "Faça o login para poder comentar <b><a href='login.php'>Entrar</a></b>. Caso não tenha uma conta, faça seu cadastro <b><a href='cadastrese.php'>Cadastre-se</a></b>";
                }
                ?>
            </form>
        </div>
    </div>
</section>


<section class="area_comentarios">
    <div id="comentarios"></div>
</section>

<br><br><br><br><br><br><br>

<?php require_once("estilo_pagina/rodape.php"); ?>