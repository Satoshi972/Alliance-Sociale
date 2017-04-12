<?php

$this->layout('layout_back', ['title' => 'Modifier un partenaire']);

$this->start('main_content');
?>

<div class ="container">
  <div class="row">
    <div class="col-md-12">

      <div class="col-md-6 col-md-offset-3 text-center well">
      
      
        <h2>Modifier Partenaire</h2>

          <?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
            <p class="alert alert-danger alert-dismissable"><?=implode('<br>', $errors); ?></p>
          <?php endif; ?>

          <?php if($success == true): // La variable $success est envoyé via le controller?>
            <p class="alert alert-success alert-dismissable">Votre partenaire à bien été modifier</p>
          <?php endif; ?>

        <form method="post" id="url" class="form-horizontal" enctype="multipart/form-data">

          
          <div class="form-group">            
                <label class="col-md-2 control-label" for="name">Partenaire</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="name" id="name">
                </div>
          </div>
               
          
          <div class="form-group">
            <label class="col-md-2 control-label" for="url">Logo</label>
            <div class="col-md-10">
            <input type="file" name="url" id="url" accept="image/*">
            </div>
          </div>
          

          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button type="submit" id="submitForm" class="btn btn-primary">Ajouter de Partenaire</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->stop('main_content'); ?>