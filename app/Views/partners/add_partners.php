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
      <div class="col-md-12 well">

				<div class="col-md-12 jumbotron text-center">      
          			<h2>Ajouter un partenaire</h2>
      			</div>

					<div id="result" class="col-xs-12"></div>

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
						<div class="col-md-12 text-center">
							<button type="submit" id="submitForm" class="btn btn-primary">Ajout de Partenaire</button>
						</div>
					</div>
					
				</form>
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