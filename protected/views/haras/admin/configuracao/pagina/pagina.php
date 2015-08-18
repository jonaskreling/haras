<?php
    /**
     * TAB PÁGINA
     */ 
    
?>
<div role="tabpanel" class="tab-pane" id="tabpagina" ng-controller="AdminPaginaController">
	<br />
	<div class='row' ng-show='novapagina.show'>
		<div class="form-group">
			<div class="col-sm-6 col-sm-offset-2">
				<input type="text" class="form-control" ng-model="novapagina.dados.nome" placeholder="Nome da página" maxlength="30" />
				<br />
			</div>
			<div class="col-sm-6 col-sm-offset-2">
				<input type="text" class="form-control text-right" ng-model="novapagina.dados.posicao" placeholder="Posição da página" ui-number-mask="0" min="0" max="10" maxlength="2" />
				<br />
			</div>
			<div class='col-sm-8 text-right'>
			    <button type='button' class='btn btn-default' ng-click="carregarPaginas()">
					<i class="glyphicon glyphicon-ok"></i>
					&nbsp;&nbsp;Voltar
				</button>
				<button type='button' class='btn btn-primary' ng-click="salvarPagina()">
					<i class="glyphicon glyphicon-ok"></i>
					&nbsp;&nbsp;Salvar
				</button>
			</div>
		</div>
	</div>
	<div class='row' ng-show='listapagina.show'>
		<div class='col-md-6'>
			<h4>Páginas</h4>
		</div>
		<div class='col-md-3 col-sm-offset-3'>
			<button type='button' class='btn btn-primary btn-block' ng-click='novaPagina()'><i class='glyphicon glyphicon-plus'></i>&nbsp;&nbsp;Página</button>
		</div>
	</div>
	<div class='row' ng-show='listapagina.show'>
		<div class='col-sm-12'>
			<div class="table-responsive table-config">
				<table class="table table-hover table-striped bottom">
					<thead>
						<tr>
							<th class='text-center' width="10%">Código</th>
							<th class='text-left' >Página</th>
							<th class='text-right' width="30%">posição</th>
							<th class='text-center' width="10%">Editar</th>
							<th class='text-center' width="10%">Deletar</th>
						</tr>
					</thead>
				</table>
				<table class="table table-hover table-striped">
					<tbody>
						<tr class='hand' ng-repeat='pagina in listapagina.dados'>
							<th class='text-center' scope='row' width='10%'>{{pagina.id}}</th>
							<td class='text-left text-capitalize' >{{pagina.nome}}</td>
							<td class='text-right' >{{pagina.posicao}}</td>
							<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-edit' ng-click='editarPagina($index)'></i></td>
							<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-trash' ng-click='deletePagina($index)'></i></td>
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