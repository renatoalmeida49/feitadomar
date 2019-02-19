<div class="container">
	<div class="row justify-content-center">
		<div class="h1">Faça seu login</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-6">
			<?php 
				if (!empty($msg)) {
					echo $msg;
				} ?>
			<form method="post">
				<div class="form-group">
					<label for="login">Login:</label><input type="text" name="login" id="login" class="form-control" required/>
					<label for="nome">Senha:</label><input type="password" name="senha" id="senha" class="form-control" required/>
				</div>
				<div class="form-group">
					<input type="submit" name="" value="Entrar" class="btn btn-primary form-control"/>
				</div>
			</form>
		</div>
	</div>
	
</div>