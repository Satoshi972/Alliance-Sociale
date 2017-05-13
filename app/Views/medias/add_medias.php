
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
   <div class="col-md-12 well">
	<div class="col-md-12 jumbotron text-center">
		<h2>Ajout des médias</h2>
	</div>
	
	<div class="col-md-12" id='#result'></div> 
	<form method="POST"  class="form-horizontal" enctype="multipart/form-data">

		<!-- Image -->
		<div class="form-group">
			<div class="col-md-2 text-center">
				<label class="control-label" for="medias">Envoyez vos médias</label>
			</div>
			<div class="col-md-10">
				<input type="file" id="medias" name="medias[]" multiple>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-2 text-center">
			<label for="event">Evenement</label>
			</div>
			<div class="col-md-10">
				<select name="event" id="event" class="form-control">
					<?php foreach ($list as $key => $value):?>
						<option value="<?= $value['id_event'] ?>"><?= $value['title'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-2 text-center">
				<label for="visible">Ces médias seront-ils visibles a tous?(vous ne pourrez pas modifier ceci après)</label>
			</div>
			<div class="col-md-10">
				<input type="checkbox" value="1" name="visible" id="visible">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-12 text-center">
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

$(function()
{
  //gestion de mon formulaire d'envoi
  $('form').on('submit',function(e)
  {
      e.preventDefault();
      var myForm = $('form');
      submitForm(myForm);
  });
});
</script>
<?php
$this->stop('script'); 
?>