<?php
 /**
 * Esse arquivo contém o slide rotativo que aparece na maioria das páginas do site.
 * @author jonas franco kreling
 *   
 */
?>

<!-- TOPO DA PÁGINA -->
<div  ng-controller='SlideInicialController'>
	<div class="jumbotron tela-inicial bg1" ng-class='backgroundImage'>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="titulo-inicial" >HARAS ALEIXO</h1>
					<h4 class="titulo-inicial">MARCHA PICADA com QUALIDADE</h4>
				</div>
				<div class="col-md-12">
					<flex-slider slide="s in slides" animation="fade" animation-loop="true" smooth-height="false" control-nav="false" >
						<li>
							<img ng-src="{{s}}">
						</li>
					</flex-slider>
				</div>
			</div>
		</div>
	</div>
</div>