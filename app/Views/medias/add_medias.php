<?php $this->layout('layout_back', ['title' => 'Medias - Ajout des Medias']) ?>

<?php $this->start('main_content') ?>
	<h2>Ajout des médias</h2>
	

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
			<label class="col-md-4 control-label" for="picture">Images</label>
			<div class="col-md-4">
				<input type="file" id="picture" name="picture" multiple class="form-control" accept="image/*">
			</div>
		</div>

		<!-- Vidéo -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="video">Videos</label>
			<div class="col-md-4">
				<input type="file" id="video" name="video" multiple class="form-control" accept="video/*">
			</div>
		</div>


		<div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" id="submitForm" class="btn btn-primary">Ajouter des médias</button>
			</div>
		</div>
	</form>


<?php $this->stop('main_content') ?>
