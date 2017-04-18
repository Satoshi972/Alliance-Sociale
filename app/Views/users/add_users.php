<?php

$this->layout('layout_back', ['title' => 'Ajouter un utilisateur']);

$this->start('main_content');
?>

<div class ="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-6 col-md-offset-2 text-center well">
          <div class="col-md-12 jumbotron">
            <h2>Création utilisateur</h2>
          </div>
           <?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
                <p class="alert alert-danger alert-dismissable"><?=implode('<br>', $errors); ?></p>
              <?php endif; ?>

              <?php if($success == true): // La variable $success est envoyé via le controller?>
                <p class="alert alert-success alert-dismissable" ">Votre utilisateur à été créer</p>
              <?php endif; ?>

          <?php if($displayForm === true): ?>
          <form method="post" class="form-horizontal">

            <div class="form-group">
              <label class="col-md-2 control-label text-center" for="firstname">Prénom</label>
              <div class="col-md-10 text-center">
                <input type="text" class="form-control" name="firstname" id="firstname">
              </div>
            </div>
                     
            <div class="form-group">            
              <label class="col-md-2 control-label" for="lastname">Nom</label>
              <div class="col-md-10 text-center">
                <input type="text" class="form-control" name="lastname" id="lastname">
              </div>
            </div>

            <div class="form-group"> 
              <label class="col-md-2 control-label" for="email">Adresse email</label>
              <div class="col-md-10 text-center">
                <input type="email" class="form-control" name="email" id="email">
              </div>
            </div>
       
            <div class="form-group">             
              <label class="col-md-2 control-label" for="phone">Téléphone</label>
              <div class="col-md-10 text-center">
                <input type="phone" class="form-control" name="phone" id="phone">
              </div>
            </div>

            <div class="form-group"> 
              <label class="col-md-2 control-label" for="password">Mot de passe</label>
              <div class="col-md-10 text-center">
                <input type="password" class="form-control" name="password" id="password">
              </div>
            </div>

            <div class="form-group">             
              <label class="col-md-2 control-label" for="role">Rôle</label>
              <div class="col-md-10 text-center">
                <select name="role" id="role" class="form-control text-center">
                  <option value="0">Choisissez le role</option>
                  <?php foreach ($roles as $key => $value):?>
                    <option value="<?=$value['name']?>"><?=$value['name']?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                  <button type="submit" id="submitForm" class="btn btn-primary">Créer utilisateur</button>
              </div>
            </div>
          </form>
          <?php endif; ?>

      </div>
    </div>
  </div>
</div>

<?php $this->stop('main_content'); ?>