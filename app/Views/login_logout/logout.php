<?php $this->layout('layout', ['title' => 'Se déconnecter']) ?>

    <?php 
//début du bloc main_content
$this->start('main_content'); ?>
        <h1>Entrez vos identifiants !</h1>
        
      <?php if(isset($_SESSION['is_logged'])): ?>
	<p style="text-align:center;">
		<?php echo $_SESSION['name']; ?>, voulez vous te déconnecter ? Vraiment ?

		<br><br>

	
		<br><br>

		<a href="<?= $this->url('logout', ['logout' =>'yes']) ?>logout=yes">Oui, je veux me déconnecter</a>
	</p>

<?php else: ?>
	<p style="text-align:center;">
		Tu es déjà déconnecté, tu n'existes pas !!

		
	</p>
<?php endif; 
      
     
 <?php    
$this->stop('main_content'); ?>