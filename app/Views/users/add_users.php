<?php

$this->layout('layout_back', ['title' => 'Ajouter un utilisateur']);
$this->start('head');
?>
<link rel="stylesheet" href="<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" integrity="sha256-5ad0JyXou2Iz0pLxE+pMd3k/PliXbkc65CO5mavx8s8=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" integrity="sha256-xQh/Xj//D3X4M2UndCTVnMfzln8x5/EDePR3uckJoRo=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.min.css" integrity="sha256-nFp4rgCvFsMQweFQwabbKfjrBwlaebbLkE29VFR0K40=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.standalone.min.css" integrity="sha256-RMGrTGgTqr/RK4mbfJ/9dLy8Dz0oetp7mREUfq7o3IA=" crossorigin="anonymous" />
<style>
  
.dropdown {
  /*position: absolute;
  top:50%;
  transform: translateY(-50%);*/
}

a {
  color: #fff;
}

.dropdown dd,
.dropdown dt {
  margin: 0px;
  padding: 0px;
}

.dropdown ul {
  margin: -1px 0 0 0;
}

.dropdown dd {
  position: relative;
}

.dropdown a,
.dropdown a:visited {
  color: #fff;
  text-decoration: none;
  outline: none;
  font-size: 12px;
}

.dropdown dt a {
  background-color: #4F6877;
  display: block;
  padding: 8px 20px 5px 10px;
  min-height: 25px;
  line-height: 24px;
  overflow: hidden;
  border: 0;
  width: 272px;
}

.dropdown dt a span,
.multiSel span {
  cursor: pointer;
  display: inline-block;
  padding: 0 3px 2px 0;
}

.dropdown dd ul {
  background-color: #4F6877;
  border: 0;
  color: #fff;
  display: none;
  left: 0px;
  padding: 2px 15px 2px 5px;
  position: absolute;
  top: 2px;
  width: 280px;
  list-style: none;
  height: 100px;
  overflow: auto;
}

.dropdown span.value {
  display: none;
}

.dropdown dd ul li a {
  padding: 5px;
  display: block;
}

.dropdown dd ul li a:hover {
  background-color: #fff;
}

button {
  background-color: #6BBE92;
  width: 302px;
  border: 0;
  padding: 10px 0;
  margin: 5px 0;
  text-align: center;
  color: #fff;
  font-weight: bold;
}
</style>
<?php
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
           <?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
                <p class="alert alert-danger alert-dismissable"><?=implode('<br>', $errors); ?></p>
              <?php endif; ?>

              <?php if($success == true): // La variable $success est envoyé via le controller?>
                <p class="alert alert-success alert-dismissable" ">Votre utilisateur à été créer</p>
              <?php endif; ?>

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
             <!--  <label class="col-md-2 control-label" for="activity">Activité</label>
              <div class="col-md-10 text-center">
                <select name="activity" id="activity" class="form-control text-center">
                  <option value="0">Choisissez l'activité</option>
                  <?php foreach ($activity as $key => $value):?>
                    <option value="<?=$value?>"><?=$value?></option>
                  <?php endforeach; ?>
                </select>
              </div> -->
              <dl class="dropdown"> 
  
                <dt>
                <a href="#">
                  <span class="hida">Activité</span>    
                  <p class="multiSel"></p>  
                </a>
                </dt>

                <dd>
                    <div class="mutliSelect">
                        <ul>
                        <?php foreach ($activity as $key => $value):?>
                            <li>
                              <input type="checkbox" name="activity[]" value="<?=$value?>
                              " />
                              <?=$value?>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                    </div>
                </dd>
              <!-- <button>Filter</button> -->
              </dl>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
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
<script>
$('.datepicker').datepicker({
  format: 'yyyy-mm-dd',
  language: 'fr'
});
$(".dropdown dt a").on('click', function() {
  $(".dropdown dd ul").slideToggle('fast');
});

$(".dropdown dd ul li a").on('click', function() {
  $(".dropdown dd ul").hide();
});

function getSelectedValue(id) {
  return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function(e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});

$('.mutliSelect input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
    title = $(this).val() + ",";

  if ($(this).is(':checked')) {
    var html = '<span title="' + title + '">' + title + '</span>';
    $('.multiSel').append(html);
    $(".hida").hide();
  } else {
    $('span[title="' + title + '"]').remove();
    var ret = $(".hida");
    $('.dropdown dt a').append(ret);

  }
});
</script>
<?php 
$this->stop('script');
?>