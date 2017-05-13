<?php $this->layout('layout_back', ['title' => 'Listes des messages']) ?>
<?php $this->start('head') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/sweetalert.css') ?>">
<?php $this->stop('head') ?>
<?php 
//début du bloc main_content
$this->start('main_content'); ?>


<div class ="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-12 well">

      <div class="col-md-12 jumbotron text-center">
          <h2>Listes des messages de contact</h2>
      </div>
               
        <div id="mon_resultat"><!-- contiendra le résultat ajax --></div>
        <?php if(isset($errors)){
			echo '<p style="color:red">'.$errors.'</p>';
		    };
        ?>

        <?php if(isset($chainesearch)){
            echo 'Vous avez recherché : '.$chainesearch.' .';
        };
        ?>

     
        <form action ="http://127.0.0.1/Alliance-Sociale/public/contactlist/1" method="get" class="form-inline">
            <div class="form-group">
                <label for="search">Rechercher :</label>
                <input type="text" id="search" name="search" minlength="1" class="form-control" placeholder="Mot clé">
            </div>
            <div class="form-group">
                <input type="submit" id="submitsearch" value="Rechercher" class="btn btn-default">
            </div>
        </form>
    
        <div class="row">
          <div class="col-md-12">
            <p class="text-center">Trier par :          
                <a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/1?column=view&order=desc">Lecture (croissant)</a> |
                <a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/1?column=view&order=asc">Lecture (décroissant)</a> |
                <a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/1?column=titre&order=asc">Titre (croissant)</a> |
                <a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/1?column=titre&order=desc">Titre (décroissant)</a> |
                <a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/1?column=email&order=asc">Email (croissant)</a> |
                <a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/1?column=email&order=desc">Email (décroissant)</a> |
                <a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/1?column=date&order=asc">Date (croissant)</a> |
                <a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/1?column=date&order=desc">Date (décroissant)</a>
            </p>
          </div>
        </div>
		<div id="result"></div>

        
        <div class="table-responsive col-md-12 text-center">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Vue</th>
                    <th>Titre</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Lire le message</th>
                   <!-- <th>Supprimer le message</th>-->
                </tr>
            </thead>
            <?php if(isset($contacts)){ ?>
            <?php foreach($contacts as $contact): ?>
            <tbody>
                <tr <?php if ($contact['statut'] == 0) {echo 'class="danger"';} else {echo  'class="success"';} ?>>
            
                    <td><?php if ($contact['statut'] == 0) {echo 'Non lu';} else {echo 'Lu';} ?></td>
                    <td><?= $contact['title']?></td>
                    <td><?= $contact['mail']?></td>
                    <td><?= $contact['date']?></td>
                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?=$contact['id'];?>">Détails</button>
                
                         <!-- Modal -->
                          <div class="modal fade" id="myModal<?=$contact['id'];?>" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Message en Détails :</h4>
                                </div>
                                <div class="modal-body">
                                  <ul>
                                     <li>Vue : <?php if ($contact['statut'] == 0) {echo 'Non lu';} else {echo 'Lu';} ?></li>
                                     <li>Id du message : <?= $contact['id']?></li>
                                     <li>Titre du message : <?= $contact['title']?></li>
                                     <li>Contenu : <?= $contact['content']?></li>
                                     <li>Email : <?= $contact['mail']?></li>
                                     <li>Date de publication : <?= $contact['date']?></li>

                                  </ul>
                                </div>
                                <div class="modal-footer">

                                <?php if ($contact['statut'] == 0) { ?>
                                <form action="<?= $this->url("updateCheck") ?>" id=checkform4 method=post>
                                    <input type=hidden name="hidden" value="<?= $contact['id']?>">
                                    <button type=submit class="btn btn-default" id="submitform3">Marquer comme Lu</button>


                                </form>
                                <?php } ?>
                                 <a href="<?= $this->url('ajaxDeleteContact', ['id' => $contact['id']]) ?>" class='delete btn btn-danger' data-id="<?= $contact['id'] ?>" >Supprimer</a>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>

                            </div>
                          </div>
               
                    </td>
                   <!-- <td>
                        <form action="<?= $this->url('ajaxDeleteContact') ?>" id=checkform5 method=post>
                        <input type=hidden name="hidden" value="<?= $contact['id']?>">
                        <button type=submit class="btn btn-default" id="submitform4">Supprimer</button>
                        </form>
                         <a href="<?= $this->url('ajaxDeleteContact', ['id' => $contact['id']]) ?>" class='delete btn btn-danger' data-id="<?= $contact['id'] ?>" >Supprimer</a>
                    </td> -->
                 </tr>
            
        </tbody>
        
       
        <?php endforeach; ?>
        
        
        
        <?php } elseif (isset($donnees)){ ?>
        <?php foreach($donnees as $donnee): ?>
        <tbody>
            <tr <?php if ($donnee['statut'] == 0) {echo 'class="danger"';} else {echo  'class="success"';} ?>>
            <?php if ($donnee['statut'] == 0) {$donnee['statut'] = 'Non lu';} else {$donnee['statut'] = 'Lu';} ?>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: blue; font-size:25px">$0</span>', $donnee['statut']); ?></strong></td>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: blue; font-size:25px">$0</span>', $donnee['title']); ?></strong></td>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: blue; font-size:25px">$0</span>', $donnee['mail']); ?></strong></td>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: blue; font-size:25px">$0</span>', $donnee['date']); ?></strong></td>
                <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?=$donnee['id'];?>">Détails</button>
                
                
                  <!-- Modal -->
                  <div class="modal fade" id="myModal<?=$donnee['id'];?>" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Message en Détails :</h4>
                        </div>
                        <div class="modal-body">
                          <ul>
                             <li>Vue : <?= $donnee['statut']?></li>
                             <li>Id du message : <?= $donnee['id']?></li>
                             <li>Titre du message : <?= $donnee['title']?></li>
                             <li>Contenu : <?= $donnee['content']?></li>
                             <li>Email : <?= $donnee['mail']?></li>
                             <li>Date de publication : <?= $donnee['date']?></li>

                          </ul>
                        </div>
                        <div class="modal-footer">

                         <?php if ($donnee['statut'] == "Non lu") { ?>
                        <form action="<?= $this->url("updateCheck") ?>" id=checkform4 method=post>
                            <input type=hidden name="hidden" value="<?= $donnee['id']?>">
                            <button type=submit class="btn btn-default" id="submitform3">Marquer comme Lu</button>


                        </form>
                        <?php } ?>
                         
                         <a href="<?= $this->url('ajaxDeleteContact', ['id' => $donnee['id']]) ?>" class='delete btn btn-danger' data-id="<?= $donnee['id'] ?>" >Supprimer</a>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                  </div>
         
                
                </td>
                <!--<td>
                    <form action="<?= $this->url('ajaxDeleteContact') ?>" id=checkform5 method=post>
                    <input type=hidden name="hidden" value="<?= $donnee['id']?>">
                    <button type=submit class="btn btn-default" id="submitform4">Supprimer</button>
                    </form>
                     <a href="<?= $this->url('ajaxDeleteContact', ['id' => $donnee['id']]) ?>" class='delete btn btn-danger' data-id="<?= $donnee['id'] ?>" >Supprimer</a>
                </td> -->
            </tr>
            
            
        </tbody>
        <?php endforeach; ?>
        
        
        

                <?php } else { ?>
          		<tbody id="contactsAjax">
          			<?php if(empty($contacts)): ?>
          			<tr>
          				<td class="danger text-danger text-center" colspan="5">Aucun messages de contact détecté ...</td>
          			</tr>
          		<?php endif; ?>
          		</tbody>
        		
        		<?php } ?>
        	 </table>
          </div> 


  


  <section class="row text-center">
    <!--  Pour l'affichage, on centre la liste des pages -->
    <ul class="pagination">
      <?php
         for($i=1; $i<=$nbPages; $i++): //On fait notre boucle  
      ?>
             <?php if (isset($_GET['column']) AND $_GET['column'] == "view" AND isset($_GET['order']) AND $_GET['order']== "asc"){ ?>
    
                <li><a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/<?= $i ?>?column=view&order=asc" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a></li>
        
            <?php } elseif (isset($_GET['column']) AND $_GET['column'] == "view" AND isset($_GET['order']) AND $_GET['order']== "desc") { ?>
    
                <li><a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/<?= $i ?>?column=view&order=desc" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a></li>
        
            <?php } elseif (isset($_GET['column']) AND $_GET['column'] == "titre" AND isset($_GET['order']) AND $_GET['order']== "asc"){ ?>

                 <li><a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/<?= $i ?>?column=titre&order=asc" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a></li>
        
            <?php } elseif (isset($_GET['column']) AND $_GET['column'] == "titre" AND isset($_GET['order']) AND $_GET['order']== "desc"){ ?>
    
                <li><a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/<?= $i ?>?column=titre&order=desc" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a></li>
        
            <?php } elseif (isset($_GET['column']) AND $_GET['column'] == "email" AND isset($_GET['order']) AND $_GET['order']== "asc"){ ?>
    
                 <li><a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/<?= $i ?>?column=email&order=asc" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a></li>
        
            <?php } elseif (isset($_GET['column']) AND $_GET['column'] == "email" AND isset($_GET['order']) AND $_GET['order']== "desc"){ ?>
    
                <li><a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/<?= $i ?>?column=email&order=desc" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a></li>
        
            <?php } elseif (isset($_GET['column']) AND $_GET['column'] == "date" AND isset($_GET['order']) AND $_GET['order']== "asc"){ ?>
    
                 <li><a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/<?= $i ?>?column=date&order=asc" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a></li>
        
            <?php } elseif (isset($_GET['column']) AND $_GET['column'] == "date" AND isset($_GET['order']) AND $_GET['order']== "desc"){ ?>

                 <li><a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/<?= $i ?>?column=date&order=desc" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a></li>
        
            <?php } elseif (isset($_GET["search"])){ ?>
                 
                 <li><a href="http://127.0.0.1/Alliance-Sociale/public/contactlist/<?= $i ?>?search=<?=$chainesearch?>" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a></li>
                 
            <?php } else { ?>
             
                 <li><a href="<?=$this->url('contactList', ['page'=> $i])?>" class="<?php if($i == $page){echo "current";}?>"><?=$i ?></a></li>
              
            <?php } ?>
      <?php endfor; ?>
    </ul>
  </section>
        </div>
      </div>
   </div>
</div>

 <?php  

    
$this->stop('main_content');


$this->start('script');

?>

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
                      success: function()
                      {
                              myTr.remove();
                              location.reload();
                              // $('#result').html(res);
                      }
                  });
          });
      });
            
            
            
            // Suppression utilisateur avec DOM modifié à la volé
	$('body').on('click', 'a.deleteContact', function(element){
		element.preventDefault(); // Bloque l'action par défaut de l'élement

		$.ajax({
			method: 'post',
			url: '<?= $this->url('ajaxDeleteContact') ?>',
			data: {id_user: $(this).data('id')}, 
			success: function(resultat){
				$('#mon_resultat').html(resultat); 
                
					
			 }
		});
	}); 
            
            $('#submitForm').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("ajax_login") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
                    }
                });
            });
            
            $('#ask_token').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform2'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("ajax_ask_token") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
                    }
                });
            });
        
             $('#submitform2').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform3'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("ajax_logout") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
                    }
                });
            });
            
            /*$('#submitform3').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform4'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("updateCheck") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
                    }
                });
            }); */
            
            $('#new_mdp').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform4'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("ajax_resetpsw") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
                    }
                });
            });
            
            
            
        });
</script> 


<?php
    $this->stop('script');
?>