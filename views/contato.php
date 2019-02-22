<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Contato</h1>
    </div>
    <div class="row">
		<div class="col-md-8">

			<div class="h5">Faça-nos uma pergunta ou nos deixe uma mensagem.</div>

			<form method="post">
				<div class="form-group">
					<label for="titulo">Título:</label><input type="text" name="titulo" id="titulo" class="form-control" />
					<label for="pergunta">Pergunta/mensagem:</label><textarea class="form-control" name="pergunta" id="pergunta"></textarea>
					<label for="autor">Autor:</label><input type="text" name="autor" id="autor" class="form-control" />
				</div>

				<div class="form-group">
					<input type="submit" value="Enviar" class="btn btn-primary">
				</div>
			</form>

			<p>Visite nosso instagram. Contato pode ser também pode ser feito mandando mensagem pelo direct.</p>
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