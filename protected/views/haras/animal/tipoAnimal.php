<?php
	/**
	 * PÁGINA DE TIPO DE ANIMAL (PÁGINA)
	 */
	include_once dirname(__FILE__).'/../slides/slidePadrao.php';
	$path = Yii::app()->baseUrl.'/assets';
	
?>
<script>
    var tipoanimal = <?php echo $this->tipoanimal; ?>;
</script>
<div class="container" ng-controller="TipoAnimalController" ng-show="listaanimais != undefined">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<h2>{{tipoanimalNome}}</h2>
			<hr />
		</div>
	</div>
    <div class="row" ng-repeat="animaisdivididos in listaanimaisdivididos">
		<div class="col-xs-12 col-md-4" ng-repeat="animal in animaisdivididos" ng-click="openAnimal(animal.id)">
			<div class="thumbnail venda">
				<i ng-style="{'background-image':'url({{animal.imagens.0.url}})'}" class="image-animal-page"></i>
				<h4 class="text-center no-wrap-text">{{animal.nome}}</h4>
				<p class="text-center no-wrap-text" style="font-size: 12px">{{animal.nomepaiemae}}</p>
			</div>
		</div>
	</div>
	<br />
	<br />
	<br />
	<br />
	<br />
</div>