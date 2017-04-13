<?php 
$this->layout('layout', ['title' => 'Voir les infos du site']);

$this->start('main-content');
?>

	<legend class="text-center">Information du site</legend>
	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Logo</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $this->assetUrl($info['logo']);  ?>" alt="logo"></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Header</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $this->assetUrl($info['header']);  ?>" alt="header"></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Addresse</h4>
	<p class="list-group-item-text"><?= $infos['address'];?></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Horaire</h4>
	<p class="list-group-item-text"><?=$infos['schedule'];?></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Telephone</h4>
	<p class="list-group-item-text"><?=$infos['phone'];?></p>
	</div>
		
	<div class="text-center">
		<!-- <a href="<?php //echo $this->url('update_site',['id'=>$infos['id']]) ?>">
			<button class="btn btn-info">Modification</button>
		</a> -->
		<!-- <input type="bouton" value="Liste des utilisateurs" onclick="document.location.href='/Alliance-Sociale/public/management/updateInfo';"> -->
	</div>
<?php
$this->stop('main-content');
?>