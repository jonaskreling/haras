<?php 
    /**
     * TAB PREMIAÇÃO
     */ 
?>
<div role="tabpanel" class="tab-pane" id="premiacao">
	<br />
	<div class='row'>
		<div class='col-md-12'>
			
			<div class="form-group col-md-6">
				<input type="text" class="form-control" ng-model="novapremiacao" placeholder="Nova premiação" maxlength="30" />
			</div>
			
			<div class="form-group col-md-6 text-left">
				<button class="btn btn-primary" ng-click="adicionarPremiacao()">
				    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				    &nbsp;&nbsp;Adicionar premiação
				</button>
			</div>
			
			<div class="col-md-12">
				
				<div class="table-responsive table-config">
    				<table class="table table-hover table-striped bottom">
    					<thead>
    						<tr>
    							<th class='text-left' >Premiação</th>
    							<th class='text-center' width="10%">Deletar</th>
    						</tr>
    					</thead>
    				</table>
    				<table class="table table-hover table-striped">
    					<tbody>
    						<tr class='hand' ng-repeat='premiacao in animal.premiacoes'>
    							<td class='text-left text-capitalize' >{{premiacao.descricao}}</td>
    							<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-trash' ng-click='deletePremiacao($index)'></i></td>
    						</tr>
    					</tbody>
    				</table>
    			</div>
				
			</div>
			
		</div>
	</div>
	<div class='row'>
		<div class="col-xs-12 col-md-8 text-right">
			<button type='button' class='btn btn-primary icones' ng-click='tabShowAnimal("genealogia")'><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Anterior</button>
			<button type='button' class='btn btn-primary icones' ng-click='tabShowAnimal("fotos")'>Próxima&nbsp;&nbsp;<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
		</div>
	</div>
	
</div>