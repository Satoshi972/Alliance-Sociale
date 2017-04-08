<?php $this->layout('layout', ['title' => 'Medias - Listes des Medias']) ?>

<?php $this->start('main_content') ?>

<div class="col-md-12">
		<?php foreach($images as $image): ?>	
			<img src="<?=$image['url'];?>" alt="medias">
		<?php endforeach; ?>
			
</div>
<?php $this->stop('main_content') ?>