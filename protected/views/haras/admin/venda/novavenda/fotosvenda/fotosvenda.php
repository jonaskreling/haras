<?php 
    /**
     * TAB FOTOS VENDA
     */ 
     $path = Yii::app()->baseUrl.'/assets';
?>
<div role="tabpanel" class="tab-pane" id="fotosvenda">
	<br />
	<div class='row'>
		<imagem-upload></imagem-upload>
		<div class="col-xs-12 col-md-4 text-right">
			<button type='button' class='btn btn-primary icones' ng-click='tabShowVenda("venda")'><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Voltar</button>
			<button type='button' class='btn btn-success icones' ng-click='salvarVenda()' ng-disabled="venda.isNotSave">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				&nbsp;&nbsp;Salvar venda
			</button>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-xs-12 col-md-6 well" style="background-color:rgba(255,255,255,0.8);">
			<a href="#" class="thumbnail imageUpLoad">
				<img ng-src="{{venda.imagens.0.url}}"  ng-hide="venda.imagens.0.show" />
				<img src="<?php echo $path.'/images/simbolo/loader.gif'; ?>" ng-show="venda.imagens.0.show" />
			</a>
		</div>
	</div>
</div>