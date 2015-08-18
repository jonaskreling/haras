	<!-- CSS's -->
	<?php 
		$controller = Yii::app()->getController();
		$default_controller = Yii::app()->defaultController;
		$isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction || $controller->action->id === 'deslogarUsuario')) ? true : false;
	
		echo CHtml::cssFile(Yii::app()->baseUrl."/assets/bootstrap/css/bootstrap.min.css");
		echo CHtml::cssFile(Yii::app()->baseUrl."/assets/bootstrap-social/bootstrap-social.css");
		echo CHtml::cssFile(Yii::app()->baseUrl."/assets/flex-slider/flexslider.css");
	
		echo CHtml::cssFile(Yii::app()->baseUrl."/assets/css/css.php");
		echo CHtml::cssFile(Yii::app()->baseUrl."/assets/css/menu/menu1.css");
		echo CHtml::cssFile(Yii::app()->baseUrl."/assets/css/aberturas/cssAberturaSite.css");
		if($isHome){
			echo CHtml::cssFile(Yii::app()->baseUrl."/assets/css/aberturas/slides.css");
		}else{
			echo CHtml::cssFile(Yii::app()->baseUrl."/assets/css/slides.css");
		}
		
	?>
	<link href='https://fonts.googleapis.com/css?family=Comfortaa:400,700,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
	
<!-- SCRIPT's -->
	<!-- JQuery -->
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/jquery/jquery.min.js"); ?>
	<!-- Bootstrap core javascript -->
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/bootstrap/js/bootstrap.min.js"); ?>
	<!-- Angular -->
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/angular/angular.min.js"); ?>
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/angular/angular-locale_pt-br.js"); ?>
	<!-- Ui-mask core javascript -->
	<?php
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/ui-utils/ui-utils-ieshiv.min.js");
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/ui-utils/ui-utils.min.js");
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/ui-utils/masks.min.js"); 
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/d3/d3.min.js");
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/angular-chart/dist/angular-charts.js");
		
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/flex-slider/jquery.flexslider-min.js");
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/flex-slider/angular-flexslider.js");
		
		echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/ng-imgur/ng-imgur.js");
	?>