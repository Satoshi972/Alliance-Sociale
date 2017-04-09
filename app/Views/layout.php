<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">


	<!-- Me permet d'ajouter de façon ponctuelle des dépendences dans mon head -->
	<?= $this->section('head') ?>
</head>
<body>
	<div class="container">
		<header>
			<h1>W :: <?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
			<?= $this->section('footer') ?>
		</footer>
	</div>

	<!-- Zone de scripts -->

	<script src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/jquery-ui.min.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>

	<!-- Fichier qui contient des fonctions personalisées à divers effets -->
	<script src="<?= $this->assetUrl('js/functions.js') ?>"></script>

	<!-- Me permet d'ajouter de façon ponctuelle des scripts -->
	<?= $this->section('script') ?>

	<!-- Fin de zone de script -->
</body>
</html>