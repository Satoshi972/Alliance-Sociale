<?php $this->layout('layout_back', ['title' => 'Les utilisateurs']) ?>

  <?php $this->start('main_content') ?>

  <div class="container">
      <div class="col-md-12">

        <h1>Listes des Partenaires</h1>

        <?php foreach($partners as $partner): ?>
          
 
          <div class="col-xs-3">
            <?=$partner['name'];?>
            
            <img src="<?=$this->assetUrl($partner['url']);?>" class="img-responsive" style="width: 70%; height: 50%;" alt="medias" frameborder="0" scrolling="no"></th>

            <a href="<?= $this->url('update_partners', ['id' => $partner['id']])?>">Modifier</a> |
            <a href="<?= $this->url('del_partners', ['id' => $partner['id']]) ?>">Supprimer</a>

          </div>
          <?php endforeach; ?>
      </div>
  </div>
    <?php $this->stop('main_content') ?>