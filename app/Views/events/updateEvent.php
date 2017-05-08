<?php 
$this->layout('layout_back',['title' => 'Maj de l\'event']);
$this->start('head');
?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/fullcalendar.min.css') ?>">
<link rel="stylesheet" href="<?= $this->assetUrl('css/fileinput.min.css') ?>">
<link rel="stylesheet" href="<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" integrity="sha256-5ad0JyXou2Iz0pLxE+pMd3k/PliXbkc65CO5mavx8s8=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" integrity="sha256-xQh/Xj//D3X4M2UndCTVnMfzln8x5/EDePR3uckJoRo=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.min.css" integrity="sha256-nFp4rgCvFsMQweFQwabbKfjrBwlaebbLkE29VFR0K40=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.standalone.min.css" integrity="sha256-RMGrTGgTqr/RK4mbfJ/9dLy8Dz0oetp7mREUfq7o3IA=" crossorigin="anonymous" />
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
		<input type="text" class="form-control datepicker" id="start" name="start" value="<?=$infos['start'] ?>" data-provide="datepicker">
	</div>
	<div class="form-group">
		<label for="end">Date de fin</label>
		<input type="text" class="form-control datepicker" id="end" name="end" value="<?= $infos['end'];?>" data-provide="datepicker">
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
				<option value="<?= $value['act_id'] ?>"
			<?php 
					if($value['act_id'] = $infos['id_activity']):
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" integrity="sha256-urCxMaTtyuE8UK5XeVYuQbm/MhnXflqZ/B9AOkyTguo=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.fr.min.js" integrity="sha256-IRibTuqtDv2uUUN/0iTrhnrvvygNczxRRAbPgCbs+LE=" crossorigin="anonymous"></script>
<script>
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    language: 'fr'
});
  $("#picture").fileinput(
	{
		'showUpload':false,
		'showCaption' : false,
		language: "fr",
	});
</script>
</script>
<?php
$this->stop('script');
?>