<?php $this->layout('layout_front', ['title' => 'Medias - Listes des Medias']) ?>

<?php $this->start('main_content') ?>

<div class="col-sm-12">
	<h1>CONTACT</h1>
</div>
	<!-- Affichage success et errors -->
	<div class="col-md-6 col-md-offset-3">
		<?php if($success == true): // La variable $success est envoyé via le controller?>
			<p style="color:green">Bravo, vos médias ont bien été enregistré</p>
		<?php endif; ?>

		<?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
			<p style="color:red"><?=implode('<br>', $errors); ?></p>
		<?php endif; ?>
	</div> 

	<!--  -->

	



	<!-- formulaire -->
	<div class="col-md-6 col-md-offset-3">

		<form method="post" id="contact" class="form-horizontal">

			<div class="form-group">
				<label class="col-md-2 control-label" for="title">Titre</label>
				<div class="col-md-10">
					<input type="text" id="title" name="title" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label" for="email">Email</label>
				<div class="col-md-10">
					<input type="email" id="email" name="email" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label" for="content">Contenu</label>
				<div class="col-md-10">
					<input type="text" id="text" name="content" rows="5" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-4 col-md-offset-4">
					<button type="submit" id="submitForm" class="btn btn-primary">Ajouter des médias</button>
				</div>
			</div>
		</form>
	</div>

<?php $this->stop('main_content') ?>