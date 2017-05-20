<?php 
$this->layout('layout_back', ['title' => 'Mise a jour des infos du site']);
$this->start('main_content');
?>

<div class ="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-12 well">
          <div class="col-md-12 jumbotron text-center">
            <h2>Modification des informations de la présentation</h2>
          </div>

			<form method="POST" action="<?= $this->url('updateAboutInfos') ?>" enctype="multipart/form-data" class="form-horizontal">

			<div id="result" class="text-center col-xs-12"></div>

				<div class="form-group">
					<label class="col-md-2 control-label text-center" for="word">Que sommes nous</label>
					<div class="col-md-10 text-center">
					<textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label text-center" for="history">Histoire de l'association</label>
					<div class="col-md-10 text-center">
					<textarea name="history" id="history" cols="30" rows="10" class="form-control"></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label text-center" for="word">Mot de la présidente</label>
					<div class="col-md-10 text-center">
					<textarea name="word" id="word" cols="30" rows="10" class="form-control"></textarea>
					</div>
				</div>

				<div class="text-center">
					<input type="submit" class="btn btn-primary" value="Modifier">
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
<script>
	//recupere les données de la table about via un json, puis affecte les champs du contenu de la bdd
	function LoadAboutInfos()
	{
		$.getJSON('<?= $this->url('aboutInfos') ?>',function(data)
		{
			console.log(data);
			var description = "";
			var history = "";
			var word = "";

			$.each(data, function(key, value)
			{
				description = data.description;
				history 	= data.history;
				word    	= data.word;
			});

			$('#description').text(description);
			$('#history').text(history);		
			$('#word').text(word);		
		});
	}

	$(function()
	{
		LoadAboutInfos();
		$('form').on('submit', function(e)
		{
			e.preventDefault();
			var myForm = $('form');
			var formdata = (window.FormData) ? new FormData(myForm[0]) : null;
	        var data = (formdata !== null) ? formdata : myForm.serialize();
	          
	        $.ajax(
	        {
	            method: myForm.attr('method'), //recupere la methode indiqué en formulaire
	            url: myForm.attr('action'), //recupere l'action du formulaire
	            contentType: false, // obligatoire pour de l'upload
	            processData: false, // obligatoire pour de l'upload
	            cache: false,
	            data: data,
	            success: function(res)
	            {
	                if(res == "success")
		            {
		            	$('#result').html("Les modifications ont bien été prises en compte").addClass('alert-dismissable alert-success').fadeIn(2000).fadeOut(5000);
		            	$('form')[0].reset();
		            	LoadAboutInfos();
		            }
		            else
		            {
		            	$('#result').html(res).fadeIn(2000).fadeOut(5000);
		            }
	            }
	        });
	    });         

	});
</script>
<?php
$this->stop('script');
?>