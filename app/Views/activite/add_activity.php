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
        <div class="col-md-12 jumbotron text-center">        
          <h2>Ajouter une activité</h2>
        </div>


        <form method="post" action="<?= $this->url('add_activite') ?>" class="form-horizontal" enctype="multipart/form-data">
        <p class="col-md-12 text-center" id="result"></p>

          <div class="form-group">
            <div class="col-md-2 text-center">          
              <label class="control-label " for="name">Nom de l'activité</label>
            </div> 
            <div class="col-md-10">
              <input type="text" class="form-control" name="name" id="name">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-2 text-center">            
              <label class="control-label" for="content">Description de l'activité</label>
            </div>
            <div class="col-md-10">
              <textarea  type="text" class="form-control" name="content" id="content" rows=5></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-2 text-center">
              <label class="control-label" for="picture">Photos</label>
            </div>
            <div class="col-md-10">
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
            <div class="col-md-12 text-center">
              <button type="submit" id="submitForm" class="btn btn-primary">Créer l'activité</button>
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

      $(function()
      {
        //gestion de mon formulaire d'envoi
        $('form').on('submit',function(e)
        {
            e.preventDefault();
            var myForm = $('form');
            submitForm(myForm);
        });
      });
</script>
<?php
$this->stop('script'); 
?>