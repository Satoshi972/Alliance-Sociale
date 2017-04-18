<?php $this->layout('layout_back', ['title' => 'Les utilisateurs']) ?>
<?php $this->start('head') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/sweetalert.css') ?>">
<?php $this->stop('head') ?>
  <?php $this->start('main_content') ?>
 
<div class ="container">
  <div class="row">
    <div class="col-md-12">
   
      <div class="col-md-12 jumbotron text-center">
        <h2>Création utilisateur</h2>
      </div>

      <table class=" table table-striped">
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
                   
                        <a href="<?= $this->url('update_users', ['id' => $user['id']]) ?>" class="btn btn-info">Modifier</a>

                        <!-- <button onclick="delete" id='delete' data-uri="<?= $this->url('del_users', ['id' => $user['id']]) ?>" >Supprimer</button> -->

                        <a href="<?= $this->url('del_users', ['id' => $user['id']]) ?>" class='delete btn btn-danger' data-id="<?= $user['id'] ?>" >Supprimer</a>


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
  </div>
</div>


    <?php $this->stop('main_content') ?>

    <?php $this->start('script') ?>
 <script src="<?= $this->assetUrl('js/sweetalert.min.js')?>"></script>

 <script>

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
                      success: function(s)
                      {
                          if(s)
                          {
                              myTr.remove();
                              location.reload();
                              // $('#result').html(res);
                          }
                      }
                  });
          });
      });

  });
 </script>

    <?php $this->stop('script') ?>
