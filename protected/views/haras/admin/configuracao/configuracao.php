<?php
	/**
	 * CONFIGURAÇÃO
	 */ 
	 
?>
<div class='row' ng-controller="AdminConfiguracaoController">
	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist" id='tabGeral'>
			<li role="presentation" class="active" ng-show="user == 3">
				<a href="#tabgeral" aria-controls="tabgeral" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
					&nbsp;&nbsp;Geral
				</a>
			</li>
			<li role="presentation">
				<a href="#tabraca" aria-controls="tabraca" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
					&nbsp;&nbsp;Raças
				</a>
			</li>
			<li role="presentation">
				<a href="#tabtipovenda" aria-controls="tabtipovenda" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-random" aria-hidden="true"></span>
					&nbsp;&nbsp;Tipo de venda
				</a>
			</li>
			<li role="presentation">
				<a href="#tabpagina" aria-controls="tabpagina" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
					&nbsp;&nbsp;Páginas
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<?php 
				include_once 'geral/geral.php';
				include_once 'raca/raca.php';
				include_once 'tipovenda/tipovenda.php';
				include_once 'pagina/pagina.php';
			?>
		</div>
	</div>
</div>