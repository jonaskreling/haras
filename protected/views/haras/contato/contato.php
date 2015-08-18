<?php
	/**
	 * PÁGINA DE CONTATO
	 */
	include_once dirname(__FILE__).'/../slides/slidePadrao.php';
	$path = Yii::app()->baseUrl.'/assets';
	
?>
<div class="container" ng-controller="ContatoController">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<h2>{{contatoNome}}</h2>
			<hr />
		</div>
	</div>
    <div class="row">
		<div class="col-xs-12 col-md-6">
			<p>Rua Maria Dolores Pereira, Biguaçu - Santa Catarina</p>
			<form>
				<div class="form-group text-left">
					<label for="nome" class="control-label text-left">Nome:</label>
					<input type="text" class="form-control" id="nome" placeholder="Nome completo" ng-model="email.nome">
				</div>
				<div class="form-group text-left">
					<label for="email" class="control-label text-left">Email:</label>
					<input type="text" class="form-control" id="email" ng-model="email.email" placeholder="Email">
				</div>
				<div class="form-group text-left">
					<label for="assunto" class="control-label text-left">Assunto:</label>
					<input type="text" class="form-control" id="assunto" ng-model="email.assunto" placeholder="Assunto">
				</div>
				<div class="form-group text-left">
					<label for="mensagem" class="control-label">Mensagem:</label>
					<textarea class="form-control" id="mensagem" placeholder="Mensagem..." ng-model="email.mensagem" rows="5"></textarea>
				</div>
				<div class="form-group text-right">
					<button class="btn btn-primary" type="submit" ng-click="enviarEmail()">Enviar</button>
				</div>
			</form>
		</div>
		<div class="col-xs-12 col-md-6">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.510559731114!2d-48.7566129!3d-27.4533602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9520acfdce7d550d%3A0x7b76a4d00435f92!2sR.+Maria+Dolores+Pereira+-+LIMEIRA%2C+Bigua%C3%A7u+-+SC%2C+88160-000!5e0!3m2!1spt-BR!2sbr!4v1439420179228" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
	<br />
	<br />
	<br />
	<br />
	<br />
</div>