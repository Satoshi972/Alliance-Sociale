<?php $this->layout('layout', ['title' => 'Medias - Ajout des Medias']) ?>

<?php $this->start('main_content') ?>
	<h2>Ajout des médias</h2>
	

	<form method="post" id="url" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-md-4 control-label" for="url">medias</label>
			<div class="col-md-4">
				<input type="file" id="url" name="url[]" multiple class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" id="submitForm" class="btn btn-primary">Ajouter des médias</button>
			</div>
		</div>
	</form>


<?php $this->stop('main_content') ?>
