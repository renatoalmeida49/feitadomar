<div class="container">
	<div class="row justify-content-center">
		<div class="h1">Editar produto</div>
	</div>
	<?php
		if (!empty($msg)) { echo $msg; }
	?>
	<form method="post" enctype="multipart/form-data" style="margin-bottom: 5px;">
		<div class="form-group">
			<label for="nome">Título:</label><input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $anuncio['titulo']; ?>" required />
			<label for="valor">Valor:</label><input type="text" name="valor" id="valor" class="form-control"  value="<?php echo $anuncio['valor']; ?>" required />
			<label for="foto">Foto:</label><input type="file" name="foto" id="foto" class="form-control" />
			<label for="descricao">Descrição:</label><textarea class="form-control" name="descricao" id="descriao"><?php echo $anuncio['descricao']; ?></textarea>
		</div>
		<div class="form-group">
			<div class="card">
				<div class="card-body">
					<div class="card-title">Foto do anuncio:</div>
					<div class="foto_item">
						<img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $anuncio['foto']; ?>" class="img-thumbnail" border="0" />
					</div>
				</div>
			</div>
		</div><br/>
		<div class="form-row">
			<div class="col">
				<button type="submit" class="form-control btn btn-primary">Editar</button>
			</div>
			<div class="col">
				<a href="<?php echo BASE_URL; ?>produtos" class="btn btn-primary form-control">Cancelar</a>
			</div>
		</div>
	</form>
</div>