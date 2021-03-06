<?php
	include_once 'slides/slideInicial.php';
	
	$baseUrlImage = Yii::app()->baseUrl."/assets/images/simbolo/";
	
?>

<div class="container page" ng-controller="IndexController">
	
	<div class="row">
		<div class="col-xs-12 col-md-4">
			<h2>O HARAS</h2>
			<div class="thumbnail venda">
	      		<img src="<?php echo $baseUrlImage.'oharas.jpg'; ?>" alt="" class="image-border-dashed" style="min-height:200px;overflow:hidden;">
	      	</div>
			<p class="text-left">O <b>Haras Aleixo</b> se destaca na criação e desenvolvimento da raça, produzindo uma enorme gama de campeões.</p>
			<p class="text-right">
				<a class="btn btn-primary btn-lg" href="<?php echo $this->createUrl('historia'); ?>" role="button">Saiba mais...</a>
			</p>
		</div>
		<div class="col-xs-12 col-md-4">
			<h2>MATRIZES</h2>
			<div class="thumbnail venda">
	      		<img src="<?php echo $baseUrlImage.'matrizes.jpg'; ?>" alt="" class="image-border-dashed" style="min-height:200px;overflow:hidden;">
	      	</div>
			<p class="text-left">Possuímos em nosso plantel, os melhores e mais premiados exemplares da raça <b>Mangalarga Marchador</b>.</p>
			<p class="text-right">
				<a class="btn btn-primary btn-lg" href="<?php echo $this->createUrl('tipoAnimal/2'); ?>" role="button">Saiba mais...</a>
			</p>
		</div>
		<div class="col-xs-12 col-md-4">
			<h2>VENDAS</h2>
			<div class="thumbnail venda">
	      		<img src="<?php echo $baseUrlImage.'vendas.jpg'; ?>" alt="" class="image-border-dashed" style="min-height:200px;overflow:hidden;">
	      	</div>
			<p class="text-left">Conheça e adquira o que há de melhor na genética da raça, para desenvolver sua criação.</p>
			<p class="text-right">
				<a class="btn btn-primary btn-lg" href="<?php echo $this->createUrl('vendas'); ?>" role="button">Saiba mais...</a>
			</p>
		</div>
	</div>
	<br />
	<br />
	<br />
</div>