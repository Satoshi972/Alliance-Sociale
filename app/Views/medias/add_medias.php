
<?php $this->layout('layout_back', ['title' => 'Medias - Ajout des Medias']);

$this->start('head');
?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/fileinput.min.css') ?>">

<?php
$this->stop('head');
$this->start('main_content');
?>
<div class ="container">
 <div class="row">
  <div class="col-md-12">
   <div class="col-md-8 text-center well jumbo">
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


	
	<form method="POST"  class="form-horizontal" enctype="multipart/form-data">

		<!-- Image -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="medias">Envoyez vos médias</label>
			<div class="col-md-4">
				<input type="file" id="medias" name="medias[]" multiple>
			</div>
		</div>

		<div class="form-group">
			<label for="event">Evenement</label>
			<select name="event" id="event" class="form-control">
				<?php foreach ($list as $key => $value):?>
					<option value="<?= $value['id_event'] ?>"><?= $value['title'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label for="visible">Ces médias seront-ils visibles a tous?</label>
			<input type="checkbox" value="1" name="visible" id="visible">
		</div>

		<div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" id="submitForm" class="btn btn-primary">Ajouter des médias</button>
			</div>
		</div>
	</form>
   </div>
  </div>
 </div>
</div>
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