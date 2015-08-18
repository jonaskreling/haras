<?php
	/**
	 * PÁGINA DE EXPOSIÇÃO
	 */
	include_once dirname(__FILE__).'/../slides/slidePadrao.php';
	$path = Yii::app()->baseUrl.'/assets';
	
?>
<script>
    var id = <?php echo $this->id; ?>;
</script>
<div class="container" ng-controller="ExposicaoController" ng-show="exposicao != undefined">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<h2 class="text-uppercase">{{exposicao.nome}}  &nbsp;&nbsp;&nbsp;&nbsp;<small class="text-lowercase">{{exposicao.data | date:'d'}}&nbsp;de&nbsp;{{exposicao.data | date:'MMMM, yyyy'}}</small></h2>
			<hr />
			<h4><small class="text-uppercase">{{exposicao.local}} </small></h4>
			<br />
		</div>
	</div>
    <div class="col-xs-12 col-md-8 col-md-offset-2">
		<flex-slider id="exposicao" slide="s in slides" animation="slide" animation-loop="false" smooth-height="true" control-nav="false" sync="#exposicao2-slider">
			<li>
				<img ng-src="{{s}}">
			</li>
		</flex-slider>
		<br />
		<flex-slider id="exposicao2" class="carousel" slide="s in slides" animation="slide" animation-loop="false" smooth-height="false" control-nav="false" item-width="200" item-margin="5" as-nav-for="#exposicao-slider">
			<li class="slider2">
				<img ng-src="{{s}}">
			</li>
		</flex-slider>
		<br />
		<br />
		<br />
		<br />
		<br />
	</div>
</div>