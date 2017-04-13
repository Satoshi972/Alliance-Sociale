<?php $this->layout('layout_back', ['title' => 'Les utilisateurs']) ?>

  <?php $this->start('main_content') ?>

    <table>
      <thead>
        <tr>

          <th>Id</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($users as $user): ?>
          <tr>
            <td>
              <?=$user['id'];?>
            </td>
            <td>
              <?=$user['lastname'];?>
            </td>
            <td>
              <?=$user['firstname'];?>
            </td>
        <!--Détails users via lien-->
			<!--<td>
			<a href="<?= $this->url('details_users', ['id' => $user['id']]) ?>">Détails</a>
			</td> -->


            <!--Détails users via modal-->
            <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$user['id'];?>">Détails</button>
                
                

  

  <!-- Modal -->
  <div class="modal fade" id="myModal<?=$user['id'];?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Users en Détails :</h4>
        </div>
        <div class="modal-body">
          <ul>
             
             <li><?= $user['firstname']?></li>
             <li><?= $user['lastname']?></li>
             <li><?= $user['email']?></li>
             <li><?= $user['phone']?></li>
             <li><?= $user['role']?></li>
              
          </ul>
        </div>
        <div class="modal-footer">
        
       
            <a href="<?= $this->url('update_users', ['id' => $user['id']]) ?>">Modifier</a>
        
        
       

            <a href="<?= $this->url('del_users', ['id' => $user['id']]) ?>" >Supprimer</a>
        
        
      
         
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