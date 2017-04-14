<?php 
$this->layout('layout',['title' => 'Maj de l\'event']);
$this->start('main_content');
?>
<form action="" class="form-horizontal">
	<lengend class="text-center">Modifier l'évènement</lengend>
	<div class="form-group">
		<label for="Affiche"></label>
		<img src="/Alliance-Sociale/public/ <?= $infos['picture']?>" alt="Affiche">
	</div>
	<div class="form-group">
		<label for=""></label>
		<div class="form-control" id="" name=""></div>
	</div>
	<div class="form-group">
		<label for=""></label>
		<div class="form-control" id="" name=""></div>
	</div>
	<div class="form-group">
		<label for=""></label>
		<div class="form-control" id="" name=""></div>
	</div>
	<div class="form-group">
		<label for=""></label>
		<div class="form-control" id="" name=""></div>
	</div>
	<div class="form-group">
		<label for=""></label>
		<div class="form-control" id="" name=""></div>
	</div>
</form>
<?php
$this->stop('main_content');
?>