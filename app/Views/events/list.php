<?php 
$this->layout('layout',['title'=>'Liste des évenements']);
$this->start('head');
?>

<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= $this->assetUrl('css/fullcalendar.min.css') ?>">

<?php
$this->stop('head');
$this->start('main_content');
?>

<div class="jumbotron container">

<legend class="text-center">liste des évenements</legend>
<!-- possible placement du calendrier -->
<div id="calendar"></div>

<!-- detail de mon event -->
<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary"><a id="eventUrl" target="<?= $this->url('updateEvent') ?>">Event Page</a></button>
            </div>
        </div>
    </div>
</div>

<!-- <div id="eventContent" title="Event Details" style="display:none;">
    Start: <span id="startTime"></span><br>
    End: <span id="endTime"></span><br><br>
    <p id="eventInfo"></p>
    <p><strong><a id="eventLink" href="" target="_blank">Read More</a></strong></p>
</div> -->
	
</div>
<?php
$this->stop('main_content');
$this->start('script');
?>

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

		// $('#calendar').fullCalendar({
		// 	 editable: false,
		// 	 events: "<?= $this->url('listAllEvent'); ?>"
		// });

	$('#calendar').fullCalendar({
        events: "<?= $this->url('listAllEvent'); ?>",
        header: {
            left: '',
            center: 'prev title next',
            right: ''
        },
        eventClick:  function(event, jsEvent, view) {
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.content);
            //$('#modalBody').html(event.start);
            $('#eventUrl').attr('href',event.url);
            $('#fullCalModal').modal();
        }
    });

});
</script>

<?php
$this->stop('script');
?>