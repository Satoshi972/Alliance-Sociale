<?php

$this->layout('layout_back', ['title' => 'Ajouter un utilisateur']);

$this->start('main_content');
?>

  <!--<style>
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
</style>-->

  <?php if($success == true): // La variable $success est envoyé via le controller?>
    <p style="color:green">L'utilisateur a été créé</p>
    <?php endif; ?>

      <?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
        <p style="color:red">
          <?=implode('<br>', $errors); ?>
        </p>
        <?php endif; ?>


          <form method="post" class="form-horizontal">
            <div class="form-group">
              <label class="col-md-4 control-label" for="firstname">Prénom</label>
              <input type="text" class="form-control" name="firstname" id="firstname">
            </div>
          </div>

            <br>
            <div class="form-group">            
            <label class="col-md-4 control-label" for="lastname">Nom</label>
            <input type="text" class="form-control" name="lastname" id="lastname">
            </div>
          </div>

            <br>
            <div class="form-group"> 
            <label class="col-md-4 control-label" for="email">Adresse email</label>
            <input type="email" class="form-control" name="email" id="email">
            </div>
          </div>

            <br>
            <div class="form-group">             
            <label class="col-md-4 control-label" for="phone">Téléphone</label>
            <input type="text" class="form-control" name="phone" id="phone">
            </div>
          </div>

            <br>
            <div class="form-group">             
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password">
            </div>
          </div>

            <br>
            <div class="form-group">             
            <label for="role">Rôle</label>
            <input type="text" class="form-control" name="role" id="role">
            </div>
          </div>

            <br>
            <input type="submit" class="btn btn-primary" value="Créer l'utilisateur">

          </form>


          <?php $this->stop('main_content'); ?>