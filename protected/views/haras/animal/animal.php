<?php
	/**
	 * PÁGINA DE ANIMAL
	 */
	include_once dirname(__FILE__).'/../slides/slidePadrao.php';
	$path = Yii::app()->baseUrl.'/assets';
	
?>
<script>
    var id = <?php echo $this->idRegistro; ?>;
</script>
<div class="container" ng-controller="AnimalController" ng-show="animal != undefined">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<h2>{{animal.paginanome}}</h2>
			<hr />
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<flex-slider id="animais" slide="s in slides" animation="slide" animation-loop="false" smooth-height="false" control-nav="false" sync="#animais2-slider">
				<li class="animalSlide">
					<div style="background:url('{{s}}');" class="slideAnimalLi">
						<p class="flex-caption" ng-show="animal.imagens[$index].descricao != ''">{{animal.imagens[$index].descricao}}</p>
					</div>
				</li>
			</flex-slider>
			<br class="esconder-celular" />
			<flex-slider id="animais2" class="carousel" slide="s in slides" animation="slide" animation-loop="false" smooth-height="false" control-nav="false" item-width="200" item-margin="5" as-nav-for="#animais-slider">
				<li class="slider2">
					<img ng-src="{{s}}">
				</li>
			</flex-slider>
		</div>
		<div class="col-xs-12 col-md-6">
			<h3>{{animal.nome}}</h3>
			<hr />
			<p><strong>Registro:</strong>&nbsp;{{animal.registro}}</p>
			<p><strong>Nascimento:</strong>&nbsp;{{animal.nascimentonome}}</p>
			<p><strong>Sexo:</strong>&nbsp;{{animal.sexonome}}</p>
			<p><strong>Pelagem:</strong>&nbsp;{{animal.pelagem}}</p>
			<p><strong>DNA:</strong>&nbsp;{{animal.dna}}</p>
			<br />
			<h4>Genealogia</h4>
			<hr />
			<form class="form-horizontal">
				<div class="form-group">
				    <div class="col-sm-8 col-md-offset-4">
  					    <input type="text" class="form-control" ng-model="animal.nomepaipai">
                    </div>
                    <div class="col-sm-8">
  					    <input type="text" class="form-control" ng-model="animal.nomepai">
                    </div>
                    <div class="col-sm-8 col-md-offset-4">
  					    <input type="text" class="form-control" ng-model="animal.nomepaimae">
  					    <br />
                    </div>
                    <div class="col-sm-8 col-md-offset-4">
  					    <input type="text" class="form-control" ng-model="animal.nomemaepai">
                    </div>
                    <div class="col-sm-8">
  					    <input type="text" class="form-control" ng-model="animal.nomemae">
                    </div>
                    <div class="col-sm-8 col-md-offset-4">
  					    <input type="text" class="form-control" ng-model="animal.nomemaemae">
                    </div>
				</div>
			</form>
			<div ng-show="animal.venda" class="text-right">
			    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalEmailVenda">
				  	Comprar este animal
				</button>
			    
			    <div class="modal fade" id="modalEmailVenda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title text-left" id="myModalLabel">Envie seu contato</h4>
							</div>
							<div class="modal-body">
								
								<form>
									<div class="form-group text-left">
										<label for="nome" class="control-label text-left">Nome:</label>
										<input type="text" class="form-control" id="nome" placeholder="Nome completo" ng-model="email.nome">
									</div>
									<div class="form-group text-left">
										<label for="telefone" class="control-label text-left">Telefone:</label>
										<input type="text" class="form-control" id="telefone" ng-model="email.telefone">
									</div>
									<div class="form-group text-left">
										<label for="mensagem" class="control-label">Mensagem:</label>
										<textarea class="form-control" id="mensagem" placeholder="Mensagem..." ng-model="email.mensagem"></textarea>
									</div>
								</form>
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								<button type="button" class="btn btn-primary" data-dismiss="modal" ng-mousedown="enviarEmail()">Enviar</button>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
    </div>
	
	<div class='row'>
	    <div class="col-xs-12 col-md-6">
	        <h3>Vídeo</h3>
	        <hr />
	        <div my-youtube code="animal.video" ng-if="animal.video != undefined && animal.video != ''"></div>
	    </div>
	    <div class="col-xs-12 col-md-6">
	        <h3>Premiações</h3>
	        <hr />
	        <h4 ng-repeat="premiacao in animal.premiacoes" >
	            <img src='<?php echo $path.'/images/simbolo/premio.png'; ?>' width='100' />
	            {{premiacao.descricao}}
	        </h4>
	    </div>
	</div>
    
	<br class="esconder-celular" />
	<br class="esconder-celular" />
	<br class="esconder-celular" />
	<br class="esconder-celular" />
	<br class="esconder-celular" />
</div>