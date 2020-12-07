<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Contato</h1>
    </div>
    <?php
    	if (!empty($msg)) {
    		echo $msg;
    	}
    ?>

    <?php if (!isset($_SESSION['usuarioTipo']) || $_SESSION['usuarioTipo'] == 'user'): ?>
    <div class="row">
		<div class="col-md-8">

			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mensagemModal">Faça-nos uma pergunta ou nos deixe uma mensagem!</button>

			<div class="modal fade" id="mensagemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<form method="post">
								<div class="form-group">
									<label for="titulo">Título:</label><input type="text" name="titulo" id="titulo" class="form-control" required />
									<label for="mensagem">Pergunta/mensagem:</label><textarea class="form-control" name="mensagem" id="mensagem" required></textarea>
									<label for="autor">Autor:</label><input type="text" name="autor" id="autor" class="form-control" required />
								</div>
								<button type="submit" class="btn btn-primary">Enviar</button>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</div>
			</div>

			<hr/>

			<p>Visite nosso instagram. Contato também pode ser feito mandando mensagem pelo direct.</p>

			<hr/>

			<ul class="list-unstyled">
				<?php foreach ($respostas as $resposta): ?>
					<li class="media">
						<div class="media-body">
							<h4 class="mt-0"><?php echo $resposta['titulo']; ?></h4>
							<blockquote class="blockquote">
								<p class="mb-0"><?php echo $resposta['mensagem']; ?></p>
								<footer class="blockquote-footer"><?php echo $resposta['autor']; ?></footer>
							</blockquote>
							<p><em><?php echo $resposta['resposta']; ?></em></p>
						</div>
					</li>
					<hr/>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php else: ?>
	<div class="row">
		<div class="col-md-8">
			<?php foreach ($perguntas as $pergunta): ?>
				<form method="post">
					<label for="pergunta"><h4 class="mt-0"><?php echo $pergunta['titulo']; ?></h4></label><br/>
					<blockquote class="blockquote">
						<label for="mensagem"><?php echo $pergunta['mensagem']; ?></label>
						<footer class="blockquote-footer"><?php echo $pergunta['autor']; ?></footer>
					</blockquote>
					<textarea class="form-control" id="pergunta" name="resposta" required></textarea>
					<button type="submit" value="<?php echo $pergunta['id']; ?>" class="btn btn-primary" name="responder" style="margin-top: 4px;">Responder</button>
					<hr/>
				</form>
			<?php endforeach; ?>

			<hr/>

			<div class="h3"><p>Gerenciar respostas</p></div><br/>

			<?php foreach ($respostas as $resposta): ?>
				<h4 class="mt-0"><?php echo $resposta['titulo']; ?></h4>
				<blockquote class="blockquote">
					<p class="mb-0"><?php echo $resposta['mensagem']; ?></p>
					<footer class="blockquote-footer"><?php echo $resposta['autor']; ?></footer>
				</blockquote>
				<p><em><?php echo $resposta['resposta']; ?></em></p><br/>
				<a class="btn btn-primary" href="<?php echo BASE_URL; ?>contato/editarResposta/<?php echo $resposta['id']; ?>">Editar</a><a class="btn btn-danger" href="<?php echo BASE_URL; ?>contato/excluirResposta/<?php echo $resposta['id']; ?>">Excluir</a>
				<hr/>
			<?php endforeach; ?>

			
		</div>

		<?php endif;?>
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="<?php echo BASE_URL; ?>assets/images/logo.jpg" width="286"/>
				<div class="card-body">
					<h5 class="card-title">Acesse nosso instagram</h5>
					<p class="card-text">Por lá você confere todos nossos produtos.</p>
					<a href="https://instagram.com/feitadomar" class="btn btn-primary" target="blank">Visitar</a>
				</div>
			</div>
		</div>
	</div>
</div>