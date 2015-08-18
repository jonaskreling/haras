<?php
    /**
     * MENU USUÁRIO
     */
     
    $usuario = Usuario::model()->findByPk(Yii::app()->user->id); 
?>
<div class="panel panel-default" ng-controller="AdminUsuarioController">
	<div class="panel-heading">
		<div class='row'>
		<div class='col-md-6'>
			<h4>Dados do usuário</h4>
			<h5><small>Última edição em <?php echo Date('d/m/Y',strtotime($usuario->ultimaMudanca)).' às '.Date('H:i',strtotime($usuario->ultimaMudanca)); ?></small></h5>
		</div>
		<div class='col-md-6 text-right'>
			<button type='button' class='btn btn-default' ng-click='resetUsuario()'><i class="glyphicon glyphicon-share-alt"></i>&nbsp;&nbsp;Cancelar</button>
			<button type='button' class='btn btn-primary' ng-click='salvarUsuario()'><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Salvar</button>
		</div>
		</div>
	</div>
	<div class="panel-body">
		<div class='col-md-12'>
			<?php  
				echo CHtml::statefulForm( $this->createUrl('admin') , "post" , array('id' => 'formResetUsuario','class'=>'form-horizontal','ng-submit'=>'submitUsuario()'));
				 
			?>
				<input type='text' name='ferramenta' value='6' ng-hide='true' />
			<?php
				echo CHtml::endForm();
			?>
			
			<?php  
				echo CHtml::statefulForm( $this->createUrl('cadastroUsuario') , "post" , array('id' => 'formCadastrarUsuario','class'=>'form-horizontal','ng-submit'=>'submitUsuario()'));
				 
			?>
  
  			<div class="form-group">
				<label for="nome" class='col-sm-3 control-label'>Nome</label>
				<div class="col-sm-6">
					<input type="text" ng-init="usuario.nome = '<?php echo $usuario->nome; ?>'" class="form-control" id="nome" name="nome" placeholder="Nome" ng-model="usuario.nome" maxlength="15" />
				</div>
			</div>
			<div class="form-group">
				<label for="sobrenome" class='col-sm-3 control-label'>Sobrenome</label>
				<div class="col-sm-6">
					<input type="text" ng-init="usuario.sobrenome = '<?php echo $usuario->sobrenome; ?>'" class="form-control" id="sobrenome" name="sobrenome" placeholder="sobrenome" ng-model="usuario.sobrenome" maxlength="20" />
				</div>
			</div>
			<div class="form-group">
				<label for="data" class='col-sm-3 control-label'>Data de nascimento</label>
				<div class="col-sm-6">
					<input type="text" ng-init="usuario.nascimento = '<?php echo $usuario->nascimento; ?>'" class="form-control" id="data" name="data" ui-mask="99/99/9999" ng-model="usuario.nascimento" />
				</div>
			</div>
			<div class="form-group" ng-init="usuario.sexo = '<?php echo $usuario->sexo; ?>'">
				<label for="data" class='col-sm-3 control-label'>Sexo</label>
				<div class="col-sm-8">
					<div class="radio">
						<label>
							<input type="radio" name="sexo" id="masculino" value="masculino" ng-model="usuario.sexo"> Masculino
						</label>
						<label>
							<input type="radio" name="sexo" id="feminino" value="feminino" ng-model="usuario.sexo"> Feminino
						</label>
					</div>
				</div>
			</div>		
			<div class="form-group">
				<label for="celular" class='col-sm-3 control-label'>Celular</label>
				<div class="col-sm-6">
					<input type="text" ng-init="usuario.celular = '<?php echo $usuario->celular; ?>'" class="form-control" id="celular" name="celular" ui-mask="(99) 9999-9999?9" ng-model="usuario.celular">
				</div>
			</div>
			<div class="form-group">
				<label for="email" class='col-sm-3 control-label'>E-mail</label>
				<div class="col-sm-6">
					<input type="email" ng-init="usuario.email = '<?php echo $usuario->email; ?>'" class="form-control" id="email" name="email" placeholder="E-mail" ng-model="usuario.email" maxlength="30">
				</div>
			</div>
			<input type='text' value='' ng-init='usuario.id = <?php echo Yii::app()->user->id; ?>' id='usuarioid' name='usuarioid' ng-model='usuario.id' ng-hide='true' />
		<?php
			echo CHtml::endForm();
		?>
		</div>
		
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class='row'>
		<div class='col-md-6'>
			<h4>Senha do usuário</h4>
		</div>
		<div class='col-md-6 text-right'>
			<button type='button' class='btn btn-default' ng-click='resetUsuario()'><i class="glyphicon glyphicon-share-alt"></i>&nbsp;&nbsp;Cancelar</button>
			<button type='button' class='btn btn-primary' ng-click='salvarSenha()'><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Salvar</button>
		</div>
		</div>
	</div>
	<div class="panel-body">
		<div class='col-md-12'>
			<?php  
				echo CHtml::statefulForm( $this->createUrl('cadastroNovaSenha') , "post" , array('id' => 'formNovaSenha','class'=>'form-horizontal','ng-submit'=>'submitSenha()')); 
			?>
				<div class="form-group">
					<label for="senha" class='col-sm-3 control-label'>Senha</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" ng-model="usuario.senha" maxlength="20">
					</div>
				</div>
			
				<div class="form-group">
					<label for="senha" class='col-sm-3 control-label'>Nova senha</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" id="novasenha" name="novasenha" placeholder="Nova senha" ng-model="usuario.novasenha" maxlength="20">
					</div>
				</div>
				<input type='text' ng-init='usuario.senhaantiga = "<?php echo $usuario->senha;  ?>"' value='' id='usuarioid' name='usuarioid' ng-model='usuario.id' ng-hide='true' />
			<?php
				echo CHtml::endForm();
			?>
		</div>
		
	</div>
</div>