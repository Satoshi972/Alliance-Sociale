<?php 
$this->layout('layout_back', ['title' => 'Mise a jour des infos du site']);

$this->start('head');
?>
	<!-- File input CSS -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/fileinput.min.css') ?>">

<?php 
$this->stop('head');
$this->start('main_content');
?>

<form method="POST" enctype="multipart/form-data" class="form-horizontal">

	<legend class="text-center">Modification des informations du site</legend>

	<div class="form-group">
		<label for="Header">Header</label>
		<img src="<?php $this->assetUrl($infos['header']); ?>" class="img-responsive img-thumbnail" alt="Header">
		<input type="file" id="Header" name="Header">
	</div>

	<div class="text-center">
		<input type="submit" class="btn btn-primary" value="Envoyer">
	</div>
</form>

<?php
$this->stop('main_content');

$this->start('script');
?>
<!-- File input js -->
<script src="<?= $this->assetUrl('js/file-put/fileinput.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/file-input/fr.js') ?>"></script>

<script>
	$("#medias").fileinput(
    	{
    		'showUpload':false,
    		'showCaption' : false,
    		language: "fr"
    	});

	function LoadSiteInfos()
	{
		$.ajax('<?= $this->url('aboutInfos') ?>',function(data)
		{
			console.log(data);
			var history = "";
			var word = "";
			$.each(data, function(key, value)
			{
				history = value.history;
				word    = value.word;
			});

			$('#history attr["value"]').html(history);		
			$('#word attr["value"]').html(word);		
		});
	}

	$(function()
	{
		LoadSiteInfos();

		$('form').on('submit', function(e)
		{
			e.preventDefault();
			var myFrom = $('form');
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
	                if(res == "success")
		            {
		            	$('#result').html("Les modifications ont bien été prises en compte").addClass('alert-dismissable alert-success').fadeIn(2000).fadeOut(5000);
		            	$('form')[0].reset();
		            	LoadSiteInfos();
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