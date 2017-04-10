<?php $this->layout('layout', ['title' => 'Réinitialisation du mot de passe']) ?>

    <?php 
//début du bloc main_content
$this->start('main_content'); ?>
        <h1>Entrez votre nouveau mot de passe</h1>
        
        <div id="result"></div>
        
       <?php  if (!empty($checktoken["firstname"])){ ?>
        
        <?php echo "Bonjour ".$checktoken["firstname"].' '.$checktoken["lastname"].'. Vous êtes sur le point de réinitialiser le mot de passe!!!'; ?>
        
        <form method="post" id="checkform4">

		    <input type="password" name="password" id="password">
		    <input type="hidden" name="token" value="<?= $_GET["token"] ?>">
		    <button type="submit" id="new_mdp">Changer le mot de passe</button>
	

	    </form>
      
      <?php } else {
    
       echo "Déolé il vous faut un lien mail valide pour réinitialiser votre mot de passe";
    
}
       
<?php    
$this->stop('main_content'); ?>