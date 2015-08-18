<?php
	/**
	 * PÁGINA DE VENDA INTERNA
	 */
	include_once dirname(__FILE__).'/../slides/slidePadrao.php';
	$path = Yii::app()->baseUrl.'/assets';
?>
<script>
    var tipovenda = <?php echo $this->tipovenda; ?>;
</script>
<div class="container" ng-controller="VendaInternaController">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<h2>{{tipovendasNome}}</h2>
			<hr />
		</div>
	</div>
    <div class="row" ng-repeat="vendasdivididas in listavendasdivididas">
		<div class="col-xs-12 col-md-4" ng-repeat="venda in vendasdivididas" ng-click="openAnimal(venda.animal)">
			<div class="thumbnail venda">
				<img ng-src="{{venda.imagens.0.url}}">
				<h3 class="text-center">{{venda.animalnome}}</h3>
				<p class="text-center">{{venda.nomepaiemae}}</p>
			</div>
		</div>
	</div>
	<br />
	<br />
	<br />
	<br />
	<br />
</div>