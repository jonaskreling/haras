<?php 
    /**
     * TAB GENEALOGIA
     */ 
?>
<div role="tabpanel" class="tab-pane" id="genealogia">
	<br />
	<div class='row'>
		<div class='col-md-8'>
			
			<div class="form-group col-md-6">
				<label for="pai">Pai</label>
				<select class="form-control" ng-model="animal.pai" ng-options="pai.id as pai.nome for pai in listatodosanimal">
					<option value="">-- Selecione --</option>
				</select>
			</div>
			
			<div class="form-group col-md-6">
				<label for="mae">Mãe</label>
				<select class="form-control" ng-model="animal.mae" ng-options="mae.id as mae.nome for mae in listatodosanimal">
					<option value="">-- Selecione --</option>
				</select>
			</div>
			
		</div>
	</div>
	<div class='row'>
		<div class="col-xs-12 col-md-8 text-right">
			<button type='button' class='btn btn-primary icones' ng-click='tabShowAnimal("animal")'><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Anterior</button>
			<button type='button' class='btn btn-primary icones' ng-click='tabShowAnimal("premiacao")'>Próxima&nbsp;&nbsp;<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
		</div>
	</div>
	
</div>