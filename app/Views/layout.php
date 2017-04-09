<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/style_modal.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('js/jquery.modal.min.css') ?>">

	<!-- Permet d'ajouté des entete dans ma vue -->
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
		</footer>
	</div>

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  
  <script
	  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
	  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
	  crossorigin="anonymous"></script>
		

<script src="<?= $this->assetUrl('js/script_modal.js') ?>"></script>
<script src="<?= $this->assetUrl('js/jquery.modal.min.js') ?>"></script>

<!-- Permet d'inserer des script dans ma vue -->
<?= $this->section('script') ?>


</body>
</html>