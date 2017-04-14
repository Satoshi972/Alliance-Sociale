<?php $this->layout('layout', ['title' => 'Demander un nouveau mot de passe']) ?>

    <?php 
//début du bloc main_content
$this->start('main_content'); ?>
        <h1>Entrez votre email pour recevoir le lien pour redéfinir le mot de passe !</h1>
        
        <div id="result"></div>
        
        <form method="post" id="checkform2">

		    <input type="email" name="email" id="email">
		    <button type="submit" id="ask_token">Recevoir le lien</button>
	

	    </form>
      
     
<?php    
$this->stop('main_content'); ?>