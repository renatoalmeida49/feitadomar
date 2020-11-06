<div class="container">
	<div class="row justify-content-center title">
		<div class="display-1"><?php echo $anuncio['titulo']; ?></div>
	</div>
	<div class="row">
		<div class="col">
			<img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $anuncio['foto']; ?>" class="img-fluid img-thumbnail">
		</div>
		<div class="col">
			<p><?php echo $anuncio['descricao']; ?></p>
			<div class="h2">R$ <?php echo number_format($anuncio['valor'], 2); ?></div>
		</div>
	</div>

	<hr/>

	<div class="row justify-content-center">
		<p class="h5">Outros produtos</p>
	</div>

	<div class="row">
		<?php foreach ($outros as $foto): ?>
		<div class="col-sm-auto">
			<div class="card-title"><?php echo $foto['titulo']; ?></div>
			
			<div class="foto-item">
				<img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $foto['foto']; ?>" class="img-thumbnail">
				<a href="<?php echo BASE_URL; ?>produtos/abrir/<?php echo $foto['id']; ?>" class="btn btn-primary">Ver produto</a>
			</div>
			
		</div>
		<?php endforeach; ?>
	</div>

	<div class="row justify-content-center">
		<a href="<?php echo BASE_URL; ?>produtos" class="btn btn-primary">Voltar</a>
	</div>
</div>