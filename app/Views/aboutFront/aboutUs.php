<?php $this->layout('layout_front', ['title' => 'qui somme nous']) ?>

<?php $this->start('main_content') ?>


	<div class="about row">
	    <div class="col-md-12">

	    <div class="jumbotron text-center"> 
	    	<h1 style="font-family: 'Lobster';">Présentation</h1>
	    </div>
           
            <?php if (!empty($views)){ ?>
			<section class="about">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12 text-center">
							<h2 style="font-family: 'Lobster';">Que sommes nous ?</h2>
						</div>
						<p style="text-align:justify; font-family: 'Merienda';"><?=$views['description'];?></p>
						<p> <a href="<?= $this->assetUrl('files/projet social 2017-2020.pdf') ?>">Retrouvez plus en détails nos projets sociaux pour 2017-2020</a></p>
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
							<img src="<?= $this->assetUrl('teamAS/Jean Baptiste .jpg') ?>" alt="personnel" class="thumbnail img-responsive">
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
            <?php } ?>

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