<?php
$this->layout('layout_front', ['title' => 'Détail de l\'activité']);
$this->start('main_content');
?>

    <div class="list-group-item text-center">
      <h4 class="list-group-item-heading">Affiche</h4>
      <p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $infos['picture'];  ?>" alt="logo"></p>
    </div>

    <div class="list-group-item text-center">
      <h4 class="list-group-item-heading">Intitulé</h4>
      <p class="list-group-item-text"><?=$infos['name'];?></p>
    </div>

    <div class="list-group-item text-center">
      <h4 class="list-group-item-heading">Description</h4>
      <p class="list-group-item-text"><?=$infos['content'];?></p>
    </div>


    
  <?php  $this->stop('main_content');?>