<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #009999">
    <a class="navbar-brand" href="<?= $base; ?>/">
        <img src="<?= $base; ?>/assets/images/logo.jpg" width="50" height="50" />
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggle-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarMenu">
        <ul class="navbar-nav">
            <li class="nav-item <?php echo ($viewData['local']=='inicio')?'active':''; ?>">
                <a class="nav-link" href="<?= $base; ?>/">Início</a>
            </li>
            <li class="nav-item  <?php echo ($viewData['local']=='produtos')?'active':''; ?>">
                <a class="nav-link" href="<?= $base; ?>/produtos">Produtos</a>
            </li>
            <li class="nav-item  <?php echo ($viewData['local']=='sobre')?'active':''; ?>">
                <a class="nav-link" href="<?= $base; ?>/sobre">Sobre a loja</a>
            </li>
            <li class="nav-item  <?php echo ($viewData['local']=='contato')?'active':''; ?>">
                <a class="nav-link" href="<?= $base; ?>/contato">Contato</a>
            </li>
        </ul>
    </div>

    <div class="navbar-collapse collapse justify-content-end" id="navbarMenu">
        <ul class="navbar-nav">
            <?php if(isset($_SESSION['usuarioId']) && !empty($_SESSION['usuarioId'])): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bem vindo, <?php echo $_SESSION['usuarioNome']; ?></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Lista de desejos</a>
                    <a class="dropdown-item" href="<?= $base; ?>/login/sair">Sair</a>
                </div>
            </li>
            <?php else: ?>
            <li class="nav-item <?php echo ($viewData['local']=='login')?'active':''; ?>">
                <a class="nav-link" href="<?= $base; ?>/Login">Login</a>
            </li>
            <li class="nav-item <?php echo ($viewData['local']=='cadastre')?'active':''; ?>">
                <a class="nav-link" href="<?= $base; ?>/Login/cadastrar">Cadastre-se</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>