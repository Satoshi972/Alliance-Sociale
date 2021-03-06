<?php 
$this->layout('layout_front',['title' => 'Fiche de l\'event']);
$this->start('main_content');
?>
<legend class="text-center">Fiche de l'évènement</legend>
	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Affiche</h4>
		<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $infos['picture'];  ?>" style="width:100%; margin: 0 auto; "alt="logo"></p>
		
	</div>

	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Intitulé</h4>
		<p class="list-group-item-text"><?=$infos['title'];?></p>
	</div>

	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Date<?php if($infos['end'] !== null){echo ' de début';}?></h4>
		<p class="list-group-item-text"><?= $infos['start'];?></p>
	</div>

	<?php if($infos['end'] !== null): ?>
	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Date de fin</h4>
		<p class="list-group-item-text"><?= $infos['start'];?></p>
	</div>
	<?php endif; ?>

	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Description</h4>
		<p class="list-group-item-text"><?=$infos['content'];?></p>
	</div>

	<?php if(!empty($infos['quota'])): ?>
	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Limitation</h4>
		<p class="list-group-item-text"><?=$infos['quota'];?></p>
	</div>
	<?php endif; ?>


	<div class="text-center">
		<a href="<?=$this->url('default_home') ?>">
			<button class="btn btn-info">Retour a l'accueil</button>
		</a>
	</div>

<?php
$this->stop('main_content');
?>