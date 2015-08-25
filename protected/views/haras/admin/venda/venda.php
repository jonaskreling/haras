<?php 
    /**
     * MENU VENDAS
     */
?>
<div ng-controller="AdminVendaController">
	<div class='row'>
		<div class='col-md-4'>
			<table>
				<tr>
					<td>
						<div class="btn-toolbar" role="toolbar">
							<div class="btn-group">
								<button type='button' class='btn btn-default icones' ng-click='paginaMenosVenda()'><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>
								<button type='button' class='btn btn-default icones' ng-click='paginaMaisVenda()'><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
							</div>
						</div>
					</td>
					<td class='td-contagem font-80 text-nowrap'>{{vendaInicio}} - {{vendaFim}} de {{vendaQtd}}</td>
				</tr>
			</table>
		</div>	
		<div class='col-md-8'>
			<div class="btn-toolbar" role="toolbar">
				
				<div class="btn-group">
					<button type='button' ng-click='vendaCarregar()' class='btn btn-default icones' data-toggle="tooltip" data-placement="bottom" title="Recarregar">
						<span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
						&nbsp;&nbsp;Recarregar
					</button>
					<button type='button' ng-click='adicionarVenda()' class='btn btn-success '>
					    <i class="glyphicon glyphicon-plus"></i>
					    &nbsp;&nbsp;Nova venda
					</button>
				</div>
			
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						Mais opções <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#" ng-click='limparVendas()'>Limpar lista de exibição</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<div class='panel-group' id='accordionVenda' role='tablist' aria-multiselectable='true' ng-init='listavenda = []'>
		<div class='panel panel-primary' ng-show='false'></div>
		<div class='panel panel-primary' ng-show='listavenda.length == 0'>
			<div class='panel-heading hand' role='tab'>
				<h4 ng-click='carregarVendas()'>Carregue sua lista de vendas.</h4>
			</div>	
		</div>
		<div class='panel panel-default' ng-class='msg.classe' ng-repeat='msg in listavenda' ng-show='msg.show'>
			<div class='panel-heading' role='tab' id='headingidd' ng-click='vendaLido($index)'>
				<div class='row'>
					<div class='col-sm-9'>
						<h4 class='panel-title text-capitalize'>
							<a data-toggle='collapse' data-parent='#accordionVenda' href='#msg{{msg.id}}' aria-expanded='false' aria-controls='msg{{msg.id}}'>
								{{msg.tipovendanome}}&nbsp;-&nbsp;{{msg.animalnome}}
							</a>
						</h4>
					</div>
					<div class='col-sm-3 text-right'>
						<h4 class='panel-title'>
							<a data-toggle='collapse' data-parent='#accordionVenda' href='#msg{{msg.id}}' aria-expanded='false' aria-controls='msg{{msg.id}}'>
								{{msg.data}}
							</a>
						</h4>
					</div>
				</div>
			</div>
			<div id='msg{{msg.id}}' class='panel-collapse collapse' role='tabpanel' aria-labelledby='msgh{{msg.id}}'>
				<div class='panel-body'>
					<div class='row'>
						<div class='col-sm-3'>
							<a href="#" class="thumbnail imageViewCadastro">
								<img ng-src='{{msg.imagens.0.url}}' >
							</a>
						</div>
						<div class='col-sm-9'>
							
							<form class="form-horizontal">
								<div class="form-group bottom">
									<label class="col-sm-3 control-label font-80">Anúncio:</label>
									<div class="col-sm-9">
										<p class="form-control-static font-80">{{msg.id}}</p>
									</div>
								</div>
								<div class="form-group bottom">
									<label class="col-sm-3 control-label font-80">Tipo de venda:</label>
									<div class="col-sm-3">
										<p class="form-control-static font-80">{{msg.tipovendanome}}</p>
									</div>
									<label class="col-sm-3 control-label font-80">Valor:</label>
									<div class="col-sm-3">
										<p class="form-control-static font-80">{{msg.valor | currency}}</p>
									</div>
								</div>
								<div class="form-group bottom">
									<label class="col-sm-3 control-label font-80">Animal:</label>
									<div class="col-sm-9">
										<p class="form-control-static font-80">{{msg.animalnome}}</p>
									</div>
									<label class="col-sm-3 control-label font-80" ng-show="msg.showAnimal2">Animal:</label>
									<div class="col-sm-9" ng-show="msg.showAnimal2">
										<p class="form-control-static font-80">{{msg.animal2nome}}</p>
									</div>
								</div>
							</form>
						</div>
					</div>
					<br />
					<div class='row text-right'>
						<div class='col-sm-12'>
							<button type='button' class='btn btn-default btn-sm' ng-click='linkar(msg.veranuncio)'>
								<i class='glyphicon glyphicon-eye-open'></i>
								&nbsp;&nbsp;Visualizar venda
							</button>&nbsp;
							<button type='button' class='btn btn-danger btn-sm' ng-click='vendaExcluido($index)'>
								<i class='glyphicon glyphicon-trash'></i>
								&nbsp;&nbsp;Excluir
							</button>&nbsp;
							<button type='button' class='btn btn-primary btn-sm' ng-click='editarVenda($index)'>
								<i class='glyphicon glyphicon-edit'></i>
								&nbsp;&nbsp;Editar
							</button>&nbsp;
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>