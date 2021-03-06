<?php
$this->layout('layout_back', ['title' => 'Ajouter une activité']);

$this->start('head');
?>

<link rel="stylesheet" href="<?= $this->assetUrl('css/fileinput.min.css') ?>">

<?php
$this->stop('head');
$this->start('main_content');?>


<div class ="container">
  <div class="row">   
      <div class="col-md-12 well">
        <div class="col-md-12 jumbotron">        
          <h2>Modification de l'activité</h2>
        </div>
        
          <?php if(!empty($errors)): // La variable $errors est envoyé via le controller?>
            <p class="alert alert-danger alert-dismissable"><?=implode('<br>', $errors); ?></p>
          <?php endif; ?>

          <?php if($success == true): // La variable $success est envoyé via le controller?>
            <p class="alert alert-success alert-dismissable">Votre Activité a bien été ajoutée</p>
          <?php endif; ?>

        <form method="post" class="form-horizontal" enctype="multipart/form-data">

          <div class="form-group text-center">
            <div class="col-md-12 text-center">          
              <label class="control-label " for="name">Nom de l'Activité</label>
            </div> 
            <div class="col-md-12">
              <input type="text" class="form-control" name="name" id="name" value="<?= $detail['name'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12 text-center">            
              <label class="control-label" for="content">Description de l'activité</label>
            </div>
            <div class="col-md-12">
              <textarea  type="text" class="form-control" name="content" id="content" rows=5><?= $detail['content'] ?></textarea>
            </div>
          </div>
  
          <div class="form-group">
            <div class="col-md-12 text-center">
              <label class="control-label" for="picture">Affiche</label>
            </div>
            <div class="col-md-12">
              <img src="/Alliance-Sociale/public/<?= $detail['picture']?>" alt="Affiche">
              <input type="file" name="picture" id="picture" accept="image/*">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-2 text-center">
              <label class="control-label" for="form">Formulaire</label>
            </div>
            <div class="col-md-10">
              <input type="file" name="form" id="form">
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button type="submit" id="submitForm" class="btn btn-primary">Mettre à jour</button>
            </div>
          </div>
          
        </form>
      </div>
   </div>
  </div>

<?php $this->stop('main_content'); ?>
<?php
$this->start('script'); 
?>
    <script src="<?= $this->assetUrl('js/file-input/fileinput.min.js'); ?>"></script>
    <script src="<?= $this->assetUrl('js/file-input/fr.js'); ?>"></script>
<script>
  $("#picture").fileinput(
      {
        'showUpload':false,
        'showCaption' : false,
        'showRemove'  :true,
        'maxFileCount': 10,
        language: "fr"
      });
  $("#form").fileinput(
      {
        'showUpload':false,
        'showCaption' : false,
        'showRemove'  :true,
        'maxFileCount': 1,
        language: "fr"
      });
</script>
<?php
$this->stop('script'); 
?>