<?php
    /**
     * Template para a diretiva de upload de imagens.
     */ 
?>
<script type="text/ng-template" id="componente-image-upload.html">
	<div class="col-xs-12">
		<button class="btn btn-primary">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			&nbsp;&nbsp;Adicionar fotos
		</button>
		<input 
			type="file" 
			carregar-imagem 
			colocar-imagem-carregando="colocarImagemCarregando" 
			depois-carregar-imagens="depoisCarregarImagens" 
			accept="image/jpeg, image/png" 
		/>
	</div>
</script>