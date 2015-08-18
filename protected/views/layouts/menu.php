<?php
	$controller = Yii::app()->getController();
	$default_controller = Yii::app()->defaultController;
	$isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction || $controller->action->id === 'deslogarUsuario')) ? true : false;
	$isHome = true;

?>
<nav class="navbar navbar-default navbar-fixed-top" ng-controller="MenuController" id='menu' ng-class='classMenu'>
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand text-center" href="<?php echo Yii::app()->baseUrl.'/index.php'; ?>">
				<img src='<?php echo Yii::app()->baseUrl.'/assets/images/simbolo/logo-transparente.png'; ?>' class='esconder-celular' />
				<!--p>Haras Aleixo</p>
				<h5 class='text-right esconder-celular'></h5-->
			</a>
		</div>
			
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo $this->createUrl('historia'); ?>">História</a></li>
				<li><a href="<?php echo $this->createUrl('tipoAnimal/3'); ?>">Garanhões</a></li>
				<li><a href="<?php echo $this->createUrl('tipoAnimal/4'); ?>">Matrizes</a></li>
				<li><a href="<?php echo $this->createUrl('tipoAnimal/5'); ?>">Potros/Potras</a></li>
				<li><a href="<?php echo $this->createUrl('vendas'); ?>">Vendas</a></li>
				<li><a href="<?php echo $this->createUrl('exposicaoGrupo'); ?>">Exposições</a></li>
				<li><a href="<?php echo $this->createUrl('contato'); ?>">Contato/Localização</a></li>
			</ul>
				
			<ul class="nav navbar-nav navbar-right" ng-hide="<?php echo $isHome?'true':'false';?>">
				<li>
					
				</li>
				<li class="dropdown" ng-show="logado">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{nome}}<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#" ng-click='linkar("admin/1")'>Configurações</a></li>
						<li><a href="#" ng-click='linkar("admin/6")'>Minha Conta</a></li>
						<li><a href="#" ng-click='linkar("admin/2")'>Vendas</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo $this->createUrl('deslogarUsuario'); ?>">Sair</a></li>
					</ul>
				</li>
				<li ng-show="!logado"><a href="<?php echo $this->createUrl('abrirLogin'); ?>">Login</a></li>
			</ul>				
		</div>
	</div>
</nav>