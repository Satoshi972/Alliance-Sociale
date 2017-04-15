category.php<?php $this->layout('layout_back', ['title' => '']) ?>

<?php $this->start('main_content') ?>

	<h1 class="text-center">Ajout d'une catégorie</h1>
	<br>

	<div id="result"></div>

	<form method="post" id="addCategory" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-md-4 control-label" for="name">Nom</label>
			<div class="col-md-4">
				<input type="text" id="name" name="name" class="form-control">
			</div>
		</div>
		<br>
<br>
		<div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" id="submitForm" class="btn btn-primary">Ajouter la catégorie</button>
			</div>
		</div>

	</form>

<!--script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script-->
<script src="js/jquery-3.2.0.min.js"></script>
<script src="js/script.js"></script>
</body>
<?php $this->stop('main_content') ?>
</html>

