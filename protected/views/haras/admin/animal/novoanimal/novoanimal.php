<?php
    /**
     * NOVO ANIMAL
     */ 
?>
<div class='row' ng-controller="AdminNovoAnimalController">
	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist" id='tabAnimal'>
			<li role="presentation" class="active">
				<a href="#animal" aria-controls="animal" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
					&nbsp;&nbsp;Animal
				</a>
			</li>
			<li role="presentation">
				<a href="#genealogia" aria-controls="genealogia" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-th" aria-hidden="true"></span>
					&nbsp;&nbsp;Genealogia
				</a>
			</li>
			<li role="presentation">
				<a href="#premiacao" aria-controls="premiacao" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-flag" aria-hidden="true"></span>
					&nbsp;&nbsp;Premiação
				</a>
			</li>
			<li role="presentation">
				<a href="#fotos" aria-controls="fotos" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
					&nbsp;&nbsp;Fotos
				</a>
			</li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<?php 
			    include_once 'animal/animal.php';
			    include_once 'genealogia/genealogia.php';
			    include_once 'premiacao/premiacao.php';
			    include_once 'fotos/fotos.php';
			?>
		</div>
	</div>
</div>