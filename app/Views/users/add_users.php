<?php

$this->layout('layout', ['title' => 'Ajouter un utilisateur']);

$this->start('main_content');
?>

  <style>
    label {
      display: inline-block;
      min-width: 200px;
      margin-bottom: 7px;
    }
    
    input,
    select,
    textarea {
      margin-bottom: 7px;
    }
  </style>

<?php if($success == true): // La variable $success est envoyé via le controller?>
		<p style="color:green">L'utilisateur a été créé</p>
	<?php endif; ?>

	<?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
		<p style="color:red"><?=implode('<br>', $errors); ?></p>
	<?php endif; ?>

         
            <form method="post">

              <label for="firstname">Prénom</label>
              <input type="text" name="firstname" id="firstname">

              <br>
              <label for="lastname">Nom</label>
              <input type="text" name="lastname" id="lastname">

              <br>
              <label for="email">Adresse email</label>
              <input type="email" name="email" id="email">

              <br>
              <label for="phone">Téléphone</label>
              <input type="text" name="phone" id="phone">

              <br>
              <label for="password">Mot de passe</label>
              <input type="password" name="password" id="password">

              <br>
              <label for="role">Rôle</label>
              <input type="text" name="role" id="role">


              <br>
              <input type="submit" value="Ajouter l'utilisateur'">

            </form>

<?php $this->stop('main_content'); ?>