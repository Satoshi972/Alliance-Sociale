<?php 
$this->layout('layout_back', ['title' => 'Mise a jour des infos du site']);

$this->start('head');
?>
	<!-- File input CSS -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/fileinput.min.css') ?>">


<?php 
$this->stop('head');
$this->start('main-content');
?>

<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">

	<legend class="text-center">MOdification des information du site</legend>

	<div class="form-group">
		<label for="Logo">Logo</label>
		<input type="file" class="img-responsive img-thumbnail" id="" name="" required>
	</div>

	<div class="form-group">
		<label for=""></label>
		<input type="text" class="form-control" id="" name="" required>
	</div>

	<div class="form-group">
		<label for=""></label>
		<input type="text" class="form-control" id="" name="" required>
	</div>

	<div class="form-group">
		<label for=""></label>
		<input type="text" class="form-control" id="" name="" required>
	</div>

	<div class="form-group">
		<label for=""></label>
		<input type="text" class="form-control" id="" name="" required>
	</div>
	<div class="text-center">
		<input type="submit" class="btn btn-primary" value="Envoyer">
	</div>
</form>

<?php
$this->stop('main-content');

$this->start('script');
?>
<!-- File input js -->
<script src="<?= $this->assetUrl('js/file-put/fileinput.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/file-input/fr.js') ?>"></script>

<script>
	$(function()
	{
		fileInput();
	});
</script>
<?php
$this->stop('script');
?>