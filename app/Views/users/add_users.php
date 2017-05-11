<?php

$this->layout('layout_back', ['title' => 'Ajouter un utilisateur']);
$this->start('head');
?>
<link rel="stylesheet" href="<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" integrity="sha256-5ad0JyXou2Iz0pLxE+pMd3k/PliXbkc65CO5mavx8s8=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" integrity="sha256-xQh/Xj//D3X4M2UndCTVnMfzln8x5/EDePR3uckJoRo=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.min.css" integrity="sha256-nFp4rgCvFsMQweFQwabbKfjrBwlaebbLkE29VFR0K40=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.standalone.min.css" integrity="sha256-RMGrTGgTqr/RK4mbfJ/9dLy8Dz0oetp7mREUfq7o3IA=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"><?php
$this->stop('head');
$this->start('main_content');
?>

<div class ="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-6 col-md-offset-2 well">
          <div class="col-md-12 jumbotron text-center">
            <h2>Création utilisateur</h2>
          </div>

          <p id="result" class="col-xs-12"></p>
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
              <label class="col-md-2 control-label" for="birthday">Date de Naissance</label>
              <div class="col-md-10 text-center">
                <input type="text" class="form-control datepicker" name="birthday" id="birthday" data-provide="datepicker">
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
              <label class="col-md-2 control-label" for="caf">Numéro de caf</label>
              <div class="col-md-10 text-center">
                <input type="text" class="form-control" name="caf" id="caf">
              </div>
            </div>

            <div class="form-group">             
              <label class="col-md-2 control-label" for="role">Rôle</label>
              <div class="col-md-10 text-center">
                <select name="role" id="role" class="form-control text-center">
                  <option value="0">Choisissez le role</option>
                  <?php foreach ($roles as $key => $value):?>
                    <option value="<?=$value?>"><?=$value?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

             <div class="form-group">             
             <label class="col-md-2 control-label" for="activity">Activité</label>
              <div class="col-md-10 text-center">
                <select name="activity[]" id="activity" class="form-control text-center" multiple="multiple">
                  <?php foreach ($activity as $key => $value):?>
                    <option value="<?=$value?>"><?=$value?></option>
                  <?php endforeach; ?>
                </select>
              </div> 
            </div>

            <div class="form-group">
              <div class="col-md-12 text-center">
                  <button type="submit" id="submitForm" class="btn btn-primary">Créer utilisateur</button>
              </div>
            </div>
          </form>

      </div>
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

  //gestion de mon formulaire d'envoi
  $('form').on('submit',function(e)
  {
      e.preventDefault();

      var myForm = $('form');

      $.ajax(
      {
          method: myForm.attr('method'),
          url: myForm.attr('action'),
          data: myForm.serialize(),
          success: function(res)
          {
            // $('#result').html(res);
            // $('#result').removeClass();
           //    console.log(res);

              if(res == "success")
              {
                $('#result').html("Votre formulaire a bien été envoyé").addClass('alert-dismissable alert-success').fadeIn(2000).fadeOut(5000);
                $('form')[0].reset();
              }
              else
              {
                $('#result').html(res).fadeIn(2000).fadeOut(5000);
              }
          }
      });
  });
})
</script>
<?php 
$this->stop('script');
?>