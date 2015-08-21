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
				<i ng-style="{'background-image':'url({{venda.imagens.0.url}})'}" class="image-animal-page"></i>
				<h4 class="text-center no-wrap-text">{{venda.animalnome}}</h4>
				<p class="text-center no-wrap-text" style="font-size: 12px">{{venda.nomepaiemae}}</p>
			</div>
		</div>
	</div>
	<br class="esconder-celular" />
	<br class="esconder-celular" />
	<br class="esconder-celular" />
	<br class="esconder-celular" />
	<br class="esconder-celular" />
</div>