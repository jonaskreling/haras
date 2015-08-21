<?php 
    /**
     * TAB VENDA
     */ 
?>
<div role="tabpanel" class="tab-pane active" id="venda">
	<br />
	<div class='row'>
		<div class='col-md-8'>
			
			<div class="form-class col-md-6">
				<label for="tipovenda" required>Tipo de venda*</label>
				<select 
					class="form-control" 
					ng-model="venda.tipovenda" 
					ng-options="tipovenda.id as tipovenda.nome for tipovenda in listatipovenda"
					ng-change="escolherTipoVenda()">
					<option value="">-- Selecione --</option>
				</select>
			</div>
			
			<div class="form-group col-md-6 text-right">
				<label for="valor">Valor* <small>(R$)</small></label>
				<input type="text" class="form-control text-right bold-font" id="valor" require='' ng-model='venda.valor' ui-money-mask maxlength='17' />
			</div>
			
			<div class="form-group col-md-6">
				<label for="animal">Animal*</label>
				<select class="form-control" ng-model="venda.animal" ng-options="animal.id as animal.nome for animal in listatodosanimal">
					<option value="">-- Selecione --</option>
				</select>
			</div>
			
			<div class="form-group col-md-6" ng-show="venda.showAnimal2">
				<label for="animal">Animal*</label>
				<select class="form-control" ng-model="venda.animal2" ng-options="animal.id as animal.nome for animal in listatodosanimal">
					<option value="">-- Selecione --</option>
				</select>
			</div>
			
		</div>
	</div>
	
	<div class='row'>
		<div class="col-xs-12 col-md-8 text-right">
			<button type='button' class='btn btn-primary icones' ng-click='tabShowVenda("fotosvenda")'>
				Próxima&nbsp;&nbsp;
				<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
			</button>
		</div>
	</div>
</div>