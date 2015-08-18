<?php
    /**
     * NOVA EXPOSIÇÃO
     */ 
?>
<div class='row' ng-controller="AdminNovaExposicaoController">
	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist" id='tabExposicao'>
			<li role="presentation" class="active">
				<a href="#exposicao" aria-controls="exposicao" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-flag" aria-hidden="true"></span>
					&nbsp;&nbsp;Exposição
				</a>
			</li>
			<li role="presentation">
				<a href="#fotosexposicao" aria-controls="fotosexposicao" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
					&nbsp;&nbsp;Fotos
				</a>
			</li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<?php 
			    include_once 'exposicao/exposicao.php';
			    include_once 'fotosexposicao/fotosexposicao.php';
			?>
		</div>
	</div>
</div>