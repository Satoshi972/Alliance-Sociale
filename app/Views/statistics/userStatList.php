<?php 
$this->layout('layout_back',['title'=>"Statistique adhérent, liste par $activitySelected"]);
$this->start('main_content');
?>
<div class ="container">
  <div class="row">
    <div class="col-md-12 well">
   
      <div class="col-md-12 jumbotron text-center">
        <h2>Liste des utilisateurs dans <?= $activitySelected ?></h2>
      </div>

      <div class="table-responsive col-md-12 text-center">
      <table class="table table-hover text-center">
        <thead>
          <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Nom</th>
            <th class="text-center">Prénom</th>
            <th class="text-center">Actions</th>
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
    			<a href="<?= $this->url('details_users', ['id' => $user['id_usr']]) ?>">Détails</a>
    			</td> -->
                <!--Détails users via modal-->
                <td><button type="button" onClick="showActivity(<?=$user['id_usr'];?>)" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$user['id'];?>">Détails</button>

                 <!-- Modal -->
                <div class="modal fade" id="myModal<?=$user['id'];?>" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content" style="background-color: #27082d;">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Utilisateur en Détails :</h4>
                      </div>
                      <div class="modal-body">
                        <ul>
                          <!-- Les "espaces" sont des caractere invisible mis en place pour une sortie visuelle pour l'utilisateur, ne pas y toucher !!!!! Pour générer le caractere 2 combinaison (depends du systeme) alt 225 OU alt 0160-->
                           <li>Prénom:     <?= $user['firstname']?></li>
                           <li>Nom:          <?= $user['lastname']?></li>
                           <li>Email:         <?= $user['email']?></li>
                           <li>GSM:          <?= $user['phone']?></li>
                           <li>Date Naiss: <?= $user['birthday']?></li>
                           <li>#Caf:           <?= $user['caf']?></li>   
                           <li>Privilèges:   <?= $user['role']?></li>  
                           <br> 
                           <p>Activité :</p>
                                    <li class="activities"></li>
                              
                        </ul>
                      </div>
                      <div class="modal-footer">
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
      </div>  
    <div class="col-md-12 text-center"><a href="<?= $this->url('userStat') ?>" class="btn btn-info">Retour aux stats</a></div>
        

      <section class="row text-center">
        <!--  Pour l'affichage, on centre la liste des pages -->
        <ul class="pagination">
          <?php
             for($i=1; $i<=$nbPages; $i++): //On fait notre boucle  
          ?>
                  <li><a href="<?=$this->url('list_users', ['page'=> $i])?>" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a></li>
          <?php endfor; ?>
        </ul>

      </section>

    </div>
  </div>
</div>


<?php
$this->stop('main_content');
$this->start('script');
?>
<script>

function showActivity(id)
{
  console.log(id)
  var lien = '/Alliance-Sociale/public/users/list/'
  $.getJSON(lien+id, function(data) 
  {
    var res = "";
    $.each(data, function(index, val) 
    {
       res += "<li>";
       res += val.activity;
       res += "</li>";
    });
    $('.activities' ).html(res);
  });
}

</script>
<?php
$this->stop('script');
?>