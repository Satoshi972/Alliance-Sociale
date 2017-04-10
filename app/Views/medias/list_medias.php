<?php $this->layout('layout_back', ['title' => 'Medias - Listes des Medias']) ?>

<?php $this->start('main_content') ?>


<div class="col-md-12">

	<div class="col-md-6 col-md-offset-3">
		<h2>Listes des médias</h2>
	</div>

	<div class="col-md-12">	
	<?php foreach($images as $image): ?>	
	
		<div class="col-xs-3">
	    	<img src="/Alliance-Sociale/public/<?=$image['url'];?>" class="img-responsive" alt="medias">
	    </div>
	       
	<?php endforeach; ?>
	</div>
			
</div>

<?php $this->stop('main_content') ?>