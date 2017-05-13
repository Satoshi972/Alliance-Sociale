
<?php $this->layout('layout_Back', ['title' => 'Medias - Listes des Medias']) ?>

<?php $this->start('main_content') ?>


<div class ="container">
  <div class="row">
      <div class="col-md-12 well">
        <div class="col-md-12 jumbotron text-center">        
          <h2>Listes des médias</h2>
        </div>

			<div class="col-md-12">	
			<section class="row">
				
			<?php foreach($medias as $media): ?>	
			
				<figure class="col-xs-3">
			    	<!-- <img src="/Alliance-Sociale/public/<?php// echo $media['url'];?>" class="img-responsive" style="width: 20vw; height: 15vh;" alt="medias"> -->
			    	<img src="/Alliance-Sociale/public/<?=$media['url'];?>" class="img-responsive" style="width: 20vw; height: 15vh;" alt="medias" frameborder="0" scrolling="no">
			    	
			    	<figcaption><a href="<?= $this->url('deleteMedias',['id'=>$media['id']]) ?>" class="btn btn-dange text-center">Supprimer</a></figcaption>
			    </figure>
			<?php 	endforeach; ?> 
			</section>

			<section class="row text-center">
				<!--  Pour l'affichage, on centre la liste des pages -->
				<ul class="pagination">
					<?php
						 for($i=1; $i<=$nbPages; $i++): //On fait notre boucle	
					?>
			          	<li>
			          		<a href="<?=$this->url('listMediasBack',['page'=>$i])?>" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a>
			          	</li>
					<?php endfor; ?>
				</ul>
			</section>
			<!-- lightview -->
			<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
			  <div class="modal-dialog">
			  <div class="modal-content">
			    <div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">×</button>
					<h3 class="modal-title"></h3>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			   </div>
			  </div>
			</div>
			<!-- fin light -->

			</div>
      </div>
  </div>
</div>
<?php 
$this->stop('main_content');    
$this->start('script');

?>
<script>
$(document).ready(function() {
$('.img-responsive').click(function(){
      $('.modal-body').empty();
  	var title = $(this).parent('a').attr("title");
  	$('.modal-title').html(title);
  	$($(this).parents('div').html()).appendTo('.modal-body');
  	$('#myModal').modal({show:true});
});
});        
</script> 
<?php
    $this->stop('script');
?>