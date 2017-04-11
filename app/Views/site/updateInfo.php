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

<form method="POST" enctype="multipart/form-data" class="form-horizontal">

	<legend class="text-center">MOdification des information du site</legend>

	<div class="form-group">
		<label for="Logo">Logo</label>
		<img src="<?php $this->assetUrl($info['logo']); ?>" class="img-responsive img-thumbnail" alt="Logo">
		<input type="hidden" value="<?php $this->assetUrl($info['logo']); ?>"
		<input type="file" id="Logo" name="Logo">
	</div>

	<div class="form-group">
		<label for="Header">Header</label>
		<img src="<?php $this->assetUrl($info['header']); ?>" class="img-responsive img-thumbnail" alt="Header">
		<input type="hidden" value="<?php $this->assetUrl($info['header']); ?>">
		<input type="file" id="Header" name="Header">
	</div>

	<div class="form-group">
		<label for="Address">Adresses</label>
		<textarea class="form-control" id="Address" name="Address" cols="30" rows="10"><?php $this->assetUrl($info['address']); ?></textarea>	
	</div>

	<div class="form-group">
		<label for="">Horraire</label>
		<textarea name="" id="" cols="30" rows="10"><?php $this->assetUrl($info['shedule']); ?></textarea>
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