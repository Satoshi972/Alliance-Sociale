<?php 

$this->layout('layout', ['title' => 'Partenaire supprimé']);

$this->start('main_content');

?>

<input type="bouton" value="Liste des utilisateurs" onclick="document.location.href='/Alliance-Sociale/public/partners/list';">

<?php  $this->stop('main_content');?>
	