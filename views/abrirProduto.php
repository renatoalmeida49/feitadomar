<div class="container">
	<div class="row">
		<div class="col">
			<img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $anuncio['foto']; ?>">
		</div>
		<div class="col">
			<div class="h1"><?php echo $anuncio['titulo']; ?></div>
			<p><?php echo $anuncio['descricao']; ?></p>
			<div class="h2">R$ <?php echo number_format($anuncio['valor'], 2); ?></div>
		</div>
	</div>
	<div class="row justify-content-center">
		<a href="<?php echo BASE_URL; ?>produtos" class="btn btn-primary">Voltar</a>
	</div>
</div>