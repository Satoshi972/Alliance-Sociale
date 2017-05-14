<?php
$this->layout('layout_back', ['title' => 'Modifier un utilisateur']);
$this->start('head');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" integrity="sha256-5ad0JyXou2Iz0pLxE+pMd3k/PliXbkc65CO5mavx8s8=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" integrity="sha256-xQh/Xj//D3X4M2UndCTVnMfzln8x5/EDePR3uckJoRo=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.min.css" integrity="sha256-nFp4rgCvFsMQweFQwabbKfjrBwlaebbLkE29VFR0K40=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.standalone.min.css" integrity="sha256-RMGrTGgTqr/RK4mbfJ/9dLy8Dz0oetp7mREUfq7o3IA=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<?php
$this->stop('head');
$this->start('main_content');
?>


<div class ="container">
  <div class="row">
      <div class="col-md-12 well">
          <div class="col-md-12 jumbotron">
         <h2>Modification de l'utilisateur</h2>
          </div>
           <?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
                <p class="alert alert-danger alert-dismissable"><?=implode('<br>', $errors); ?></p>
              <?php endif; ?>

              <?php if($success == true): // La variable $success est envoyé via le controller?>
                <p class="alert alert-success alert-dismissable">Votre utilisateur à été Modifier</p>
                <p><a href="<?= $this->url('list_users', ['page'=> 1,'age1' => 0, 'age2'=> 150]) ?>">Retour a la liste d'utilisateur</a></p>
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
              <label class="col-md-2 control-label" for="birthday">Date de Naissance</label>
              <div class="col-md-10 text-center">
                <input type="date" class="form-control datepicker" name="birthday" id="birthday" data-provide="datepicker" value="<?=$affiche['birthday']; ?>" >
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
              <label class="col-md-2 control-label" for="caf">Numéro de caf</label>
              <div class="col-md-10 text-center">
                <input type="text" class="form-control" name="caf" id="caf" value="<?=$affiche['caf'] ?>">
              </div>
            </div>


            <div class="form-group">             
              <label class="col-md-2 control-label" for="role">Rôle</label>
              <div class="col-md-10 text-center">
                <select name="role" id="role" class="form-control text-center">
                  <?php foreach ($roles as $key => $value):?>
                    <option value="<?=$value?>"<?php if($value == $affiche['role']){echo 'selected';} ?>><?=$value?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">             
             <label class="col-md-2 control-label" for="activity">Activité</label>
              <div class="col-md-10 text-center">
                <select name="activity[]" id="activity" class="form-control text-center" multiple="multiple">
                  <?php foreach ($activity as $key => $value):?>
                    <?php foreach ($suscribed as $index => $val):?>
                    <option value="<?=$value['act_id']?>"
                        <?php if($val == $value['name']){echo 'selected';} ?>><?=$value['name']?></option>
                    <?php endforeach; ?>
                  <?php endforeach; ?>
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
<?php 
$this->stop('main_content');
$this->start('script');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" integrity="sha256-urCxMaTtyuE8UK5XeVYuQbm/MhnXflqZ/B9AOkyTguo=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.fr.min.js" integrity="sha256-IRibTuqtDv2uUUN/0iTrhnrvvygNczxRRAbPgCbs+LE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script>
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    language: 'fr'
});
$(function()
{
  $(document).ready(function() {

      $('#activity').multiselect();

  });
})
</script>
<?php 
$this->stop('script');