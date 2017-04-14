<?php 
$this->layout('layout',['title'=>'Liste des évenements']);
$this->start('head');
?>

<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= $this->assetUrl('css/fullcalendar.min.css') ?>">

<?php
$this->stop('head');
$this->start('main-content');
?>

<div class="jumbotron">
	
	<legend class="text-center">liste des évenements</legend>
	<!-- possible placement du calendrier -->
	<div id="calendar"></div>
</div>

<?php
$this->stop('main-content');
$this->start('script');
?>

<script src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/jquery-ui.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/fullcalendar/moments.js') ?>"></script>
<script src="<?= $this->assetUrl('js/fullcalendar/fullcalendar.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/fullcalendar/gcal.min.js') ?>"></script>
<script src="<?= $this->assetUrl('js/fullcalendar/fr.js') ?>"></script>
<script>
	$(function()
	{
		var date = new Date();
	 	var d = date.getDate();
	 	var m = date.getMonth();
	 	var y = date.getFullYear();

		$('#calendar').fullCalendar({
			 editable: false,
			 events: "<?= $this->url('listBig'); ?>"
		});
	});
</script>

<?php
$this->stop('script');
?>