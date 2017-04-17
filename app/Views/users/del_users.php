<?php 

$this->layout('layout_back', ['title' => 'Utilisateur supprimé']);

$this->start('main_content');

?>



<div class ="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-6 col-md-offset-2 text-center well">
      	<div class="col-md-12 jumbotron">
        	<h2>Suppression utilisateur</h2>
        </div>
            <?php if($success == true): // La variable $success est envoyé via le controller?>
                <p class="alert alert-success alert-dismissable" ">Votre utilisateur à bien été supprimé</p>	
			<?php endif; ?>

		<form method="post" class="form-horizontal">
			<input type="bouton" class="btn btn-primary" value="Liste des utilisateurs" onclick="document.location.href='/Alliance-Sociale/public/users/list';"> 
		</form>

      </div>
    </div>
  </div>
</div>




 <script>
   
 </script>

<?php  $this->stop('main_content');?>
	