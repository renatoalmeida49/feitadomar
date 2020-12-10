<nav class="navbar navbar-expand-md fixed-top navbar-dark">
    <a class="navbar-brand" href="<?= $base; ?>/">
        <img src="<?= $base; ?>/assets/images/logo.jpg" width="50" height="50" />
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarCollapse">
        <ul class="navbar-nav">
            <li class="nav-item <?= ($viewData['local']=='inicio')?'active':''; ?>">
                <a class="nav-link" href="<?= $base; ?>/">Início</a>
            </li>
            <li class="nav-item  <?=($viewData['local']=='produtos')?'active':''; ?>">
                <a class="nav-link" href="<?= $base; ?>/produtos">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#modalAbout" data-toggle="modal" data-target="#modalAbout">Sobre a loja</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#modalContact" data-toggle="modal" data-target="#modalContact">Contato</a>
            </li>
        </ul>
    </div>

    <div class="navbar-collapse collapse justify-content-end" id="navbarMenu">
        <ul class="navbar-nav">
            <?php if(isset($_SESSION['token']) && $_SESSION['token'] != ''): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bem vindo, <?php echo $_SESSION['token']; ?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Lista de desejos</a>
                        <a class="dropdown-item" href="<?= $base; ?>/logoff">Sair</a>
                    </div>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="#modalSingin" data-toggle="modal" data-target="#modalSingin">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#modalSingup" data-toggle="modal" data-target="#modalSingup">Cadastre-se</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <?= print_r($_SESSION); ?>
</nav>

<?= $render('modalAbout');?>
<?= $render('modalContact');?>
<?= $render('modalSingup'); ?>
<?= $render('modalSingin'); ?>