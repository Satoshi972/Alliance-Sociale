<?php $this->layout('layout', ['title' => 'Se déconnecter']) ?>

    <?php 
//début du bloc main_content
$this->start('main_content'); ?>
        <h1>Entrez vos identifiants !</h1>
        
        <div id="result"></div>
      <?php if(isset($_SESSION['user'])): ?>
		<?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>, voulez vous vous déconnecter ? Vraiment ?

		
        <form id=checkform3 method=post>
            <input type=hidden value="lol">
            <button type=submit id="submitform2">Oui je veux me déconnecter</button>
        
        
       </form>


<?php else: ?>
	<p style="text-align:center;">
		Tu es déjà déconnecté, tu n'existes pas !!

		
	</p>
<?php endif; ?>
      
     
 <?php    
$this->stop('main_content'); ?>