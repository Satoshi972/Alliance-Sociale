<?php $this->layout('layout_front', ['title' => 'qui somme nous']) ?>

<?php $this->start('main_content') ?>


	<div class="row">
	    <div class="col-md-12">

	    <div class="jumbotron text-center"> 
	    <h1>Qui sommes nous?</h1></div>
           
            <?php if (!empty($views)){ ?>
	    	<section class="president">	
	    		<div class="row">
					<div class="col-md-12 text-center">
						<h1>Mot du president</h1>
					</div>
						
					<?php foreach($views as $view): ?>

					<div class="col-md-12">					
						<p style="text-align:center"><em><?=$view['word'];?></em></p>
					</div>
				</div>
			</section>

				<?php endforeach; ?>
			<section class="histoire">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12 text-center">
							<h2>Histoire de l'association</h2>
						</div>
						<p style="text-align:center"><?=$view['history'];?></p>
					</div>
				</div>
			</section>
            <?php } ?>
			<section class="organigramme">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2>Notre équipe</h2>
					</div>
					
					<div class="row">
						<div class="col-md-12">

							<div class="col-md-4">							
								<figure>
									<h4 class="text-center">Coordinatrice</h4>
									<img src="<?= $this->assetUrl('teamAS/Filet Joanna.jpg') ?>" alt="personnel" class="thumbnail img-responsive">
									<figcaption class="text-center">Mme Joanna FILET</figcaption>
								</figure>
							</div>
							<div class="col-md-4">
								<figure>
									<h4 class="text-center">Présidente</h4>
									<img src="<?= $this->assetUrl('teamAS/Jean Baptiste .jpg') ?>" alt="personnel" class="thumbnail img-responsive">
									<figcaption class="text-center">Mme Léa JEAN-BAPTISTE ADOLPHE</figcaption>
								</figure>
							</div>
							<div class="col-md-4">
								<figure>
									<h4 class="text-center">Directeur</h4>
									<img src="<?= $this->assetUrl('teamAS/Mongis.jpg') ?>" alt="personnel" class="thumbnail img-responsive">
									<figcaption class="text-center">Mr Jean-Michel MONGIS</figcaption>
								</figure>								
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-12">

							<div class="col-md-4">							
								<figure>
									<h5 class="text-center">Chargé d'Acceuil</h5>
									<img src="<?= $this->assetUrl('teamAS/Tania Gris Desormaux.jpg') ?>" alt="personnel" class="thumbnail img-responsive">
									<figcaption class="text-center">Mme Tania GROS-DESORMEAUX</figcaption>
								</figure>
							</div>
							<div class="col-md-4">
								<figure>
								<h5 class="text-center">Référente Famille</h5>
								<img src="<?= $this->assetUrl('teamAS/Sandrine Poulin.jpg') ?>" alt="personnel" class="thumbnail img-responsive">
								<figcaption class="text-center">Mme Sandrine POULIN</figcaption>
							</figure>
							</div>
							<div class="col-md-4">
								<figure>
								<h5 class="text-center">Chargé d'Animation</h5>
								<img src="<?= $this->assetUrl('teamAS/Pamela Cabit.jpg') ?>" alt="personnel" class="thumbnail img-responsive">
								<figcaption class="text-center">Mme Pamela CABIT</figcaption>
							</figure>								
							</div>
						</div>
					</div>



					<div class="row">
						<div class=" col-md-12">

							<div class="col-md-4">							

							<figure>
								<h5 class="text-center">Référent Jeunesse</h5>
								<img src="<?= $this->assetUrl('teamAS/Roger Gabrit.jpg') ?>" alt="personnel" class="thumbnail img-responsive" >
								<figcaption class="text-center">Mr Roger GABRIT</figcaption>
							</figure>
							</div>
							<div class="col-md-4">
							<figure>
								<h5 class="text-center">Animateur de Loisirs</h5>
								<img src="<?= $this->assetUrl('teamAS/Dominique Rosina.jpg') ?>" alt="personnel" class="thumbnail img-responsive">
								<figcaption class="text-center">Mr Dominique ROSINA</figcaption>
							</figure>
							</div>
							<div class="col-md-4">
							<figure>
								<h5 class="text-center">Scolarité</h5>
								<img src="<?= $this->assetUrl('teamAS/Lydie Milton.jpg') ?>" alt="personnel" class="thumbnail img-responsive">
								<figcaption class="text-center">Mme Lydie MILTON</figcaption>
							</figure>							
							</div>
						</div>
					</div>
			






					
						
			

	      </div>
         </section>
	    </div>
       </div>

<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3 class="modal-title">Heading</h3>
	</div>
	<div class="modal-body">
		
	</div>
	<div class="modal-footer">
		<button class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
   </div>
  </div>
</div>

<?php $this->stop('main_content');
    
$this->start('script');

?>


<script>
$(document).ready(function() {
$('.thumbnail').click(function(){
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