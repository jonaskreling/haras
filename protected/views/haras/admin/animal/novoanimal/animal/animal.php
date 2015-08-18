<?php 
    /**
     * TAB ANIMAL 
     */ 
?>
<div role="tabpanel" class="tab-pane active" id="animal">
	<br />
	<div class='row'>
		<div class='col-md-8'>
			
			<div class="form-class col-md-6">
				<label for="descricao" required>Raça*</label>
				<select class="form-control" ng-model="animal.raca" ng-options="raca.id as raca.nome for raca in listaraca">
					<option value="">-- Selecione --</option>
				</select>
			</div>
			
			<div class="form-group col-md-6">
				<label for="sexo">Sexo*</label>
				<select class='form-control' name='sexo' ng-model='animal.sexo'>
					<option value='M'>M - Macho</option>
					<option value='F'>F - Fêmea</option>
				</select>
			</div>
			
			<div class="form-group col-md-6">
				<label for="nome">Nome do animal*</label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do animal" maxlength="30" require='' ng-model='animal.nome' />
			</div>
			
			<div class="form-group col-md-6">
				<label for="nascimento">Nascimento</label>
				<input 
					type="text" 
					class="form-control" 
					id="nascimento" 
					name="nascimento" 
					require='' 
					ui-mask="99/99/9999" 
					ng-model='animal.nascimento' 
				/>
			</div>
			
			<div class="form-group col-md-6">
				<label for="registro">Registro</label>
				<input type="text" class="form-control" id="registro" name="registro" placeholder="Registro" maxlength="30" require='' ng-model='animal.registro' />
			</div>
			
			<div class="form-group col-md-6">
				<label for="dna">DNA</label>
				<input type="text" class="form-control" id="dna" name="dna" placeholder="DNA" maxlength="30" require='' ng-model='animal.dna' />
			</div>
			
			<div class="form-group col-md-6">
				<label for="pelagem">Pelagem</label>
				<input type="text" class="form-control" id="pelagem" name="pelagem" placeholder="Pelagem" maxlength="30" require='' ng-model='animal.pelagem' />
			</div>
			
			<div class="form-group col-md-6">
				<label for="video">Vídeo</label>
				<input type="text" class="form-control" id="video" name="video" placeholder="Vídeo" maxlength="30" require='' ng-model='animal.video' />
			</div>
			
			<div class="form-group col-md-6">
				<label for="pagina" required>Página</label>
				<select class="form-control" ng-model="animal.pagina" ng-options="pagina.id as pagina.nome for pagina in listapagina">
					<option value="">-- Selecione --</option>
				</select>
			</div>
			
			<div class="form-group col-md-12">
				<label for="descricao">Descrição <small>(5000 caracteres)</small></label>
				<textarea 
					class="form-control" 
					rows="5" 
					name="descricao" 
					id="descricao" 
					placeholder="Descrição sobre o animal" 
					maxlength="5000" 
					require="" 
					ng-model="animal.descricao">
				</textarea>
			</div>
						
		</div>
	</div>
	
	<div class='row'>
		<div class="col-xs-12 col-md-8 text-right">
			<button type='button' class='btn btn-primary icones' ng-click='tabShowAnimal("genealogia")'>Próxima&nbsp;&nbsp;<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
		</div>
	</div>
	
</div>