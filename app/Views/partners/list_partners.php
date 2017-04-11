<?php $this->layout('layout_back', ['title' => 'Les utilisateurs']) ?>

  <?php $this->start('main_content') ?>
 
    <table>
      <thead>
        <tr>

          <th>Id</th>
          <th>Nom</th>
          <th>Logo</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($partners as $partner): ?>
          <tr>
        <th><?=$partner['id'];?></th>
           
            <th><?=$partner['name'];?></th>
            
            <th> <img src="<?=$this->assetUrl($partner['url']);?>" class="img-responsive" style="max-width: 50%; height: auto;" alt="medias"></th>

            <th><a href="<?= $this->url('update_partners', ['id' => $partner['id']])?>">Modifier</a> |
            <a href="<?= $this->url('del_partners', ['id' => $partner['id']]) ?>">Supprimer</a></th>
          </tr>
          <?php endforeach; ?>

      </tbody>
    </table>
 

    <?php $this->stop('main_content') ?>