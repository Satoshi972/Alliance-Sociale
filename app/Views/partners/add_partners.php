<?php

$this->layout('layout_back', ['title' => 'Ajouter un partenaire']);

$this->start('main_content');?>

  <?php if($success == true): // La variable $success est envoyé via le controller?>
    <p style="color:green">Le partenaire a été ajouté</p>
    <?php endif; ?>

      <?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
        <p style="color:red">
          <?=implode('<br>', $errors); ?>
        </p>
        <?php endif; ?>


<div class ="container">
	<div class="row">
		<div class="col-md-12">

			<div class="col-md-6 col-md-offset-3">
				<h2>Ajouter un partenaire</h2>

				<form method="post" id="url" class="form-horizontal" enctype="multipart/form-data">

					
				 <div class="form-group">            
			            <label class="col-md-2 control-label" for="name">Partenaire</label>
						<div class="col-md-10">
			            <input type="text" class="form-control" name="name" id="name">
			            </div>
				</div>
			         
					
					<div class="form-group">
						<label class="col-md-2 control-label" for="url">Logo</label>
						<div class="col-md-10">
						<input type="file" name="url" id="url" accept="image/*">
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