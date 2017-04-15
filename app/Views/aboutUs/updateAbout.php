<?php 
$this->layout('layout', ['title' => 'Mise a jour des infos du à propos']);

$this->start('head');
?>
	<!-- File input CSS -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/fileinput.min.css') ?>">

<?php 
$this->stop('head');
$this->start('main_content');
?>

<form method="POST" enctype="multipart/form-data" class="form-horizontal">

	<legend class="text-center">Mise a jour des infos du à propos</legend>


	<div class="form-group">
		<label for="word">Adresses</label>
		<textarea class="form-control" id="word" name="word" cols="30" rows="10"><?=$infos['word']; ?></textarea>	
	</div>

	<div class="form-group">
		<label for="history">Horraire</label>
		<textarea name="history" id="history" cols="30" rows="10" class="form-control"><?= $infos['history']; ?></textarea>
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