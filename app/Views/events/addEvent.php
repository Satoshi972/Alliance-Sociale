<?php 
$this->layout('layout',['title'=>'Création d\'évenement']);
$this->start('head');
?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= $this->assetUrl('css/fullcalendar.min.css') ?>">
<?php
$this->stop('head');
$this->start('main-content');
?>

<legend class="text-center">Cr&eacute;ation d'&eacute;v&egrave;nement</legend>
<form class="form-horizontal" enctype="multipart/form-data">
	<div class="form-group">
		<label for="picture">Image</label>
		<input type="text" id="picture" class="picture" class="form-control">
	</div>

	<div class="form-group">
		<label for="title"></label>
		<input type="text" id="title" class="title" class="form-control">
	</div>

	<div class="form-group">
		<label for="content"></label>
		<input type="text" id="content" class="content" class="form-control">
	</div>

	<div class="form-group">
		<label for=""></label>
		<input type="text" id="" class="" class="form-control">
	</div>

	<div class="form-group">
		<label for=""></label>
		<input type="text" id="" class="" class="form-control">
	</div>

	<div class="form-group">
		<label for=""></label>
		<input type="text" id="" class="" class="form-control">
	</div>

	<div class="form-group">
		<label for=""></label>
		<input type="text" id="" class="" class="form-control">
	</div>

	<div class="text-center">
		<input type="text" class="btn btn-primary" value="Envoyer">
	</div>
</form>

<?php
$this->stop('main-content');
$this->start('script');
?>
<script src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/jquery-ui.min.js') ?>"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
	$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );
  } );
  </script>
<?php
$this->stop('script');
?>