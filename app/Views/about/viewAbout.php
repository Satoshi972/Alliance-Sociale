<?php 
$this->layout('layout', ['title' => 'Mise a jour des infos du site']);

$this->start('main-content');
?>
<main class="container">
	<legend class="text-center">Information de la page à propos</legend>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Histoire</h4>
	<p class="list-group-item-text"><?= $infos['word'];?></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Mot de la présidente</h4>
	<p class="list-group-item-text"><?=$infos['history'];?></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Présidente</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $this->assetUrl($info['img1']);  ?>" alt="img1"></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Directeur</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $this->assetUrl($info['img2']);  ?>" alt="img2"></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Coordinatrice</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $this->assetUrl($info['img3']);  ?>" alt="img3"></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Chargé d'accueil</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $this->assetUrl($info['img4']);  ?>" alt="img4"></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Référente Famille</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $this->assetUrl($info['img5']);  ?>" alt="img5"></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Chargé d'animation</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $this->assetUrl($info['img6']);  ?>" alt="img6"></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Accompagnement scolarité</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $this->assetUrl($info['img7']);  ?>" alt="img7"></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Animateur de loisir</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $this->assetUrl($info['img8']);  ?>" alt="img8"></p>
	</div>img1

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Référent de jeunesse</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $this->assetUrl($info['img9']);  ?>" alt="img9"></p>
	</div>

	<div class="text-center">
		<a href="<?=$this->url('update_about',['id'=>$infos['id']]) ?>">
			<button class="btn btn-info">Modification</button>
		</a>
	</div>
</main>
<?php
$this->stop('main-content');
?>
