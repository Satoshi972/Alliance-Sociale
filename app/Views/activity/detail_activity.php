<?php 
$this->layout('myLayout');
$this->layout('myLayout', ['title'=>'Détail du post']);
$this->start('main_content');
?>

<!-- Détail de mon post -->
<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Image</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="../../../public/<?php echo $detail['picture']?>" alt="picture"></p>
</div>	

<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Nom</h4>
	<p class="list-group-item-text"><?php echo $detail['name']?></p>
</div>	

<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Categorie</h4>
	<p class="list-group-item-text"><?php echo $detail['category']?></p>
</div>	
<br>
<!-- affichage de l'erreur -->
<div id="result"></div>

<br>
<!-- Ajout de commentaire -->
<form action="<?php $this->url('detail_activity'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">

	<div class="form-group">
		<label for="content">Entrez votre commentaire</label>		
		<input type="text" name="content" id="content" class="form-control">
	</div>

	<div class="text-center">
		<input type="submit" class="btn btn-info" value="Commenter">
	</div>
</form>

<!-- Affichage des commentaires lié a mon post (s'il y en a) -->
<section id="comments">
	<?php 
	if(isset($comments)):
		foreach ($comments as $key => $value):
	?>
			<!-- <div class="list-group-item text-center">
				<h4 class="list-group-item-heading">Commentaire de:</h4>
				<p class="list-group-item-text"><?php// echo $value['username']?></p>
			</div> -->

			<div class="list-group-item text-center">
				<p class="list-group-item-text"><?php echo $value['content']?></p>
				<p class="list-group-item-text"><?php echo $value['date']?></p>
			</div>
	<?php
		endforeach;
	endif;
	?>
</section>

<?php 
$this->stop('main_content');

?>