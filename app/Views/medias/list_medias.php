<?php $this->layout('layout', ['title' => 'Medias - Listes des Medias']) ?>

<?php $this->start('main_content') ?>

<div class="col-md-12">
		
	<?php foreach($images as $image): ?>	

		<div class="col-xs-4">
	    	<img src="<?=$image['url'];?>" class="img-responsive" alt="medias">
	    </div>
	        
	    <div class="col-xs-4">
	        <img src="<?=$image['url'];?>" class="img-responsive" alt="medias">
	    </div>

	    <div class="col-xs-4">         
	    	<img src="<?=$image['url'];?>" class="img-responsive" alt="medias">         
	    </div>

	<?php endforeach; ?>
			
</div>
<?php $this->stop('main_content') ?>