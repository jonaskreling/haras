<?php 
    /**
     * TAB FOTOS EXPOSIÇÃO
     */ 
     $path = Yii::app()->baseUrl.'/assets';
?>
<div role="tabpanel" class="tab-pane" id="fotosexposicao">
	
	<br />
	<div class='row'>
		<imagem-upload></imagem-upload>
		<div class="col-xs-12 col-md-4 text-right">
			<button type='button' class='btn btn-primary icones' ng-click='tabShowExposicao("exposicao")'><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Voltar</button>
			<button type='button' class='btn btn-success icones' ng-click='salvarExposicao()' ng-disabled="exposicao.isNotSave">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				&nbsp;&nbsp;Salvar exposição
			</button>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-xs-12 col-md-6 well" ng-repeat="foto in exposicao.imagens" style="background-color:rgba(255,255,255,0.8);">
			<div class="col-xs-12">
				<div class="col-md-2">
					<button type="button" class="btn btn-default" ng-click="excluirImage($index)" ng-hide="foto.show">
						<i class="glyphicon glyphicon-trash"></i>
					</button>
				</div>
				<div class="col-md-10">
					<div class="form-group">
    					<input type="text" class="form-control" placeholder="Descrição da imagem" ng-model="foto.descricao" maxlength='500' />
  					</div>
				</div>
			</div>
			<a href="#" class="thumbnail imageUpLoad">
				<p class="text-center text-danger" ng-show="foto.excluida">Esta imagem será excluída ao salvar o cadastro.</p>
				<img ng-src="{{foto.url}}"  ng-hide="foto.show" />
				<img src="<?php echo $path.'/images/simbolo/loader.gif'; ?>" ng-show="foto.show" />
			</a>
		</div>
	</div>
					
</div>