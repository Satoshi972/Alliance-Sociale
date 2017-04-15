<?php 
$this->layout('layout', ['title' => 'Afficher']);

$this->start('main_content');
?>

<legend class="text-center">Information du à propos</legend>

	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Mot de la présidente</h4>
		<p class="list-group-item-text"><?=$infos['word'];?></p>
	</div>

	<div class="list-group-item text-center">
		<h4 class="list-group-item-heading">Histoire</h4>
		<p class="list-group-item-text"><?= $infos['history'];?></p>
	</div>

	<div class="text-center">
		<a href="<?=$this->url('update_about',['id'=>$infos['id']]) ?>">
			<button class="btn btn-info">Modification</button>
		</a>
	</div>

<?php
$this->stop('main_content');
?>