<?php $this->layout('layout_back', ['title' => 'Les utilisateurs']) ?>
<?php $this->start('head') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/sweetalert.css') ?>">
<?php $this->stop('head') ?>
<?php $this->start('main_content') ?>
 
<div class ="container">
  <div class="row">
    <div class="col-md-12 well">
      <div class="col-md-12 jumbotron text-center">
        <h2>Liste des utilisateurs</h2>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <form method="POST" class="form-horizontal text-center col-xs-4">
              <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher">
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <p class="text-center">Afficher : 
            <a href="<?= $this->url('list_users', ['page'=> $page,'age1' => 0, 'age2'=> 150]) ?>">Tous</a>
             |  <a href="<?= $this->url('list_users', ['page'=> $page,'age1' => 0, 'age2'=> 2]) ?>">-3 ans</a>
             |  <a href="<?= $this->url('list_users', ['page'=> $page,'age1' => 3, 'age2'=> 8]) ?>">3 - 8 ans</a>
             |  <a href="<?= $this->url('list_users', ['page'=> $page,'age1' => 9, 'age2'=> 15]) ?>">9 - 15 ans</a>
             |  <a href="<?= $this->url('list_users', ['page'=> $page,'age1' => 16, 'age2'=> 18]) ?>">16 - 18 ans</a>
             |  <a href="<?= $this->url('list_users', ['page'=> $page,'age1' => 19, 'age2'=> 25]) ?>">19 - 25 ans</a>
             |  <a href="<?= $this->url('list_users', ['page'=> $page,'age1' => 26, 'age2'=> 35]) ?>">26 - 35 ans</a>
             |  <a href="<?= $this->url('list_users', ['page'=> $page,'age1' => 36, 'age2'=> 45]) ?>">36 - 45 ans</a>
             |  <a href="<?= $this->url('list_users', ['page'=> $page,'age1' => 46, 'age2'=> 150]) ?>">+45 ans</a>
          </p>
        </div>
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
      			<a href="<?= $this->url('details_users', ['id' => $user['id']]) ?>">Détails</a>
      			</td> -->
                  <!--Détails users via modal-->
                  <td><button type="button" onClick="showActivity(<?=$user['id'];?>)" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$user['id'];?>">Détails</button>

                   <!-- Modal -->
                  <div class="modal fade" id="myModal<?=$user['id'];?>" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content" style="background-color: #27082d;">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Users en Détails :</h4>
                        </div>
                        <div class="modal-body">
                          <ul>
                            <!-- Les "espaces" sont des caractere invisible mis en place pour une sortie visuelle pour l'utilisateur, ne pas y toucher !!!!! Pour générer le caractere 2 combinaison (depends du systeme) alt 225 OU alt 0160-->
                             <li>Prénom: <?= $user['firstname']?></li>
                             <li>Nom: <?= $user['lastname']?></li>
                             <li>Email: <?= $user['email']?></li>
                             <li>GSM: <?= $user['phone']?></li>
                             <li>Date Naiss: <?= $user['birthday']?></li>
                             <li>#Caf: <?= $user['caf']?></li>   
                             <li>Privilèges: <?= $user['role']?></li>
                             <br> 
                             <p>Activité :</p>  
                                  <li class="activities"></li>
                                
                          </ul>
                        </div>
                        <div class="modal-footer">
                        <?php if($w_user['role'] === 'admin'): ?>
                          <a href="<?= $this->url('update_users', ['id' => $user['id']]) ?>" class="btn btn-info">Modifier</a>

                          <!-- <button onclick="delete" id='delete' data-uri="<?= $this->url('del_users', ['id' => $user['id']]) ?>" >Supprimer</button> -->

                          <a href="<?= $this->url('del_users', ['id' => $user['id']]) ?>" class='delete btn btn-danger' data-id="<?= $user['id'] ?>" >Supprimer</a>

                          <?php endif; ?>
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
      <section class="row text-center">
        <!--  Pour l'affichage, on centre la liste des pages -->
        <ul class="pagination">
          <?php
             for($i=1; $i<=$nbPages; $i++): //On fait notre boucle  
          ?>
                  <li><a href="<?=$this->url('list_users', ['page'=> $i,'age1' => $age1, 'age2'=> $age2])?>" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a></li>
          <?php endfor; ?>
        </ul>
      </section>
    </div>
  </div>
</div>


<?php $this->stop('main_content') ?>

<?php $this->start('script') ?>
<script src="<?= $this->assetUrl('js/sweetalert.min.js')?>"></script>

<script>

function showActivity(id)
{
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
$(function(){
  $('.delete').on('click', function(e)
  {
    e.preventDefault();
    var $this = $(this);
    var id = $(this).data('id');
    var myTr = $(this).parent().parent();
    //var url = '/Alliance-Sociale/public/users/delete/'+id;

    swal({
          title: 'Attention',
          text: 'Vous allez supprimer cette utilisateur',
          type: 'warning',
          showCancelButton: true,
          closeOnConfirm: false,
          disableButtonsOnConfirm: true,
          confirmLoadingButtonColor: '#DD6B55'
        }, function(){
            swal('Suppression effectuée');

                $.ajax({
                    type: 'POST',
                    url: $this.attr('href'),
                    data: {id : id},
                    success: function()
                    {
                            myTr.remove();
                            location.reload();
                            // $('#result').html(res);
                    }
                });
        });
    });
});
</script>

<?php $this->stop('script') ?>
