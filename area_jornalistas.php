<?php

session_start();

if (!isset($_SESSION["usuario"]) && ((!($_SESSION["tipo_usuario"] == "jornalista") || !($_SESSION["tipo_usuario"] == "administrador")))) {
    header("Location: index.php?erro=1");
}

?>

<?php
require_once("estilo_pagina/barra_navegacao.php");
?>

<script type="text/javascript">
    $(document).ready(function() {

        $("#btn_noticia").click(function() {
            if ($("#titulo_noticia").val().length > 0 && $("#texto_noticia").val().length > 0 && $("#tipo_noticia").val().length != "") {

                $.ajax({
                    url: "inserir/inserir_noticias.php",
                    method: "post",
                    data: $("#inserir_noticia").serialize(),
                    success: function(data) {
                        $("#titulo_noticia").val("");
                        $("#texto_noticia").val("");
                        $("#tipo_noticia").val("");
                        atualizaNoticia();
                    }
                });
            }
        });

        function atualizaNoticia() {
            $.ajax({
                url: "requisicoes_ajax/atualizar_noticias.php",
                success: function noticias(data) {
                    $("#noticias").html(data);
                }
            });
        }
        atualizaNoticia();
    });
</script>

<section class="container area_insercao">
    <div class="col-md-3 center"></div>
    <div class="panel panel-default">
        <div class="panel-body">
            <form id="inserir_noticia" class="input-group-md mb-12">
                <select name="tipo_noticia" id="tipo_noticia" class="form-select" aria-label="Default select example">
                    <option value="">Selecione uma opção</option>
                    <option value="Ultimas Atualizações">Ultimas Atualizações</option>
                    <option value="Federação Brasileira">Federação Brasileira</option>
                    <option value="Tutoriais">Tutoriais</option>
                    <option value="Competições Nacionais">Competições Nacionais</option>
                    <option value="Competições Internacionais">Competições Internacionais</option>
                    <option value="Seleção Brasileira">Seleção Brasileira</option>
                </select>
                <br><br>
                <input class="form-control" type="text" id="titulo_noticia" name="titulo_noticia" placeholder="Insira o título da notícia" maxlength="100">
                <br><br>
                <textarea class="form-control" type="text" id="texto_noticia" name="texto_noticia" placeholder="Insira o resumo da notícia" maxlength="5000" rows="10"></textarea>
                <br>
                <spam class="botao">
                    <button class=" btn btn-primary" id="btn_noticia" type="button">Enviar</button>
                </spam>
            </form>
        </div>
    </div>
</section>

<section>
    <div class>
        <div id="noticias" class="list-group"></div>
    </div>
</section>


<?php require_once("estilo_pagina/rodape.php"); ?>