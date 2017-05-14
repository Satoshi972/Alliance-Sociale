<?php 
$this->layout('layout_back',['title' => 'Fiche de l\'event']);
$this->start('main_content');
?>


<div class ="container">
  <div class="row">
	  <div class="col-md-12 well">
		  <div class="row">
		      <div class="col-md-12 jumbotron text-center">
		        <h2>Fiche de l'évenement</h2>
		      </div>
		    </div>

		    <div class="row">
			    <div class="col-md-12">
					<div class="list-group-item text-center">
						<h4 class="list-group-item-heading" style="color: #DAA520;">Affiche</h4>
						<p class="list-group-item-text"><img class="img-responsive" src="/Alliance-Sociale/public/<?= $infos['picture'];  ?>" alt="logo"></p>
					</div>

					<div class="list-group-item text-center">
						<h4 class="list-group-item-heading" style="color: #DAA520;">Intitulé</h4>
						<p class="list-group-item-text" style="color: #DAA520;"><?=$infos['title'];?></p>
					</div>

					<div class="list-group-item text-center">
						<h4 class="list-group-item-heading" style="color: #DAA520;">Date<?php if($infos['end'] !== null){echo ' de début';}?></h4>
						<p class="list-group-item-text" style="color: #DAA520;"><?= $infos['start'];?></p>
					</div>

					<?php if($infos['end'] !== null): ?>
					<div class="list-group-item text-center">
						<h4 class="list-group-item-heading" style="color: #DAA520;">Date de fin</h4>
						<p class="list-group-item-text" style="color: #DAA520;"><?= $infos['end'];?></p>
					</div>
					<?php endif; ?>

					<div class="list-group-item text-center">
						<h4 class="list-group-item-heading" style="color: #DAA520;">Description</h4>
						<p class="list-group-item-text" style="color: #DAA520;"><?=$infos['content'];?></p>
					</div>

					<?php if(!empty($infos['quota'])): ?>
					<div class="list-group-item text-center">
						<h4 class="list-group-item-heading" style="color: #DAA520;">Quota</h4>
						<p class="list-group-item-text" style="color: #DAA520;"><?=$infos['quota'];?></p>
					</div>
					<?php endif; ?>
					<br>

					<div class="text-center">
						<a href="<?=$this->url('listEvent') ?>">
							<button class="btn btn-default">Retour a la liste</button>
						</a>

						<a href="<?=$this->url('updateEvent',['id'=>$infos['id']]) ?>">
							<button class="btn btn-info">Modification</button>
						</a>

						<a href="<?=$this->url('deleteEvent',['id'=>$infos['id']]) ?>">
							<button class="btn btn-danger">Suppression</button>
						</a>
					</div>
				</div>
			</div>
		</div>
 	</div>
</div>


<?php
$this->stop('main_content');
?>