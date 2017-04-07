<?php $this->layout('layout', ['title' => 'Blog - Les articles']) ?>

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
				<th><?=$user['id'];?></th>
				<th><?=$user['lastname'];?></th>
				<th><?=$user['firstname'];?></th>

                <!--Suppression de l'utilisateur-->
   <th<a href="del_users.php?id=<?=$user['id_user'];?>"></a></th>
            <!--Détails users-->
   <td><a href="<?= $this->url('details_users', ['id' => $user['id']]) ?>">Détails</a></td>

			</tr>
		<?php endforeach; ?>
			
		</tbody>
	</table>

<?php $this->stop('main_content') ?>