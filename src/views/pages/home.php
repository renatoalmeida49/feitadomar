<?= $render('header'); ?>

	<?= $render('navbar', ['local' => $local]); ?>

	<div class="container">
		<div id="carousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="carousel" data-slide-to="0" class="active"></li>
				<li data-target="carousel" data-slide-to="1"></li>
				<li data-target="carousel" data-slide-to="2"></li>
			</ol>

			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="<?= $base; ?>/assets/images/caroussel/sauber.jpg" />
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="<?= $base; ?>/assets/images/caroussel/kylo.jpg" />
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="<?= $base; ?>/assets/images/caroussel/aiden.jpg" />
				</div>
			</div>

			<a class="carousel-control-prev" href="#carousel" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>

			<a class="carousel-control-next" href="#carousel" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
	</div>
	<div class="container">       
		<div class="jumbotron">
			<h1 class="display-4">Feita do mar</h1>
			<p class="lead">Loja de moda praia perfeita para seu estilo. Confira nossos produtos navegando pelo site</p>
		</div>
	</div>

	<?= $render('modalAbout');?>
	<?= $render('modalContact');?>
	<?= $render('modalSingup'); ?>

<?= $render('footer');?>