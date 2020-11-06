<div class="container">
	<form method="post">
		<label for="pergunta"><h4 class="mt-0"><?php echo $pergunta['titulo']; ?></h4></label><br/>
		<blockquote class="blockquote">
			<label for="mensagem"><?php echo $pergunta['mensagem']; ?></label>
			<footer class="blockquote-footer"><?php echo $pergunta['autor']; ?></footer>
		</blockquote>
		<textarea class="form-control" id="pergunta" name="resposta" required><?php echo $pergunta['resposta']; ?></textarea>
		<button type="submit" value="<?php echo $pergunta['id']; ?>" class="btn btn-primary" name="responder" style="margin-top: 4px;">Editar</button>
		<hr/>
	</form>
</div>