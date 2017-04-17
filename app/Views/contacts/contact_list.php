<?php $this->layout('layout_back', ['title' => 'Se connecter']) ?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
        <h1>Liste des messages de contact</h1>
        
        <div id="mon_resultat"><!-- contiendra le résultat ajax --></div>
        <?php if(isset($errors)){
			echo '<p style="color:red">'.$errors.'</p>';
		};
    ?>
        <?php if(isset($chainesearch)){
            echo 'Vous avez recherché : '.$chainesearch.' .';
        };
?>

    <br>
    <form action ="http://127.0.0.1/Alliance-Sociale/public/contactlist" method="post" class="form-inline">
        <div class="form-group">
            <label for="search">Rechercher :</label>
           
            <input type="text" id="search" name="search" minlength="1" class="form-control" placeholder="Mot clé">
        </div>
        <div class="form-group">
            <input type="submit" id="submitsearch" value="Envoyer" class="btn btn-default">
        </div>
    </form>
    
    <p>Trier par : 
        
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=view&order=desc">Lecture (croissant)</a> |
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=view&order=asc">Lecture (décroissant)</a> |
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=titre&order=asc">Titre (croissant)</a> |
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=titre&order=desc">Titre (décroissant)</a> |
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=email&order=asc">Email (croissant)</a> |
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=email&order=desc">Email (décroissant)</a> |
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=date&order=asc">Date (croissant)</a> |
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=date&order=desc">Date (décroissant)</a>
		<div id="result"></div>
	<table class="table table-hover">
		<thead>
			<tr>
                <th>Vue</th>
                <th>Titre</th>
                <th>Email</th>
                <th>Date</th>
                <th>Lire le message</th>
                <th>Supprimer le message</th>
			</tr>
		</thead>
        <?php if(isset($contacts)){ ?>
        <?php foreach($contacts as $contact): ?>
        <tbody>
            <tr <?php if ($contact['staut'] == 0) {echo 'class="danger"';} else {echo  'class="success"';} ?>>
            
                <td><?php if ($contact['staut'] == 0) {echo 'Non lu';} else {echo 'Lu';} ?></td>
                <td><?= $contact['title']?></td>
                <td><?= $contact['mail']?></td>
                <td><?= $contact['date']?></td>
                <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?=$contact['id'];?>">Voir</button>
                
                

  

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
             <li>Vue : <?php if ($contact['staut'] == 0) {echo 'Non lu';} else {echo 'Lu';} ?></li>
             <li>Id du message : <?= $contact['id']?></li>
             <li>Titre du message : <?= $contact['title']?></li>
             <li>Contenu : <?= $contact['content']?></li>
             <li>Email : <?= $contact['mail']?></li>
             <li>Date de publication : <?= $contact['date']?></li>
              
          </ul>
        </div>
        <div class="modal-footer">
        
        <?php if ($contact['staut'] == 0) { ?>
        <form action="<?= $this->url("updateCheck") ?>" id=checkform4 method=post>
            <input type=hidden name="hidden" value="<?= $contact['id']?>">
            <button type=submit class="btn btn-default" id="submitform3">Marquer comme Lu</button>
        
        
        </form>
        <?php } ?>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

                
                
                </td>
                <td>
                <form action="<?= $this->url('ajaxDeleteContact') ?>" id=checkform5 method=post>
                <input type=hidden name="hidden" value="<?= $contact['id']?>">
                <button type=submit class="btn btn-default" id="submitform4">Supprimer</button>
                </form>
                </td>
            </tr>
            
        </tbody>
        
       
        <?php endforeach; ?>
        
        
        
        <?php } elseif (isset($donnees)){ ?>
        <?php foreach($donnees as $donnee): ?>
        <tbody>
            <tr <?php if ($donnee['staut'] == 0) {echo 'class="danger"';} else {echo  'class="success"';} ?>>
            <?php if ($donnee['staut'] == 0) {$donnee['staut'] = 'Non lu';} else {$donnee['staut'] = 'Lu';} ?>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: blue; font-size:25px">$0</span>', $donnee['staut']); ?></strong></td>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: blue; font-size:25px">$0</span>', $donnee['title']); ?></strong></td>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: blue; font-size:25px">$0</span>', $donnee['mail']); ?></strong></td>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: blue; font-size:25px">$0</span>', $donnee['date']); ?></strong></td>
                <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?=$donnee['id'];?>">Voir</button>
                
                
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
             <li>Vue : <?= $donnee['staut']?></li>
             <li>Id du message : <?= $donnee['id']?></li>
             <li>Titre du message : <?= $donnee['title']?></li>
             <li>Contenu : <?= $donnee['content']?></li>
             <li>Email : <?= $donnee['mail']?></li>
             <li>Date de publication : <?= $donnee['date']?></li>
              
          </ul>
        </div>
        <div class="modal-footer">
         
         <?php if ($donnee['staut'] == "Non lu") { ?>
        <form action="<?= $this->url("updateCheck") ?>" id=checkform4 method=post>
            <input type=hidden name="hidden" value="<?= $donnee['id']?>">
            <button type=submit class="btn btn-default" id="submitform3">Marquer comme Lu</button>
        
        
        </form>
        <?php } ?>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
                
                
                
                
                
                
                
                </td>
                <td>
                <form action="<?= $this->url('ajaxDeleteContact') ?>" id=checkform5 method=post>
                <input type=hidden name="hidden" value="<?= $donnee['id']?>">
                <button type=submit class="btn btn-default" id="submitform4">Supprimer</button>
                </form>
                </td>
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
   


     
 <?php  
    
$this->stop('main_content');


$this->start('script');

?>


<script>
        $(function(){
            
         
            
            
            
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