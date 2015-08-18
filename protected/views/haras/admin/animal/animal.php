<?php
	/**
	* ANIMAIS
	*/
?>
<div ng-controller="AdminAnimalController">
	<div class='row'>
		<div class='col-md-3'>
			<table>
				<tr>
					<td>
						<div class="btn-toolbar" role="toolbar">
							<div class="btn-group">
								<button type='button' class='btn btn-default icones' ng-click='paginaMenosAnimal()'><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>
								<button type='button' class='btn btn-default icones' ng-click='paginaMaisAnimal()'><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
							</div>
						</div>
					</td>
					<td class='td-contagem font-80 text-nowrap'>{{animalInicio}} - {{animalFim}} de {{animalQtd}}</td>
				</tr>
			</table>
		</div>	
		<div class='col-md-9'>
			<div class="btn-toolbar" role="toolbar">
				
				<div class="btn-group">
					<button type='button' ng-click='animalCarregar()' class='btn btn-default icones' data-toggle="tooltip" data-placement="bottom" title="Recarregar"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;&nbsp;Recarregar</button>
					<button type='button' ng-click='adicionarAnimal()' class='btn btn-success icones' data-toggle="tooltip" data-placement="bottom" title="Recarregar"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Novo animal</button>
				</div>
			
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						Mais opções <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#" ng-click='relatorioAnuncios()'>Relatório animal</a></li>
						<li><a href="#" ng-click='relatorioAnunciosVendidos()'>Relatório animais vendidos</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<div class='panel-group' id='accordionAnimal' role='tablist' aria-multiselectable='false' ng-init='listaanimal = []'>
		<div class='panel panel-primary' ng-show='false'></div>
		<div class='panel panel-primary' ng-show='listaanimal.length == 0'>
			<div class='panel-heading hand' role='tab'>
				<h4 ng-click='carregarAnimais()'>Carregue sua lista de animais.</h4>
			</div>	
		</div>
		<div class='panel panel-default' ng-class='anc.classe' ng-repeat='anc in listaanimal' ng-show='anc.show'>
			<div class='panel-heading' role='tab' id='headingidd'>
				<div class='row'>
					<div class='col-sm-1 text-center title-anuncio'>
						<h4 class='panel-title text-capitalize title-anuncio'>
							<a class='a-anuncio' data-toggle='collapse' data-parent='#accordionAnimal' href='#anc{{anc.id}}' aria-expanded='false' aria-controls='anc{{anc.id}}'>
								{{anc.id}} 
							</a>
						</h4>
					</div>
					<div class='col-sm-2 title-anuncio'>
						<h4 class='panel-title text-capitalize title-anuncio'>
							<a class='a-anuncio' data-toggle='collapse' data-parent='#accordionAnimal' href='#anc{{anc.id}}' aria-expanded='false' aria-controls='anc{{anc.id}}'>
								{{anc.nome}} 
							</a>
						</h4>
					</div>
					<div class='col-sm-6 title-anuncio'>
						<h4 class='panel-title text-capitalize title-anuncio'>
							<a class='a-anuncio' data-toggle='collapse' data-parent='#accordionAnimal' href='#anc{{anc.id}}' aria-expanded='false' aria-controls='anc{{anc.id}}'>
								{{anc.nascimentonome}}
							</a>
						</h4>
					</div>
					<div class='col-sm-3 text-right'>
						<h4 class='panel-title'>
							<a class='a-anuncio' data-toggle='collapse' data-parent='#accordionAnimal' href='#anc{{anc.id}}' aria-expanded='false' aria-controls='anc{{anc.id}}'>
								{{anc.nomeraca}}
							</a>
						</h4>
					</div>
				</div>
			</div>
			<div id='anc{{anc.id}}' class='panel-collapse collapse' role='tabpanel' aria-labelledby='anch{{anc.id}}'>
				<div class='panel-body'>
					
					<ul class="nav nav-tabs" role="tablist" id='tabAnuncio{{anc.id}}'>
						<li role="presentation" class="active">
							<a href="#home{{anc.id}}" aria-controls="home{{anc.id}}" role="tab" data-toggle="tab">
								<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
								&nbsp;&nbsp;Animal
							</a>
						</li>
						<li role="presentation">
							<a href="#profile{{anc.id}}" aria-controls="profile{{anc.id}}" role="tab" data-toggle="tab">
								<span class="glyphicon glyphicon-th" aria-hidden="true"></span>
								&nbsp;&nbsp;Genealogia
							</a>
						</li>
						<li role="presentation">
							<a href="#premiacao{{anc.id}}" aria-controls="premiacao{{anc.id}}" role="tab" data-toggle="tab">
								<span class="glyphicon glyphicon-th" aria-hidden="true"></span>
								&nbsp;&nbsp;Premiação
							</a>
						</li>
						<li role="presentation">
							<a href="#messages{{anc.id}}" aria-controls="messages{{anc.id}}" role="tab" data-toggle="tab">
								<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
								&nbsp;&nbsp;Fotos
							</a>
						</li>
					</ul>
					
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home{{anc.id}}">
							<div class='row'>
								<div class='col-sm-12'>
									<form class="form-horizontal">
										<div class="form-group bottom">
											<label class="col-sm-3 control-label font-80">Código:</label>
											<div class="col-sm-9">
												<p class="form-control-static font-80">{{anc.id}}</p>
											</div>
										</div>
										<div class="form-group bottom">
											<label class="col-sm-3 control-label font-80">Raça:</label>
											<div class="col-sm-3">
												<p class="form-control-static font-80">{{anc.nomeraca}}</p>
											</div>
											<label class="col-sm-3 control-label font-80">Sexo:</label>
											<div class="col-sm-3">
												<p class="form-control-static font-80">{{anc.sexo}}</p>
											</div>
										</div>
										<div class="form-group bottom">
											<label class="col-sm-3 control-label font-80">Nome:</label>
											<div class="col-sm-3">
												<p class="form-control-static font-80">{{anc.nome}}</p>
											</div>
											<label class="col-sm-3 control-label font-80">Nascimento:</label>
											<div class="col-sm-3">
												<p class="form-control-static font-80">{{anc.nascimentonome}}</p>
											</div>
										</div>
										<div class="form-group bottom">
											<label class="col-sm-3 control-label font-80">Registro:</label>
											<div class="col-sm-3">
												<p class="form-control-static font-80">{{anc.registro}}</p>
											</div>
											<label class="col-sm-3 control-label font-80">DNA:</label>
											<div class="col-sm-3">
												<p class="form-control-static font-80">{{anc.dna}}</p>
											</div>
										</div>
										<div class="form-group bottom">
											<label class="col-sm-3 control-label font-80">Pelagem:</label>
											<div class="col-sm-3">
												<p class="form-control-static font-80">{{anc.pelagem}}</p>
											</div>
											<label class="col-sm-3 control-label font-80">Vídeo:</label>
											<div class="col-sm-3">
												<p class="form-control-static font-80">{{anc.video}}</p>
											</div>
										</div>
										<div class="form-group bottom">
											<label class="col-sm-3 control-label font-80">Página:</label>
											<div class="col-sm-3">
												<p class="form-control-static font-80">{{anc.paginanome}}</p>
											</div>
										</div>
										<div class="form-group bottom">
											<label class="col-sm-3 control-label font-80">Descrição:</label>
											<div class="col-sm-9">
												<p class="form-control-static font-80">{{anc.descricao}}</p>
											</div>
										</div>
										
									</form>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="profile{{anc.id}}">
							<div class='row'>
								<div class='col-sm-12'>
									<form class="form-horizontal">
										<div class="form-group bottom">
											<label class="col-sm-3 control-label font-80">Pai:</label>
											<div class="col-sm-3">
												<p class="form-control-static font-80">{{anc.nomepai}}</p>
											</div>
											<label class="col-sm-3 control-label font-80">Mãe:</label>
											<div class="col-sm-3">
												<p class="form-control-static font-80">{{anc.nomemae}}</p>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="premiacao{{anc.id}}">
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive table-config">
					    				<table class="table table-hover table-striped bottom">
					    					<thead>
					    						<tr>
					    							<th class='text-left' >Premiação</th>
					    						</tr>
					    					</thead>
					    				</table>
					    				<table class="table table-hover table-striped">
					    					<tbody>
					    						<tr class='hand' ng-repeat='premiacao in anc.premiacoes'>
					    							<td class='text-left text-capitalize' >{{premiacao.descricao}}</td>
					    						</tr>
					    					</tbody>
					    				</table>
					    			</div>
									
								</div>
							</div>							
						</div>
						<div role="tabpanel" class="tab-pane" id="messages{{anc.id}}">
							<br />
							<div class="row">
								
								<div class="col-xs-12 col-md-3" ng-repeat="imagem in anc.imagens">
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
							<button type='button' class='btn btn-default btn-sm' ng-click='linkar(anc.veranimal)'>
								<i class='glyphicon glyphicon-eye-open'></i>
								&nbsp;&nbsp;Visualizar cadastro completo
							</button>&nbsp;
							<button type='button' class='btn btn-danger btn-sm' ng-click='animalExcluido($index)'>
								<i class='glyphicon glyphicon-trash'></i>
								&nbsp;&nbsp;Excluir
							</button>&nbsp;
							<button type='button' class='btn btn-primary btn-sm' ng-click='editarAnimal($index)'>
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