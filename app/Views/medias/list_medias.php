
<?php $this->layout('layout_front', ['title' => 'Medias - Listes des Medias']) ?>

<?php $this->start('main_content') ?>


<div class="col-md-12">

	<div class="col-md-6 col-md-offset-3">
		<h2>Listes des médias</h2>
	</div>

	<div class="col-md-12">	
	<section class="row">
		
	<?php foreach($medias as $media): ?>	
	
		<figure class="col-xs-3">
	    	<!-- <img src="/Alliance-Sociale/public/<?php// echo $media['url'];?>" class="img-responsive" style="width: 20vw; height: 15vh;" alt="medias"> -->
	    	<iframe src="/Alliance-Sociale/public/<?=$media['url'];?>" class="img-responsive" style="width: 20vw; height: 15vh;" alt="medias" frameborder="0" scrolling="no"></iframe>
	    </figure>
	<?php 	endforeach; ?> 
	</section>

	<section class="row text-center">
		<!--  Pour l'affichage, on centre la liste des pages -->
		<ul class="pagination">
			<?php
				 for($i=1; $i<=$nbPages; $i++): //On fait notre boucle	
			?>
	          	<li><a href="<?=$this->url('listMedias',['page'=>$i])?>"><?=$i ?></a></li>
			<?php endfor; ?>
		</ul>
	</section>
	</div>
</div>

<?php $this->stop('main_content') ?>