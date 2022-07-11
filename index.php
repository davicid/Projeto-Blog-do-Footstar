<?php

session_start();

require_once("estilo_pagina/barra_navegacao.php");
require_once("estilo_pagina/capa.php");
?>

<section class="area_secao">
	<div class="container area_introducao">
		<h1><b>Introdução ao Footstar</b></h1>
		<p><b>Footstar (Planetarium Football Star) é um jogo online onde você está no controle de um jogador de futebol, tentando se tornar o melhor jogador que o planeta já viu.</b></p>

		<p><b>Sua tarefa básica é treinar o seu player o melhor que puder. Isto irá permitir você jogar nas melhores equipes e, portanto, tenha um bom contrato que lhe permitirá pagar por um melhor estilo de vida e itens de jogos. Você também deve ter uma boa relação com o seu treinador para que você possa ter a chance de jogar tanto quanto você puder.</b></p>

		<p><b>Você também pode interagir com seus companheiros de equipe e viver a química da equipe e emoção de competir no campeonato, taça nacional e competições internacionais junto com eles. Quanto mais você joga, mais experiência você vai ganhar e assim você vai jogar ainda melhor. Torne-se um dos melhores do seu país para jogar pela sua seleção nacional, assim você pode ter a chance de levar o seu país para a Copa do Mundo e ganhá-la.</b></p>

		<p><b>Somente as melhores performances vão levar você para o reconhecimento internacional entre os vários outros jogadores ao redor do globo.</b></p>

		<p><b>Você pode logar todos os dias para acompanhar a evolução do seu jogador e obter cada vez mais conquistas.<b></p>

	</div>
</section>

<section class="area_secao">
	<h1 class="titulo_noticias"><b>Últimas Notícias</b></h1>
	<br>
	<div class="container">
		<?php
		require_once('recuperar_noticias.php');
		ultimasNoticia();
		?>
	</div>
	<div class="container">
		<div class="row">

			<div class="col-xl-4 col-lg-4 col-md-6">
				<a href="mostrar_noticias.php?tipo_noticia='Ultimas Atualizações'"><img src="imagens/tutoriais.png" class="img-fluid"><b>Ultimas Atualizações</b></a>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6">
				<a href="mostrar_noticias.php?tipo_noticia='Federação Brasileira'"><img src="imagens/fede_br.png" class="img-fluid"><b>Federação Brasileira</b></a>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6">
				<a href="mostrar_noticias.php?tipo_noticia='Tutoriais'"><img src="imagens/ultimas_atualizacoes.png" class="img-fluid"><b>Tutoriais</b></a>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6">
				<a href="mostrar_noticias.php?tipo_noticia='Competições Nacionais'"><img src="imagens/comp_nacionais.png" class="img-fluid"><b>Competições Nacionais</b></a>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6">
				<a href="mostrar_noticias.php?tipo_noticia='Competições Internacionais'"><img src="imagens/comp_internacionais.png" class="img-fluid"><b>Competições Internacionais</b></a>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-6">
				<a href="mostrar_noticias.php?tipo_noticia='Seleção Brasileira'"><img src="imagens/sele_br.png" class="img-fluid"><b>Seleção Brasileira</b></a>
			</div>
		</div>
	</div>
</section>

<?php require_once("estilo_pagina/rodape.php"); ?>