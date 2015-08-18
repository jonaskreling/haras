<?php 
    /**
     * TAB EXPOSIÇÃO
     */ 
?>
<div role="tabpanel" class="tab-pane active" id="exposicao">
	<br />
	<div class='row'>
		<div class='col-md-8'>
			
			<div class="form-class col-md-6">
				<label for="nome" required>Nome*</label>
				<input type="text" class="form-control" ng-model="exposicao.nome" placeholder="Nome da exposição" maxlength="30" />
			</div>
			
			<div class="form-group col-md-6">
				<label for="data">Data*</label>
				<input type="text" class="form-control" ng-model="exposicao.data" ui-mask="99/99/9999" maxlength="30" />
			</div>
			
			<div class="form-group col-md-6">
				<label for="local">Local</label>
				<input type="text" class="form-control" ng-model="exposicao.local" placeholder="Local" maxlength="30" />
			</div>
			
			<div class="form-group col-md-6">
				<label for="cidade">Cidade</label>
				<input type="text" class="form-control" ng-model="exposicao.cidade" placeholder="Cidade" maxlength="30" />
			</div>
			
			<div class="form-group col-md-6">
				<label for="estado">Estado</label>
				<input type="text" class="form-control" ng-model="exposicao.estado" placeholder="Estado" maxlength="30" />
			</div>
			
			<div class="form-group col-md-6">
				<label for="pais">País</label>
				<input type="text" class="form-control" ng-model="exposicao.pais" placeholder="País" maxlength="30" />
			</div>
			
		</div>
	</div>
	
	<div class='row'>
		<div class="col-xs-12 col-md-8 text-right">
			<button type='button' class='btn btn-primary icones' ng-click='tabShowExposicao("fotosexposicao")'>
				Próxima&nbsp;&nbsp;
				<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
			</button>
		</div>
	</div>
</div>