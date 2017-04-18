<?php

$this->layout('layout_back', ['title' => 'Ajouter un partenaire']);

$this->start('head');
?>

<link rel="stylesheet" href="<?= $this->assetUrl('css/fileinput.min.css') ?>">

<?php
$this->stop('head');

$this->start('main_content');?>


<div class ="container">
	<div class="row">
		<div class="col-md-12">

			<div class="col-md-6 col-md-offset-3 text-center well">

				<div class="col-md-12 jumbotron">        
          			<h2>Ajouter un partenaire</h2>
      			</div>

					<?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
						<p class="alert alert-danger alert-dismissable"><?=implode('<br>', $errors); ?></p>
					<?php endif; ?>

					<?php if($success == true): // La variable $success est envoyé via le controller?>
						<p class="alert alert-success alert-dismissable">Votre partenaire à bien été ajouter</p>
					<?php endif; ?>

				<form method="post" id="url" class="form-horizontal" enctype="multipart/form-data">

					
					<div class="form-group">            
				        <label class="col-md-2 control-label" for="name">Partenaire</label>
						<div class="col-md-10">
				        <input type="text" class="form-control" name="name" id="name">
				        </div>
					</div>
			         
					
					<div class="form-group">
						<label class="col-md-2 control-label" for="url">Logo</label>
						<div class="col-md-8">
						<input type="file" name="url" id="picture" accept="image/*">
						</div>
					</div>
					

					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<button type="submit" id="submitForm" class="btn btn-primary">Ajouter de Partenaire</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->stop('main_content'); ?>

<?php
$this->start('script'); 
?>
    <script src="<?= $this->assetUrl('js/file-input/fileinput.min.js'); ?>"></script>
    <script src="<?= $this->assetUrl('js/file-input/fr.js'); ?>"></script>
<script>
  $("#picture").fileinput(
      {
        'showUpload':false,
        'showCaption' : false,
        language: "fr"
      });
</script>
<?php
$this->stop('script'); 
?>