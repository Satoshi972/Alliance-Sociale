<?php 
$this->layout('layout_back',['title' => 'Maj de l\'event']);
$this->start('head');
?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/fullcalendar.min.css') ?>">
<link rel="stylesheet" href="<?= $this->assetUrl('css/fileinput.min.css') ?>">
 <style type="text/css">
.ui-datepicker {
   background: #c1c6c8;
   border: 1px solid black round;
   color: black;
   width: 6vw,
   height: auto;
 }
</style>
<?php
$this->stop('head');
$this->start('main_content');
?>
<form method="post" class="form-horizontal text-center" enctype="multipart/form-data">
	<legend class="text-center">Modifier l'évènement</legend>
	<div class="form-group">
		<label for="picture"></label>
		<img src="/Alliance-Sociale/public/ <?= $infos['picture']?>" alt="Affiche">
		<input type="file" id="picture" name="picture" accept="image/*">
	</div>

	<div class="form-group">
		<label for="title">Intitulé</label>
		<input type="text" class="form-control" id="title" name="title" value="<?= $infos['title'];?>">
	</div>
	<div class="form-group">
		<label for="start">Date de début</label>
		<input type="text" class="form-control" id="start" name="start" value="<?=$infos['start'] ?>">
	</div>
	<div class="form-group">
		<label for="end">Date de fin</label>
		<input type="text" class="form-control" id="end" name="end" value="<?= $infos['end'];?>">
	</div>
	<div class="form-group">
		<label for="content">Description de l'évènement</label>
		<textarea name="content" id="content" cols="30" rows="10" class="form-control" id="content" name="content" ><?=$infos['content'] ?></textarea>
	</div>

	<div class="form-group">
		<label for="quota">Quota de l'évènement</label>
		<input type="number" name="quota" id="quota" value="<?= $infos['quota'] ?>" class="form-control">
	</div>

	<div class="form-group">
		<label for="activity"></label>
		<select name="activity" id="activity" class="form-control">
			<?php 
				foreach ($list as $key => $value):
			?>
				<option value="<?= $value['cat_id'] ?>"
			<?php 
					if($value['cat_id'] = $infos['id_activity']):
			?>
						<?php 
							echo "selected";
							endif;
						?>
					><?= $value['name']?></option>
				<?php endforeach; ?>

		</select>
	</div>
	<div class="text-center">
		<input type="submit" class="btn btn-primary" value="Modifier">
	</div>
</form>
<?php
$this->stop('main_content');
$this->start('script');
?>
<!-- Jquery -->
<script src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>

<!-- JQuery UI -->
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
	    $( "#start" ).datepicker({ dateFormat: "yy-mm-dd"});
		$( "#end" ).datepicker({ dateFormat: "yy-mm-dd"});
		$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );
  } );
  </script>
</script>
<?php
$this->stop('script');
?>