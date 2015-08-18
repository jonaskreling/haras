	<script>
		var baseUrlAction = "<?php echo Yii::app()->baseUrl."/index.php/"; ?>";
		var baseUrl = "<?php echo Yii::app()->baseUrl.'/assets'; ?>";
		var nome    = "<?php echo (!Yii::app()->user->isGuest) ? Yii::app()->user->nome.' '.Yii::app()->user->sobrenome : ''; ?>";
		var logado  =  <?php echo (!Yii::app()->user->isGuest) ? 'true' : 'false'; ?>;
		var user  =  <?php echo isset(Yii::app()->user->tipoUsuario)?Yii::app()->user->tipoUsuario:0; ?>;
	</script>

<!-- SCRIPTS USADOS NA APLICAÇÃO -->
<?php 
	$baseScript = Yii::app()->baseUrl."/assets/script/";
	
	echo CHtml::scriptFile($baseScript."app.js");
	echo CHtml::scriptFile($baseScript."menu.js");
	
	/* DIRETIVAS */
	echo CHtml::scriptFile($baseScript."diretivas/imageDiretiva.js");
	echo CHtml::scriptFile($baseScript."diretivas/menuAdminDiretiva.js");
	
	/* SERVICES */
	echo CHtml::scriptFile($baseScript."service/animal/animalService.js");
	echo CHtml::scriptFile($baseScript."service/pagina/paginaService.js");
	echo CHtml::scriptFile($baseScript."service/exposicao/exposicaoService.js");
	echo CHtml::scriptFile($baseScript."service/venda/vendaService.js");
	echo CHtml::scriptFile($baseScript."service/raca/racaService.js");
	echo CHtml::scriptFile($baseScript."service/usuario/usuarioService.js");
	echo CHtml::scriptFile($baseScript."service/util/utilService.js");
	
	/* CONTROLLERS */
	echo CHtml::scriptFile($baseScript."controller/animal/AnimalController.js");
	echo CHtml::scriptFile($baseScript."controller/animal/TipoAnimalController.js");
	echo CHtml::scriptFile($baseScript."controller/slide/SlideInicialController.js");
	echo CHtml::scriptFile($baseScript."controller/slide/SlidePadraoController.js");
	echo CHtml::scriptFile($baseScript."controller/exposicao/ExposicaoGrupoController.js");
	echo CHtml::scriptFile($baseScript."controller/exposicao/ExposicaoController.js");
	echo CHtml::scriptFile($baseScript."controller/historia/HistoriaController.js");
	echo CHtml::scriptFile($baseScript."controller/contato/ContatoController.js");
	echo CHtml::scriptFile($baseScript."controller/venda/VendaController.js");
	echo CHtml::scriptFile($baseScript."controller/venda/VendaInternaController.js");
	echo CHtml::scriptFile($baseScript."controller/admin/AdminController.js");
	echo CHtml::scriptFile($baseScript."controller/admin/raca/AdminRacaController.js");
	echo CHtml::scriptFile($baseScript."controller/admin/tipovenda/AdminTipovendaController.js");
	echo CHtml::scriptFile($baseScript."controller/admin/pagina/AdminPaginaController.js");
	echo CHtml::scriptFile($baseScript."controller/admin/usuario/AdminUsuarioController.js");
	echo CHtml::scriptFile($baseScript."controller/admin/exposicao/AdminExposicaoController.js");
	echo CHtml::scriptFile($baseScript."controller/admin/exposicao/AdminNovaExposicaoController.js");
	echo CHtml::scriptFile($baseScript."controller/admin/venda/AdminVendaController.js");
	echo CHtml::scriptFile($baseScript."controller/admin/venda/AdminNovaVendaController.js");
	echo CHtml::scriptFile($baseScript."controller/admin/animal/AdminAnimalController.js");
	echo CHtml::scriptFile($baseScript."controller/admin/animal/AdminNovoAnimalController.js");
	echo CHtml::scriptFile($baseScript."controller/admin/configuracao/AdminConfiguracaoController.js");
	
	echo CHtml::scriptFile($baseScript."usuario.js");
	echo CHtml::scriptFile($baseScript."login.js");
	echo CHtml::scriptFile($baseScript."anuncio.js");
	echo CHtml::scriptFile($baseScript."index.js");
	echo CHtml::scriptFile($baseScript."busca.js");
	
	//echo CHtml::scriptFile($baseScript."admin/animal.js"); 
?>
	
	<script>
		angular.bootstrap(document, ['app']);
	</script>