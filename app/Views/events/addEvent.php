<?php 
$this->layout('layout_front',['title'=>'Création d\'évenement']);
$this->start('head');
?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/fullcalendar.min.css') ?>">
<link rel="stylesheet" href="<?= $this->assetUrl('css/fileinput.min.css') ?>">
<?php
$this->stop('head');
$this->start('main_content');
?>

<legend class="text-center">Cr&eacute;ation d'&eacute;v&egrave;nement</legend>
<form action="<?= $this->url('addEvent')?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="picture">Image</label>
		<input type="file" id="picture" class="picture">
	</div>

	<div class="form-group">
		<label for="title">Titre</label>
		<input type="text" id="title" class="title" class="form-control">
	</div>

	<div class="form-group">
		<label for="content">Contenu</label>
		<textarea name="content" id="content" cols="30" class="form-control" rows="10"></textarea>
	</div>

	<div class="form-group">
		<label for="start">Date de début</label>
		<input type="text" id="start" name="start" class="form-control">
	</div>

	<div class="form-group">
		<label for="end">Date de fin</label>
		<input type="text" id="end" name="end" class="form-control">
	</div>

	<div class="form-group">
		<label for="activity">L'activité rapportée a l'évenement</label>
		<select name="activity" id="activity" class="form-control">
			<?php foreach ($infos as $key => $value):?>
				<option value="<?= $value['act_id'] ?>"><?= $value['name']  ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="text-center">
		<input type="submitend" class="btn btn-primary" value="Envoyer">
	</div>
</form>

<?php
$this->stop('main_content');
$this->start('script');
?>
<script src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>

<script src="<?= $this->assetUrl('js/file-input/fileinput.min.js'); ?>"></script>
<script src="<?= $this->assetUrl('js/file-input/fr.js'); ?>"></script>
<!-- <script>
$("#picture").fileinput(
	{
		'showUpload':false,
		'showCaption' : false,
		language: "fr",
	});
</script>
-->
  <script>
  $( function() {

	  	//Date picker
	    $( "#start" ).datepicker({format: 'yyyy/mm/dd'});
	    $( "#end" ).datepicker({format: 'yyyy/mm/dd'});
		$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );

		//gestion de mon formulaire d'envoi
	    $('form input[type="submit"]').click(function(e)
	    {
	        e.preventDefault();

	        var myForm = $('form');
	        var formdata = (window.FormData) ? new FormData(myForm[0]) : null;
	        var data = (formdata !== null) ? formdata : myForm.serialize();
	                       
	        $.ajax(
	        {
	            method: myForm.attr('method'),
	            url: myForm.attr('action'),
	            contentType: false, // obligatoire pour de l'upload
	            processData: false, // obligatoire pour de l'upload
	            cache: false,
	            data: data,
	            success: function(res)
	            {
	                console.log('toto');
	                $('#result').html(res);
	                //$('#comment').html()
	            }
	        });
	    });         
  } );


  </script>
<?php
$this->stop('script');
?>