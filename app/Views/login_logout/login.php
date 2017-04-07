<?php $this->layout('layout', ['title' => 'Se connecter']) ?>

    <?php 
//début du bloc main_content
$this->start('main_content'); ?>
        <h1>Entrez vos identifiants !</h1>
        
       

    <div id="result"></div>

	<form method="post" id="checkform">

		<label for="ident">Identifiant</label>
		<input type="email" name="ident" id="ident">


		<br>
		<label for="password">Mot de passe</label>
		<input type="password" name="password" id="password"> 


		<br>
		<button type="submit" id="submitForm">Se connecter</button>
	</form>
      
     
 <?php    
$this->stop('main_content'); ?>