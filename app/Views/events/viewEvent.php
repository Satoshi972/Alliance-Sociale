<?php 
$this->layout('layout_back',['title' => 'Fiche de l\'event']);
$this->start('main_content');
?>
<legend class="text-center">Fiche de l'évenement</legend>
	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Affiche</h4>
		<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $infos['picture'];  ?>" alt="logo"></p>
	</div>

	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Intitulé</h4>
		<p class="list-group-item-text"><?=$infos['title'];?></p>
	</div>

	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Date de début</h4>
		<p class="list-group-item-text"><?= $infos['start'];?></p>
	</div>

	<?php if(!($infos['start'])): ?>
	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Date de fin</h4>
		<p class="list-group-item-text"><?= $infos['start'];?></p>
	</div>
	<?php endif; ?>

	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Description</h4>
		<p class="list-group-item-text"><?=$infos['content'];?></p>
	</div>

	<!-- <?php 
		foreach ($activity as $key => $value) 
		{
			if($value['act_id'] = $infos['id_activity']):
	?>
				<div class="list-group-item text-center">
					<h4 class="list-group-item-heading">Activité de l'évènement</h4>
					<p class="list-group-item-text"><?=$value['name'];?></p>
				</div>
	<?php 
			endif;
		} 
	?> -->
	<?php if(!empty($infos['quota'])): ?>
	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Quota</h4>
		<p class="list-group-item-text"><?=$infos['quota'];?></p>
	</div>
	<?php endif; ?>

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

<?php
$this->stop('main_content');
?>