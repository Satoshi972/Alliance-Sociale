<?php $this->layout('layout_front', ['title' => 'qui somme nous']) ?>

<?php $this->start('main_content') ?>


	<div class="about row">
	    <div class="col-md-12">

	    <div class="jumbotron text-center"> 
	    	<h1 style="font-family: 'Lobster';">Présentation</h1>
	    </div>
           
            <?php if (!empty($views)): ?>
			<section class="about">
				<div class="row">
					<div class="col-md-12">
		                   <!-- Modal -->
		                  <div class="modal fade" id="axes" role="dialog">
		                    <div class="modal-dialog">
		                      <!-- Modal content-->
		                      <div class="modal-content">
		                        <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal">&times;</button>
		                          <h4 class="modal-title text-center">Axes d'interventions</h4>
		                        </div>
		                        <div class="modal-body">
									<figure>								
										<img src="<?= $this->assetUrl('img/axe.jpg') ?>" alt="personnel" class="thumbnail img-responsive"style="width:100%; margin: 0 auto; ">							
									</figure>	                        
		                        </div>
		                        <div class="modal-footer">

		                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		                        </div>
		                      </div>
		                      
		                    </div>
		                  </div>
		                  <!-- Fin Modal -->

					</div>
				</div>
			</section>

	    	<section class="president">	
	    		<div class="row">
					<div class="col-md-12 text-center">
						<h2 style="font-family: 'Lobster';">Mot de la Présidente</h2>
					</div>


					<div class="col-md-5">
					
						<figure>
							<!-- <h4 class="text-center">Présidente</h4> -->
							<img src="<?= $this->assetUrl('teamAS/Jean Baptiste .jpg') ?>" alt="personnel" class="thumbnail img-responsive"style="width:100%; margin: 0 auto; ">
						<!-- 	<figcaption class="text-center">Mme Léa JEAN-BAPTISTE ADOLPHE</figcaption> -->
						</figure>	

					</div>
						

					<div class="col-md-7">					
						<p style="text-align:justify; font-family: 'Merienda';"><?=$views['word'];?></p>
					</div>
				</div>
			</section>

			<section class="histoire">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12 text-center">
							<h2 style="font-family: 'Lobster';">Histoire de l'association</h2>
						</div>
						<p style="text-align:justify; font-family: 'Merienda';"><?=$views['history'];?></p>
					</div>
				</div>
			</section>

			<div class="col-md-12 text-center">
				<h2 style="font-family: 'Lobster';">Un centre social ?</h2>
			</div>
			<video controls="controls" class="img-responsive" src="/Alliance-Sociale/public/<?=$views['description']?>"></video>
			<br>
			<br>
			<br>
			<br>
            <?php endif; ?>
			
            <div class="col-md-12 text-center">
				<a href="<?php echo $this->url('team') ?>" style="color: white;" class="btn btn-info">Découvrez notre équipe</a>
			</div>
	    </div>
       </div>

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