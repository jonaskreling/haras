<?php
    /**
     * NOVA VENDA
     */ 
?>
<div class='row' ng-controller="AdminNovaVendaController">
	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist" id='tabVenda'>
			<li role="presentation" class="active">
				<a href="#venda" aria-controls="venda" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
					&nbsp;&nbsp;Venda
				</a>
			</li>
			<li role="presentation">
				<a href="#fotosvenda" aria-controls="fotosvenda" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
					&nbsp;&nbsp;Foto
				</a>
			</li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<?php 
			    include_once 'venda/venda.php';
			    include_once 'fotosvenda/fotosvenda.php';
			?>
		</div>
	</div>
</div>