<!--  <?php $this->layout('layout_back', ['title' => '']) ?>

<?php $this->start('main_content') ?>


				<div id="result">
					<?php 
					if(isset($result) && !empty($result))
					{
						echo $result;
					}
					?>
				</div>
<main>
				<form action="<?php $this->url('add_activity'); ?>" class="form-horizontal" enctype="multipart/form-data" method="post">

					<legend class="text-center">Ajout d'une activité</legend>
					<div class="form-group">
						<label for="name">Nom de l'activité:</label>
						<input type="text" id="name" name="name" class="form-control">
					</div>

					<div class="form-group">
						<label for="category">Categorie:</label>
						<textarea name="category" id="category" cols="30" rows="10" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="picture">Insertion d'images:</label>
						<input type="file" id="picture" name="picture" accept="image/*" multiple>
					</div>

					<div class="text-center">
						<input type="submit" class="btn btn-primary">
					</div>

				</form>
				</main>

<?php 
	$this->stop('main_content');
	$this->start('script');
?>
<script>
	$(function()
	{
		SubmitForm();
	});
</script>
<?php
	// $this->stop('script');
?> -->

<div class="container">

	<h1 class="text-center">Ajout d'une activité</h1>
	<br>

	<div id="result"></div>

	<form method="post" id="addActivity" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-md-4 control-label" for="name">Nom</label>
			<div class="col-md-4">
				<input type="text" id="name" name="name" class="form-control">
			</div>
		</div>
		<br>

	<div class="col-md-4 form-group"> 
	<label for="picture">Catégorie</label>            
        <select class="form-control" id="role" name="role">
                    <option>-- Sélectionnez --</option>
                    <option>Formation</option>
                    <option>Comité des jeunes</option>
                    <option>Sports et loisirs</option>
                    <option>Education</option>
                    <option>Animation</option>
        </select>    
    </div>
<br>
		
        <div class="col-md-4 form-group">
        <label for="picture">Photo</label>
		<input type="file" name="picture" class="form-control" id="picture" accept="image/*">
        </div>

		<div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" id="submitForm" class="btn btn-primary">Ajouter l'activité</button>
			</div>
		</div>

	</form>
	</div>

script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script
<script src="js/jquery-3.2.0.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>

 