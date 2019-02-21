<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" />
        <link rel="icon" type="imagem/jpg" href="<?php echo BASE_URL; ?>assets/images/logo.jpg" />
    	<title>Feita do mar</title>
    </head>
    <body>
	<header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #009999">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>">
                <img src="<?php echo BASE_URL; ?>assets/images/logo.jpg" width="50" height="50" />
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggle-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarMenu">
                <ul class="navbar-nav">
                    <li class="nav-item <?php echo ($viewData['local']=='inicio')?'active':''; ?>">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>">Início</a>
                    </li>
                    <li class="nav-item  <?php echo ($viewData['local']=='produtos')?'active':''; ?>">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>produtos">Produtos</a>
                    </li>
                    <li class="nav-item  <?php echo ($viewData['local']=='sobre')?'active':''; ?>">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>sobre">Sobre a loja</a>
                    </li>
                    <li class="nav-item  <?php echo ($viewData['local']=='contato')?'active':''; ?>">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>contato">Contato</a>
                    </li>
                </ul>
            </div>

            <div class="navbar-collapse collapse justify-content-end" id="navbarMenu">
                <ul class="navbar-nav">
                    <?php if(isset($_SESSION['usuarioId']) && !empty($_SESSION['usuarioId'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bem vindo, <?php echo $_SESSION['usuarioNome']; ?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Ação</a>
                            <a class="dropdown-item" href="#">Outra ação</a>
                        </div>
                    </li>
                    <li class="nav-item <?php echo ($viewData['local']=='lista')?'active':''; ?>">
                        <a class="nav-link" href="#">Lista de desejos</a>
                    </li>
                    <li class="nav-item <?php echo ($viewData['local']=='sair')?'active':''; ?>">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>login/sair">Sair</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item <?php echo ($viewData['local']=='login')?'active':''; ?>">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>login">Login</a>
                    </li>
                    <li class="nav-item <?php echo ($viewData['local']=='cadastre')?'active':''; ?>">
                        <a class="nav-link" href="<?php echo BASE_URL ?>login/cadastrar">Cadastre-se</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
	</header>

	<?php $this->loadViewInTemplate($viewName, $viewData); ?>

	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    </body>
</html>