<?php $this->layout('layout_back', ['title' => 'Les utilisateurs']) ?>

  <?php $this->start('main_content') ?>

    <table>
      <thead>
        <tr>

          <th>Id</th>
          <th>Activité</th>
          <th>category</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($activity as $activite): ?>
          <tr>
            <td>
              <?=$activite['id'];?>
            </td>
            <td>
              <?=$activite['name'];?>
            </td>
            <td>
              <?=$activite['category'];?>
            </td>
        <!--Détails users via lien-->
			<!--<td>
			<a href="<?= $this->url('details_activite', ['id' => $activite['id']]) ?>">Détails</a>
			</td> -->


            <!--Détails users via modal-->
            <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$activite['id'];?>">Détails</button>
                
                

  

  <!-- Modal -->
  <div class="modal fade" id="myModal<?=$activite['id'];?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Détails Activité :</h4>
        </div>
        <div class="modal-body">
          <ul>
             
             <li><?= $activite['name']?></li>
             <li><?= $activite['category']?></li>
             <li><?= $activite['content']?></li>
             <li><?= $activite['picture']?></li>
              
          </ul>
        </div>
        <div class="modal-footer">
       
            <a href="<?= $this->url('update_users', ['id' => $activite['id']]) ?>">Modifier</a>
        
            <a href="<?= $this->url('del_users', ['id' => $activite['id']]) ?>" >Supprimer</a>
                
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

                
                
                </td>
          </tr>
          <?php endforeach; ?>

      </tbody>
    </table>
 

    <?php $this->stop('main_content') ?>