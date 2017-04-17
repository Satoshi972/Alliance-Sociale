<?php

$this->layout('layout_back', ['title' => 'Modifier un utilisateur']);

$this->start('main_content');
?>


<div class ="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-6 col-md-offset-2 text-center well">
          <div class="col-md-12 jumbotron">
         <h2>Modification de l'utilisateur</h2>
          </div>
           <?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
                <p class="alert alert-danger alert-dismissable"><?=implode('<br>', $errors); ?></p>
              <?php endif; ?>

              <?php if($success == true): // La variable $success est envoyé via le controller?>
                <p class="alert alert-success alert-dismissable" ">Votre utilisateur à été Modifier</p>
              <?php endif; ?>

          <?php if($displayForm === true): ?>
        
          <form method="post" class="form-horizontal">

            <div class="form-group">
              <label class="col-md-2 control-label text-center" for="firstname">Prénom</label>
              <div class="col-md-10 text-center">
                <input type="text" class="form-control" name="firstname" id="firstname" value="<?=$affiche['firstname']; ?>">
              </div>
            </div>
                     
            <div class="form-group">            
              <label class="col-md-2 control-label" for="lastname">Nom</label>
              <div class="col-md-10 text-center">
                <input type="text" class="form-control" name="lastname" id="lastname" value="<?=$affiche['lastname']; ?>">
              </div>
            </div>

            <div class="form-group"> 
              <label class="col-md-2 control-label" for="email">Adresse email</label>
              <div class="col-md-10 text-center">
                <input type="email" class="form-control" name="email" id="email" value="<?=$affiche['email']; ?>">
              </div>
            </div>
       
            <div class="form-group">             
              <label class="col-md-2 control-label" for="phone">Téléphone</label>
              <div class="col-md-10 text-center">
                <input type="phone" class="form-control" name="phone" id="phone" value="<?=$affiche['phone']; ?>">
              </div>
            </div>

            <div class="form-group"> 
              <label class="col-md-2 control-label" for="password">Mot de passe</label>
              <div class="col-md-10 text-center">
                <input type="password" class="form-control" name="password" id="password" value="<?=$affiche['phone']; ?>">
              </div>
            </div>

            <div class="form-group">             
              <label class="col-md-2 control-label" for="role">Rôle</label>
              <div class="col-md-8 text-center">
                <select name="role" id="role" class="form-control text-center">
                  <option value="0">Choisissez le role</option>
                  <option value="member">membre</option>
                  <option value="editor">editeur</option>
                  <option value="admin">administrateur</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                  <button type="submit" id="submitForm" class="btn btn-primary">Modifier l'utilisateur</button>
              </div>
            </div>
          </form>
          <?php endif; ?>

      </div>
    </div>
  </div>
</div>
<?php $this->stop('main_content'); ?>