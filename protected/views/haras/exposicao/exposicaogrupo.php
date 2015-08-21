<?php
	/**
	 * PÁGINA DE EXPOSIÇÃO GRUPO
	 */
	include_once dirname(__FILE__).'/../slides/slidePadrao.php';
	$path = Yii::app()->baseUrl.'/assets';
	
?>
<div class="container" ng-controller="ExposicaoGrupoController" ng-show="listaexposicoes != undefined">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<h2>{{exposicaoNome}}</h2>
			<hr />
		</div>
	</div>
    <div class="row" ng-repeat="exposicoesdivididas in listaexposicoesdivididas">
		<div class="col-xs-12 col-md-4" ng-repeat="exposicao in exposicoesdivididas" ng-click="openExposicao(exposicao.id)">
			<div class="thumbnail venda">
				<i ng-style="{'background-image':'url({{exposicao.imagens.0.url}})'}" class="image-animal-page"></i>
				<h4 class="text-center no-wrap-text">{{exposicao.nome}}</h4>
				<p class="text-center no-wrap-text" style="font-size: 12px">{{exposicao.qtdimagem}} foto(s)</p>
			</div>
		</div>
	</div>
	<br />
	<br />
	<br />
	<br />
	<br />
</div>