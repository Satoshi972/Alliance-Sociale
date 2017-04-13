<?php $this->layout('layout_front', ['title' => 'qui somme nous']) ?>

<?php $this->start('main_content') ?>

<div class="container">
	<div class="row">
	    <div class="col-md-12">
			<?php foreach($views as $view): ?>


				<div class="col-md-12">
				<legend class="text-center">Mot du president</legend>
					<?=$view['word'];?>
				</div>
			
				<div class="col-md-12">
				<legend class="text-center">Histoire de l'association</legend>
					<?=$view['history'];?>
				</div>

			<?php endforeach; ?>

			<div class="col-md-4">
				<figure>
					<img src="<?= $this->assetUrl('teamAS/Roger Gabrit.jpg') ?>" alt="personnel" class="img-responsive">
					<figcaption style="display: block;">Roger Gabrit</figcaption>
				</figure>
			</div>

	    </div>
	</div>
</div>


<?php $this->stop('main_content') ?>