<?php



$this->layout('layout_back', ['title' => 'Détail de l\'utilisateur']);

$this->start('main_content');

?>

  <?php if(!empty($affiche)):?>
    
    <p>
      <?=$affiche['firstname']; ?>
    </p>

    <p>
      <?=$affiche['lastname']; ?>
    </p>

    <p>
      <?=$affiche['email']; ?>
    </p>

    <p>
      <?=$affiche['phone']; ?>
    </p>

    <p>
      <?=$affiche['role']; ?>
    </p>


    <?php endif ?>

    <a href="update/<?=$affiche['id']; ?>">Modifier</a>

    <a href="delete/<?=$affiche['id']; ?>">Supprimer</a>

    
  <?php  $this->stop('main_content');?>