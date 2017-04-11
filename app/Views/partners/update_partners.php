<?php

$this->layout('layout_back', ['title' => 'Modifier un partenaire']);

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
    <p style="color:green">Le partenaire a été modifié</p>
    <?php endif; ?>

      <?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
        <p style="color:red">
          <?=implode('<br>', $errors); ?>
        </p>
        <?php endif; ?>

      <h2> Modifier un partenaire </h2>

          <form method="post" class="form-horizontal" enctype="multipart/form-data">

            <div class="form-group">
               <label class="col-md-4 control-label" for="name">Partenaire</label>
               <div class="col-md-4">
                <input type="text" name="name" id="name">
               </div>
               </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="url">Logo</label>
              <div class="col-md-4">
                <input type="file" id="url" name="url" multiple class="form-control">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-4 col-md-offset-4">
                <input type="submit" value="Modifier l'utilisateur'">
              </div>
            </div>
          </form>

          <?php $this->stop('main_content'); ?>