<?php 
    /**
     * MENU EXPOSIÇÃO
     */
?>
<div ng-controller="AdminExposicaoController">
	<div class='row'>
		<div class='col-md-4'>
			<table>
				<tr>
					<td>
						<div class="btn-toolbar" role="toolbar">
							<div class="btn-group">
								<button type='button' class='btn btn-default icones' ng-click='paginaMenosExposicao()'><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>
								<button type='button' class='btn btn-default icones' ng-click='paginaMaisExposicao()'><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
							</div>
						</div>
					</td>
					<td class='td-contagem font-80 text-nowrap'>{{exposicaoInicio}} - {{exposicaoFim}} de {{exposicaoQtd}}</td>
				</tr>
			</table>
		</div>	
		<div class='col-md-8'>
			<div class="btn-toolbar" role="toolbar">
				
				<div class="btn-group">
					<button type='button' ng-click='exposicaoCarregar()' class='btn btn-default icones' data-toggle="tooltip" data-placement="bottom" title="Recarregar">
						<span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
						&nbsp;&nbsp;Recarregar
					</button>
					<button type='button' ng-click='adicionarExposicao()' class='btn btn-success '>
					    <i class="glyphicon glyphicon-plus"></i>
					    &nbsp;&nbsp;Nova exposição
					</button>
				</div>
			
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						Mais opções <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#" ng-click='limparExposicoes()'>Limpar lista de exibição</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<div class='panel-group' id='accordionExposicao' role='tablist' aria-multiselectable='false' ng-init='listaexposicao = []'>
		<div class='panel panel-primary' ng-show='false'></div>
		<div class='panel panel-primary' ng-show='listaexposicao.length == 0'>
			<div class='panel-heading hand' role='tab'>
				<h4 ng-click='carregarExposicoes()'>Carregue sua lista de exposições.</h4>
			</div>	
		</div>
		<div class='panel panel-default' ng-repeat='exp in listaexposicao' ng-show='exp.show'>
			<div class='panel-heading' role='tab' id='headingidd'>
				<div class='row'>
					<div class='col-sm-9'>
						<h4 class='panel-title text-capitalize'>
							<a data-toggle='collapse' data-parent='#accordionExposicao' href='#exp{{exp.id}}' aria-expanded='false' aria-controls='exp{{exp.id}}'>
								{{exp.nome}}
							</a>
						</h4>
					</div>
					<div class='col-sm-3 text-right'>
						<h4 class='panel-title'>
							<a data-toggle='collapse' data-parent='#accordionExposicao' href='#exp{{exp.id}}' aria-expanded='false' aria-controls='exp{{exp.id}}'>
								{{exp.datanome}}
							</a>
						</h4>
					</div>
				</div>
			</div>
			<div id='exp{{exp.id}}' class='panel-collapse collapse' role='tabpanel' aria-labelledby='exph{{exp.id}}'>
				<div class='panel-body'>
					
					<ul class="nav nav-tabs" role="tablist" id='tabExposicao{{exp.id}}'>
						<li role="presentation" class="active">
							<a href="#exposicao{{exp.id}}" aria-controls="exposicao{{exp.id}}" role="tab" data-toggle="tab">
								<span class="glyphicon glyphicon-flag" aria-hidden="true"></span>
								&nbsp;&nbsp;Exposição
							</a>
						</li>
						<li role="presentation">
							<a href="#fotosexposicao{{exp.id}}" aria-controls="fotosexposicao{{exp.id}}" role="tab" data-toggle="tab">
								<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
								&nbsp;&nbsp;Fotos
							</a>
						</li>
					</ul>
					
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="exposicao{{exp.id}}">
							<div class='row'>
								<div class='col-sm-12'>
									<form class="form-horizontal">
										<div class="form-group bottom">
											<label class="col-sm-2 control-label font-80">Código:</label>
											<div class="col-sm-10">
												<p class="form-control-static font-80">{{exp.id}}</p>
											</div>
										</div>
										<div class="form-group bottom">
											<label class="col-sm-2 control-label font-80">Nome:</label>
											<div class="col-sm-4">
												<p class="form-control-static font-80">{{exp.nome}}</p>
											</div>
											<label class="col-sm-2 control-label font-80">Data:</label>
											<div class="col-sm-4">
												<p class="form-control-static font-80">{{exp.datanome}}</p>
											</div>
										</div>
										<div class="form-group bottom">
											<label class="col-sm-2 control-label font-80">Local:</label>
											<div class="col-sm-4">
												<p class="form-control-static font-80">{{exp.local}}</p>
											</div>
											<label class="col-sm-2 control-label font-80">Cidade:</label>
											<div class="col-sm-4">
												<p class="form-control-static font-80">{{exp.cidade}}</p>
											</div>
										</div>
										<div class="form-group bottom">
											<label class="col-sm-2 control-label font-80">Estado:</label>
											<div class="col-sm-4">
												<p class="form-control-static font-80">{{exp.estado}}</p>
											</div>
											<label class="col-sm-2 control-label font-80">País:</label>
											<div class="col-sm-4">
												<p class="form-control-static font-80">{{exp.pais}}</p>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="fotosexposicao{{exp.id}}">
							<br />
							<div class="row">
								
								<div class="col-xs-12 col-md-3" ng-repeat="imagem in exp.imagens">
									<a href="#" class="thumbnail imageViewCadastro">
										<img ng-src="{{imagem.url}}" />
									</a>
								</div>
								
							</div>
							
						</div>
					</div>
					<br />
					<br />
					
					
					<div class='row text-right'>
						<div class='col-sm-12'>
							<button type='button' class='btn btn-default btn-sm' ng-click='linkar(exp.veranuncio)'>
								<i class='glyphicon glyphicon-eye-open'></i>
								&nbsp;&nbsp;Visualizar exposição
							</button>&nbsp;
							<button type='button' class='btn btn-danger btn-sm' ng-click='exposicaoExcluido($index)'>
								<i class='glyphicon glyphicon-trash'></i>
								&nbsp;&nbsp;Excluir
							</button>&nbsp;
							<button type='button' class='btn btn-primary btn-sm' ng-click='editarExposicao($index)'>
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