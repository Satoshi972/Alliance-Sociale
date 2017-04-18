<?php $this->layout('layout_front', ['title' => 'Medias - Album']); 

$this->start('head');
?>

<?php
$this->stop('head');
$this->start('main_content');
?>
<legend class="text-center">Liste des médias par évènements</legend>
<?php foreach ($events as $key => $value):?>
	<a href="<?= $this->url('album',['idE'=>$value['id_activity']]) ?>">
		<figure class="col-xs-2">
			<img src="/Alliance/public/" id="" name="" alt="">
			<figcaption>
				<p class="text-center"><?= $value['name'] ?></p>
			</figcaption>
		</figure>
	</a>
<?php endforeach; ?>

<?php 
$this->stop('main_content'); 
$this->start('script'); 
?>
 
<?php
$this->stop('script'); 
?>