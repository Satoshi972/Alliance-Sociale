
<?php $this->layout('layout_front', ['title' => 'Medias - Listes des Medias']) ?>

<?php $this->start('main_content') ?>


<div class="col-md-12">

	<div class="col-md-6 col-md-offset-3">
		<h2>Listes des médias</h2>
	</div>

	<div class="col-md-12">	
	<section class="row">
		
	<?php foreach($medias as $media): ?>	
	
		<figure class="col-xs-6 col-sm-4 col-lg-3">
	    	
	    	<img src="./<?=$media['url'];?>"data-toggle="modal" data-target="#myModal<?=$media['id'];?>" class="thumbnail img-responsive" style="width: 20vw; height: 15vh;" alt="medias" frameborder="0" scrolling="no">
	    </figure>
	    <!-- Modal -->
          <div class="modal fade" id="myModal<?=$media['id'];?>" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?=$media['title'];?></h4>
                </div>
                <div class="modal-body">
                  <img src="./<?=$media['url'];?>" style="width:100%; margin: 0 auto; ">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
	<?php 	endforeach; ?> 
	</section>

	<section class="row text-center">
		<!--  Pour l'affichage, on centre la liste des pages -->
		<ul class="pagination">
			<?php
				 for($i=1; $i<=$nbPages; $i++): //On fait notre boucle	
			?>
	          	<li><a href="<?=$this->url('listMedias',['page'=>$i])?>" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a></li>
			<?php endfor; ?>
		</ul>
	</section>
	</div>
</div>

<?php $this->stop('main_content') ?>