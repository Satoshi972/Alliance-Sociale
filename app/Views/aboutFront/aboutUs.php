<?php $this->layout('layout_front', ['title' => 'qui somme nous']) ?>

<?php $this->start('main_content') ?>

<div class="container">
	<div class="row">
	    <div class="col-md-12">

	    <div class="jumbotron text-center"> 
	    <h1>Qui sommes nous?</h1></div>

	    	<section class="president">	
				<div class="col-md-12 text-center">
					<h2>Mot du president</h2>
				</div>
					
	    		<div class="col-md-4">
					<img src="<?= $this->assetUrl('teamAS/Jean Baptiste .jpg') ?>" alt="présidente" class="img-responsive">
				</div>

				<?php foreach($views as $view): ?>

				<div class="col-md-6">					
					<p><?=$view['word'];?></p>
				</div>
			</section>

				<?php endforeach; ?>
			<section class="histoire">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12 text-center">
							<h2>Histoire de l'association</h2>
						</div>
						<p><?=$view['history'];?></p>
					</div>
				</div>
			</section>

			<section class="organigramme">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2>Organigramme</h2>
					</div>

					<div class="col-md-offset-5 col-md-3">
						<figure>
							<h4 class="text-center">Présidente</h4>
							<img src="<?= $this->assetUrl('teamAS/Jean Baptiste .jpg') ?>" alt="personnel" class="img-responsive">
							<figcaption class="text-center">Mme Léa JEAN-BAPTISTE ADOLPHE</figcaption>
						</figure>
					</div>

					<div class="col-md-offset-5 col-md-3">
						<figure>
							<h4 class="text-center">Directeur</h4>
							<img src="<?= $this->assetUrl('teamAS/Mongis.jpg') ?>" alt="personnel" class="img-responsive">
							<figcaption class="text-center">Mr Jean-Michel MONGIS</figcaption>
						</figure>
					</div>

					<div class="col-md-offset-5 col-md-3">
						<figure>
							<h4 class="text-center">Coordinatrice</h4>
							<img src="<?= $this->assetUrl('teamAS/Filet Joanna.jpg') ?>" alt="personnel" class="img-responsive">
							<figcaption class="text-center">Mme Joanna FILET</figcaption>
						</figure>
					</div>

					<div class="col-md-12">
						<div class="col-md-3">
							<figure>
								<h4 class="text-center">Chargé d'Acceuil</h4>
								<img src="<?= $this->assetUrl('teamAS/Tania Gris Desormaux.jpg') ?>" alt="personnel" class="img-responsive">
								<figcaption class="text-center">Mme Tania GROS-DESORMEAUX</figcaption>
							</figure>
						</div>

						<div class="col-md-3">
							<figure>
								<h4 class="text-center">Référente Famille</h4>
								<img src="<?= $this->assetUrl('teamAS/Sandrine Poulin.jpg') ?>" alt="personnel" class="img-responsive">
								<figcaption class="text-center">Mme Sandrine POULIN</figcaption>
							</figure>
						</div>

						<div class="col-md-3">
							<figure>
								<h4 class="text-center">Chargé d'Animation</h4>
								<img src="<?= $this->assetUrl('teamAS/Pamela Cabit.jpg') ?>" alt="personnel" class="img-responsive">
								<figcaption class="text-center">Mme Pamela CABIT</figcaption>
							</figure>
						</div>
						

						
						<div class="col-md-3">
							<figure>
								<h4 class="text-center">Acompagnement Scolarité</h4>
								<img src="<?= $this->assetUrl('teamAS/Lydie Milton.jpg') ?>" alt="personnel" class="img-responsive">
								<figcaption class="text-center">Mme Lydie MILTON</figcaption>
							</figure>
						</div>
					</div>

					<div class="col-md-offset-3 col-md-12">
						<div class="col-md-3">
							<figure>
								<h4 class="text-center">Animateur de Loisirs</h4>
								<img src="<?= $this->assetUrl('teamAS/Dominique Rosina.jpg') ?>" alt="personnel" class="img-responsive">
								<figcaption class="text-center">Mr Dominique ROSINA</figcaption>
							</figure>
						</div>

						<div class="col-md-3">
							<figure>
								<h4 class="text-center">Référent Jeunesse</h4>
								<img src="<?= $this->assetUrl('teamAS/Roger Gabrit.jpg') ?>" alt="personnel" class="img-responsive">
								<figcaption class="text-center">Mr Roger GABRIT</figcaption>
							</figure>
						</div>
					</div>

				</div>
			</section>

	    </div>
	</div>
</div>


<?php $this->stop('main_content') ?>