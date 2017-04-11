<?php $this->layout('layout_front', ['title' => 'Medias - Ajout des Medias']); 

$this->start('head');
?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/fileinput.min.css') ?>">

<?php
$this->stop('head');
$this->start('main_content');
?>

	<div class="col-md-6 col-md-offset-3">
		<h2>Ajout des médias</h2>
	</div>
	
	<div class="col-md-6 col-md-offset-3">
		<?php if($success == true): // La variable $success est envoyé via le controller?>
			<p style="color:green">Bravo, vos médias ont bien été enregistré</p>
		<?php endif; ?>

		<?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
			<p style="color:red"><?=implode('<br>', $errors); ?></p>
		<?php endif; ?>
	</div> 


	
	<form method="post" id="picture" class="form-horizontal" enctype="multipart/form-data">

		<!-- Image -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="medias">Envoyez vos médias</label>
			<div class="col-md-4">
				<input type="file" id="medias" name="medias[]">

		<div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" id="submitForm" class="btn btn-primary">Ajouter des médias</button>
			</div>
		</div>
	</form>

<?php 
$this->stop('main_content'); 
$this->start('script'); 
?>
    <script src="<?= $this->assetUrl('js/file-input/fileinput.min.js'); ?>"></script>
    <script src="<?= $this->assetUrl('js/file-input/fr.js'); ?>"></script>
<script>
	$("#medias").fileinput(
    	{
    		'showUpload':false,
    		'showCaption' : false,
    		language: "fr"
    	});
</script>
<?php
$this->stop('script'); 
?>