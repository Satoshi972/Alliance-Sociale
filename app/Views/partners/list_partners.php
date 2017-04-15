<?php $this->layout('layout_back', ['title' => 'Listes des Partenaires']) ?>

  <?php $this->start('main_content') ?>

  <div class="container">
    <div class="col-md-12">

      <div class="col-md-12 jumbotron text-center">
        <h1>Listes des Partenaires</h1>
      </div>
        <?php foreach($partners as $partner): ?>
          
 
          <div class="col-xs-3">
          <h4><?=$partner['name'];?></h4>
            
            <div class="col-md-12">
            
            <img src="<?=$this->assetUrl($partner['url']);?>" class="img-responsive" style="width: 70%; height: 50%;" alt="medias" frameborder="0" scrolling="no"></th>

            <button type="button" class="btn btn-default btn-sm""><a href="<?= $this->url('update_partners', ['id' => $partner['id']])?>">Modifier</a></button>
             |

            <button type="button" class="btn btn-default btn-sm""><a href="<?= $this->url('del_partners', ['id' => $partner['id']]) ?>">Supprimer</a></button>
            </div>

          </div>
          <?php endforeach; ?>
      </div>
  </div>
    <?php $this->stop('main_content') ?>