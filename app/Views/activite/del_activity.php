
<?php 
$this->layout('layout_back', ['title' => 'Activité supprimée']);
$this->start('main_content');
?>

<input type="bouton" value="Liste des utilisateurs" onclick="document.location.href='/Alliance-Sociale/public/activite/list';">

<?php  $this->stop('main_content');?>