<?php
$this->layout('layout_front', ['title' => 'Ajouter une activité']);
$this->start('main_content');?>





<div class ="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-8 col-md-offset-2 text-center well  text-center">
        <div class="col-md-12 jumbotron">        
          <h2>Ajouter une activitée</h2>
      </div>
        
      

          <?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
            <p class="alert alert-danger alert-dismissable"><?=implode('<br>', $errors); ?></p>
          <?php endif; ?>

          <?php if($success == true): // La variable $success est envoyé via le controller?>
            <p class="alert alert-success alert-dismissable">Votre Activité à bien été ajouter</p>
          <?php endif; ?>

        <form method="post" action="<?= $this->url('add_activite') ?>" class="form-horizontal" enctype="multipart/form-data">

          
          <div class="form-group">            
            <label class="col-md-2 control-label" for="name">Activité</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="name" id="name">
            </div>
          </div>

          <div class="form-group">            
            <label class="col-md-2 control-label" for="content">Description Activité</label>
            <div class="col-md-10">
              <textarea  type="text" class="form-control" name="content" id="content" rows=5></textarea>
            </div>
          </div>

      <div class="input-group">
      <label for="category">Catégorie de la nouvelle activité :</label>
  
      <select name="category" id="category">
       <?php foreach ($category as $key => $value): ?>
          <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
       <?php endforeach; ?>
      </select>
    </div>
               
          
          <div class="form-group">
            <label class="col-md-2 control-label" for="picture">photos</label>
            <div class="col-md-10">
            <input type="file" name="picture" id="picture" accept="image/*">
            </div>
          </div>
          

          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button type="submit" id="submitForm" class="btn btn-primary">Ajouter des activitées</button>
            </div>
          </div>
          
        </form>
      </div>
   </div>
  </div>
</div>
<?php $this->stop('main_content'); ?>