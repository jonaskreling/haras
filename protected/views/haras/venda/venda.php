<?php
	/**
	 * PÁGINA DE VENDA
	 */
	include_once dirname(__FILE__).'/../slides/slidePadrao.php';
	$path = Yii::app()->baseUrl.'/assets';
	
?>
<div class="container" ng-controller="VendaController">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<h2>Vendas</h2>
			<hr />
		</div>
		
		<div class="col-xs-12 col-md-6" ng-click="linkar('<?php echo $this->createUrl('vendasInterna/1'); ?>')">
			<div class="thumbnail venda">
				<img src="<?php echo $path.'/images/simbolo/vendas.png'; ?>" alt="" >
				<h2>Garanhões</h2>
			</div>
		</div>
		<div class="col-xs-12 col-md-6" ng-click="linkar('<?php echo $this->createUrl('vendasInterna/2'); ?>')">
			<div class="thumbnail venda">
				<img src="<?php echo $path.'/images/simbolo/vendas.png'; ?>" alt="">
				<h2>Coberturas</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-6" ng-click="linkar('<?php echo $this->createUrl('vendasInterna/3'); ?>')">
			<div class="thumbnail venda">
				<img src="<?php echo $path.'/images/simbolo/vendas.png'; ?>" alt="">
				<h2>Embriões</h2>
			</div>
		</div>
		<div class="col-xs-12 col-md-6" ng-click="linkar('<?php echo $this->createUrl('vendasInterna/4'); ?>')">
			<div class="thumbnail venda">
				<img src="<?php echo $path.'/images/simbolo/vendas.png'; ?>" alt="">
				<h2>Óvulos</h2>
			</div>
		</div>
	</div>
	<br />
	<br />
	<br />
	<br />
	<br />
</div>