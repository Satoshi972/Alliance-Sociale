<?php 

$this->layout('layout_back', ['title' => 'Partenaire supprimé']);

$this->start('main_content');

?>

<div class ="container">
	<div class="row">
		<div class="col-md-12">

			<div class="col-md-6 col-md-offset-3 text-center well">

				<input type="bouton" value="Liste des utilisateurs" onclick="document.location.href='/Alliance-Sociale/public/partners/list';">

		</div>
	</div>
</div>

<?php  $this->stop('main_content');?>
	