<div class="container">
	<div class="row-12">
		<div class="jumbotron">
        	<h1 class="display-4">Nossos produtos</h1>
    	</div>
	</div>

	<div class="row">
		
	</div>

	<?php if (isset($_SESSION['usuarioTipo']) && $_SESSION['usuarioTipo'] == 'admin'): ?>
		<div class="row justify-content-center">
			<a href="<?php echo BASE_URL; ?>produtos/adicionar" class="btn btn-primary">Adicionar produtos</a>
		</div>
	<?php endif; ?>

	<div class="row justify-content-center"	 style="margin-top: 7px">
		<div class="table-responsive">
			<table class="table table-stripped table-hover">
				<tbody>
					<?php foreach ($anuncios as $anuncio): ?>
					<tr>
						<td>
							<img src="<?php echo BASE_URL; ?>assets/images/anuncios/<?php echo $anuncio['foto']; ?>" height="100" border="0" class=""/>
						</td>
						<td>
							<a href="<?php echo BASE_URL; ?>produtos/abrir/<?php echo $anuncio['id']; ?>"><?php echo $anuncio['titulo'];?></a>
						</td>
						<td>
							R$ <?php echo number_format($anuncio['valor'], 2); ?>
						</td>
						<?php if (isset($_SESSION['usuarioTipo']) && $_SESSION['usuarioTipo'] == 'admin'): ?>
							<td>
								<a href="<?php echo BASE_URL; ?>produtos/editar/<?php echo $anuncio['id']; ?>" class="btn btn-primary">Editar</a>
								<a href="<?php echo BASE_URL; ?>produtos/excluir/<?php echo $anuncio['id']; ?>" class="btn btn-danger">Excluir</a>
							</td>
						<?php endif; ?>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
   
</div>