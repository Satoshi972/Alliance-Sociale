<?php 
$this->layout('layout',['title'=>'Création d\'évenement']);
$this->start('head');
?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= $this->assetUrl('css/fullcalendar.min.css') ?>">
<link rel="stylesheet" href="<?= $this->assetUrl('css/fileinput.min.css') ?>">
<?php
$this->stop('head');
$this->start('main_content');
?>
<div class="container">
<legend class="text-center">Cr&eacute;ation d'&eacute;v&egrave;nement</legend>
<form class="form-horizontal" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="picture">Image</label>
		<input type="file" id="picture" class="picture" class="form-control">
	</div>

	<div class="form-group">
		<label for="title">Titre</label>
		<input type="text" id="title" class="title" class="form-control">
	</div>

	<div class="form-group">
		<label for="content">Contenu</label>
		<textarea name="content" id="content" cols="30" class="form-control" rows="10"></textarea>
	</div>

	<div class="form-group">
		<label for="start">Date de début</label>
		<input type="text" id="start" class="start" class="form-control">
	</div>

	<div class="form-group">
		<label for="stop">Date de fin</label>
		<input type="text" id="stop" class="stop" class="form-control">
	</div>

	<div class="form-group">
		<label for="activity">L'activité rapportée a l'évenement</label>
		<select name="activity" id="activity" class="form-control">
			<?php foreach ($infos as $key => $value):?>
				<option value="<?= $value['act_id'] ?>"><?= $value['name']  ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="text-center">
		<input type="text" class="btn btn-primary" value="Envoyer">
	</div>
</form>
</div>
<?php
$this->stop('main_content');
$this->start('script');
?>
<script src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/jquery-ui.min.js') ?>"></script>

<script src="<?= $this->assetUrl('js/file-input/fileinput.min.js'); ?>"></script>
<script src="<?= $this->assetUrl('js/file-input/fr.js'); ?>"></script>
<script>
$("#picture").fileinput(
	{
		'showUpload':false,
		'showCaption' : false,
		language: "fr",
	});
</script>

  <script>
  $( function() {
    $( "#start" ).datepicker();
    $( "#stop" ).datepicker();
	$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );
  } );
  </script>
<?php
$this->stop('script');
?>