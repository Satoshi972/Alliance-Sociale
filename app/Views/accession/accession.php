<?php $this->layout('layout_front', ['title' => 'Adhesions']) ?>

<?php $this->start('main_content') ?>

	
	<div class="row">
		<div class="col-lg-12">

			<div class="col-sm-12 text-center">
					<h1>Adhesion</h1>
			</div>

			<div class="col-md-12 text-center">
					<p>Gagner du temps en remplissant chez vous la fiches d’inscriptions pour accéder aux différentes activités</p>
			</div>

			<div class="col-md-12 text-center">
				<button type="submit" id="submitForm" class="btn btn-default"><a href="<?= $this->assetUrl('files/fiche adhesion alliance.pdf') ?>">Téléchager la fiche d'adhésion</a></button>
			</div>

		</div>
	</div>
	

<?php $this->stop('main_content') ?>