<?php
    /**
     * TAB TIPOVENDA
     */ 
?>
<div role="tabpanel" class="tab-pane" id="tabtipovenda" ng-controller="AdminTipovendaController">
	<br />
	<div class='row' ng-show='novotipovenda.show'>
		<div class="form-group">
			<div class="col-sm-6 col-sm-offset-2">
				<input type="text" class="form-control" ng-model="novotipovenda.dados.nome" placeholder="Tipo de venda" maxlength="30" />
				<br />
			</div>
			<div class='col-sm-8 text-right'>
				<button type='button' class='btn btn-default' ng-click="carregarTipovendas()">
					<i class="glyphicon glyphicon-ok"></i>
					&nbsp;&nbsp;Voltar
				</button>
				<button type='button' class='btn btn-primary' ng-click="salvarTipovenda()">
					<i class="glyphicon glyphicon-ok"></i>
					&nbsp;&nbsp;Salvar
				</button>
			</div>
		</div>
	</div>
	<div class='row' ng-hide='novotipovenda.show'>
		<div class='col-md-6'>
			<h4>Tipos de venda</h4>
		</div>
		<div class='col-md-3 col-sm-offset-3'>
			<button type='button' class='btn btn-primary btn-block' ng-click='novoTipovenda()'><i class='glyphicon glyphicon-plus'></i>&nbsp;&nbsp;Tipo de venda</button>
		</div>
	</div>
	<div class='row' ng-hide='novotipovenda.show'>
		<div class='col-sm-12'>
			<div class="table-responsive table-config">
				<table class="table table-hover table-striped bottom">
					<thead>
						<tr>
							<th class='text-center' width="10%">Código</th>
							<th class='text-left' >Tipo de venda</th>
							<th class='text-center' width="10%">Editar</th>
							<th class='text-center' width="10%">Deletar</th>
						</tr>
					</thead>
				</table>
				<table class="table table-hover table-striped">
					<tbody>
						<tr class='hand' ng-repeat='tipovenda in listatipovenda.dados'>
							<th class='text-center' scope='row' width='10%'>{{tipovenda.id}}</th>
							<td class='text-left text-capitalize' >{{tipovenda.nome}}</td>
							<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-edit' ng-click='editarTipovenda($index)'></i></td>
							<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-trash' ng-click='deleteTipovenda($index)'></i></td>
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