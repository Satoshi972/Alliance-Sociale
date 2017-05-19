<?php 
$this->layout('layout_back',['title'=>'Création d\'évenement']);
$this->start('head');
?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/fullcalendar.min.css') ?>">
<link rel="stylesheet" href="<?= $this->assetUrl('css/fileinput.min.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" integrity="sha256-5ad0JyXou2Iz0pLxE+pMd3k/PliXbkc65CO5mavx8s8=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" integrity="sha256-xQh/Xj//D3X4M2UndCTVnMfzln8x5/EDePR3uckJoRo=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.min.css" integrity="sha256-nFp4rgCvFsMQweFQwabbKfjrBwlaebbLkE29VFR0K40=" crossorigin="anonymous" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.standalone.min.css" integrity="sha256-RMGrTGgTqr/RK4mbfJ/9dLy8Dz0oetp7mREUfq7o3IA=" crossorigin="anonymous" />
<?php
$this->stop('head');
$this->start('main_content');
?>
<div class ="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-12 well">

    <div class="text-center jumbotron">
       <h2>Cr&eacute;ation d'&eacute;v&egrave;nement</h2>
    </div>
	<div id="result"></div>

		<form action="<?= $this->url('addEvent')?>" class="form-horizontal" method="POST" enctype="multipart/form-data">


			<div class="form-group">
				<label class="col-md-2 control-label text-center" for="title">Titre</label>
				 <div class="col-md-10 text-center">
					<input type="text" name='title' id="title" class="form-control">
				 </div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label text-center" for="content">Description</label>
				<div class="col-md-10 text-center">
					<textarea name="content" id="content" cols="30" class="form-control" rows="10"></textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label text-center" for="start">Date de début</label>
				<div class="col-md-10 text-center">
					<input type="text" id="start" name="start" class="form-control datepicker" data-provide="datepicker">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label text-center" for="end">Date de fin</label>
				<div class="col-md-10 text-center">
					<input type="text" id="end" name="end" class="form-control datepicker" data-provide="datepicker">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label text-center" for="activity">L'activité rapportée a l'évenement</label>
				<div class="col-md-10 text-center">
				<select name="activity" id="activity" class="form-control">
					<?php foreach ($infos as $key => $value):?>
						<option value="<?= $value['act_id'] ?>"><?= $value['name']  ?></option>
					<?php endforeach; ?>
				</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label text-center" class="control-label text-center" for="quota">Ajouter une limitation</label>
				<div class="col-md-10 text-center">
				<input type="number" id="quota" name="quota" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label text-center" for="picture">Image</label>	
				<div class="col-md-10">
					<input type="file" name="picture" id="picture" class="picture" accept="image/*">
				</div>		
			</div>

            <div class="form-group">
				<div class="text-center">
					<input type="submit" class="btn btn-primary" value="Créer l'évènement">
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
<script src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>

<!-- JQuery UI -->
<script src="<?= $this->assetUrl('js/jquery-ui.min.js') ?>"></script>

<script src="<?= $this->assetUrl('js/file-input/fileinput.min.js'); ?>"></script>
<script src="<?= $this->assetUrl('js/file-input/fr.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" integrity="sha256-urCxMaTtyuE8UK5XeVYuQbm/MhnXflqZ/B9AOkyTguo=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.fr.min.js" integrity="sha256-IRibTuqtDv2uUUN/0iTrhnrvvygNczxRRAbPgCbs+LE=" crossorigin="anonymous"></script>
<script>
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    language: 'fr'
});
$("#picture").fileinput(
{
	'showUpload'  :false,
	'showCaption' :false,
	'showRemove'  :true,
	'maxFileCount': 10,
	language: "fr",
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