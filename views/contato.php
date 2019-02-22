<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Contato</h1>
    </div>
    <?php
    	if (!empty($msg)) {
    		echo $msg;
    	}
    ?>
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
				<?php foreach ($perguntas as $pergunta): ?>
					<li class="media">
						<div class="media-body">
							<h4 class="mt-0"><?php echo $pergunta['titulo']; ?></h4>
							<blockquote class="blockquote">
								<p class="mb-0"><?php echo $pergunta['mensagem']; ?></p>
								<footer class="blockquote-footer"><?php echo $pergunta['autor']; ?></footer>
							</blockquote>
							<?php echo $pergunta['resposta']; ?>
						</div>
					</li>
					<hr/>
				<?php endforeach; ?>
			</ul>
		</div>
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