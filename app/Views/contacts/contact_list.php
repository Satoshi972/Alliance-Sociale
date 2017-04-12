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
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=titre&order=asc">Titre (croissant)</a> |
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=titre&order=desc">Titre (décroissant)</a> |
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=email&order=asc">Email (croissant)</a> |
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=email&order=desc">Email (décroissant)</a> |
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=date&order=asc">Date (croissant)</a> |
		<a href="http://127.0.0.1/Alliance-Sociale/public/contactlist?column=date&order=desc">Date (décroissant)</a>
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
            
                <td><?= $contact['staut']?></td>
                <td><?= $contact['title']?></td>
                <td><?= $contact['mail']?></td>
                <td><?= $contact['date']?></td>
                <td><button id="myBtn">Voir</button></td>
                <td><a href="#" class="deleteContact" data-id="<?= $contact['id'] ?>">Supprimer</a></td>
            </tr>
            
        </tbody>
        <?php endforeach; ?>
        
        
        
        <?php } elseif (isset($donnees)){ ?>
        <?php foreach($donnees as $donnee): ?>
        <tbody>
            <tr>
            
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: orange; font-size:25px">$0</span>', $donnee['staut']); ?></strong></td>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: orange; font-size:25px">$0</span>', $donnee['title']); ?></strong></td>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: orange; font-size:25px">$0</span>', $donnee['mail']); ?></strong></td>
                <td><strong><?= preg_replace('`'.$chainesearch.'`isU','<span style="font-weight: bold; color: orange; font-size:25px">$0</span>', $donnee['date']); ?></strong></td>
                <td><button id="myBtn">Voir</button></td>
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
   
<!-- The Modal -->
<div id="myModal" name="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>

	
    
     
 <?php  
    
$this->stop('main_content'); ?>