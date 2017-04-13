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
    <form action ="http://127.0.0.1/Alliance-Sociale/public/contactlist" method="post">
    
	<span>Rechercher ce mot-clé</span> 
	<input type="text" id="search" name="search" minlength="1">
	<input type="submit" id="submitsearch" value="Envoyer" >
	
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
	<table>
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
            <tr>
            
                <td><?php if ($contact['staut'] == 0) {echo 'Non lu';} else {echo 'Lu';} ?></td>
                <td><?= $contact['title']?></td>
                <td><?= $contact['mail']?></td>
                <td><?= $contact['date']?></td>
                <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$contact['id'];?>">Voir</button>
                
                

  

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
                <td><a href="#" class="deleteContact" data-id="<?= $contact['id'] ?>">Supprimer</a></td>
            </tr>
            
        </tbody>
        
       
        <?php endforeach; ?>
        
        
        
        <?php } elseif (isset($donnees)){ ?>
        <?php foreach($donnees as $donnee): ?>
        <tbody>
            <tr>
            <?php if ($donnee['staut'] == 0) {$donnee['staut'] = 'Non lu';} else {$donnee['staut'] = 'Lu';} ?>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: orange; font-size:25px">$0</span>', $donnee['staut']); ?></strong></td>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: orange; font-size:25px">$0</span>', $donnee['title']); ?></strong></td>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: orange; font-size:25px">$0</span>', $donnee['mail']); ?></strong></td>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: orange; font-size:25px">$0</span>', $donnee['date']); ?></strong></td>
                <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$donnee['id'];?>">Voir</button>
                
                
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
                <td><a href="#" class="deleteContact" data-id="<?= $donnee['id'] ?>">Supprimer</a></td>
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
    
$this->stop('main_content'); ?>