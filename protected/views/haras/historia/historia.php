<?php
	/**
	 * PÁGINA DE HISTÓRIA
	 */
	include_once dirname(__FILE__).'/../slides/slidePadrao.php';
	$path = Yii::app()->baseUrl.'/assets';
	
?>
<div class="container" ng-controller="HistoriaController">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<h2>{{historiaNome}}</h2>
			<hr />
		</div>
	</div>
    <div class="row">
		<div class="col-xs-12 col-md-4">
			História do Haras.
		</div>
	</div>
	<br />
	<br />
	<br />
	<br />
	<br />
</div>