<?php 
$this->layout('layout', ['title' => 'Mise a jour des infos du site']);

$this->start('head');
?>
	<!-- File input CSS -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/fileinput.min.css') ?>">

<?php 
$this->stop('head');
$this->start('main_content');
?>

<form method="POST" enctype="multipart/form-data" class="form-horizontal">

	<legend class="text-center">Modification des information du site</legend>

	<div class="form-group">
		<label for="Logo">Logo</label>
		<img src="<?php $this->assetUrl($infos['logo']); ?>" class="img-responsive img-thumbnail" alt="Logo">
		<input type="file" id="Logo" name="Logo">
	</div>

	<div class="form-group">
		<label for="Header">Header</label>
		<img src="<?php $this->assetUrl($infos['header']); ?>" class="img-responsive img-thumbnail" alt="Header">
		<input type="file" id="Header" name="Header">
	</div>

	<div class="form-group">
		<label for="address">Adresses</label>
		<textarea class="form-control" id="address" name="address" cols="30" rows="10"><?=$infos['address']; ?></textarea>	
	</div>

	<div class="form-group">
		<label for="schedule">Horraire</label>
		<textarea name="schedule" id="schedule" cols="30" rows="10" class="form-control"><?= $infos['schedule']; ?></textarea>
	</div>	

	<div class="form-group">
		<label for="phone">Téléphone</label>
		<input type="text" name="phone" id="phone"  class="form-control" value="<?=$infos['phone']; ?>">
	</div>

	<div class="text-center">
		<input type="submit" class="btn btn-primary" value="Envoyer">
	</div>
</form>

<?php
$this->stop('main_content');

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