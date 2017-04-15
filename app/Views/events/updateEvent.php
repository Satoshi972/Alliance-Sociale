<?php 
$this->layout('layout_front',['title' => 'Maj de l\'event']);
$this->start('main_content');
?>
<?php var_dump($infos); ?>

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
<script>
	$( function() {
    $( "#start" ).datepicker({format: 'yyyy/mm/dd'});
    $( "#end" ).datepicker({format: 'yyyy/mm/dd'});
	$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );
  } );
  </script>
</script>
<?php
$this->stop('script');
?>