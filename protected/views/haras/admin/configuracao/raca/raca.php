<?php
    /**
     * TAB RAÇA
     */ 
    
?>
<div role="tabpanel" class="tab-pane" id="tabraca" ng-controller="AdminRacaController">
	<br />
	<div class='row' ng-show='novaraca.show'>
		<div class="form-group">
			<div class="col-sm-6 col-sm-offset-2">
				<input type="text" class="form-control" ng-model="novaraca.dados.nome" placeholder="Nome da raça" maxlength="30" />
				<br />
			</div>
			<div class="col-sm-6 col-sm-offset-2">
				<input type="text" class="form-control" ng-model="novaraca.dados.origem" placeholder="Origem da raça" maxlength="30" />
				<br />
			</div>
			<div class='col-sm-8 text-right'>
				<button type='button' class='btn btn-default' ng-click="carregarRacas()">
					<i class="glyphicon glyphicon-ok"></i>
					&nbsp;&nbsp;Voltar
				</button>
				<button type='button' class='btn btn-primary' ng-click="salvarRaca()">
					<i class="glyphicon glyphicon-ok"></i>
					&nbsp;&nbsp;Salvar
				</button>
			</div>
			<input type='text' value='' ng-model='raca.id' id='id' name='id' ng-hide='true' />
		</div>
	</div>
	<div class='row' ng-show='listaraca.show'>
		<div class='col-md-6'>
			<h4>Raças</h4>
		</div>
		<div class='col-md-3 col-sm-offset-3'>
			<button type='button' class='btn btn-primary btn-block' ng-click='novaRaca()'><i class='glyphicon glyphicon-plus'></i>&nbsp;&nbsp;Raça</button>
		</div>
	</div>
	<div class='row' ng-show='listaraca.show'>
		<div class='col-sm-12'>
			<div class="table-responsive table-config">
				<table class="table table-hover table-striped bottom">
					<thead>
						<tr>
							<th class='text-center' width="10%">Código</th>
							<th class='text-left' >Raça</th>
							<th class='text-center' width="10%">Editar</th>
							<th class='text-center' width="10%">Deletar</th>
						</tr>
					</thead>
				</table>
				<table class="table table-hover table-striped">
					<tbody>
						<tr class='hand' ng-repeat='raca in listaraca.dados'>
							<th class='text-center' scope='row' width='10%'>{{raca.id}}</th>
							<td class='text-left text-capitalize' >{{raca.nome}}</td>
							<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-edit' ng-click='editarRaca($index)'></i></td>
							<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-trash' ng-click='deleteRaca($index)'></i></td>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<br />
	<br />
	<br />
	<br />
</div>