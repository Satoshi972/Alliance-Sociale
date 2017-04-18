<?php 
$this->layout('layout_back',['title'=>'Liste des évenements']);
$this->start('head');
?>
    <link rel="stylesheet" href="<?= $this->assetUrl('css/fullcalendar.min.css') ?>">
<?php
$this->stop('head');
$this->start('main_content');
?>
<div class="container">
	<!-- Zone calendrier -->
   <div class="col-md-12 jumbotron text-center">        
          <h2>Liste des évenements</h2>
      </div>
  
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
              <!-- <img id="picture" class="modal-body img-responsive img-thumbnail text-center" alt='Affiche'> -->
              <div id="modalBody" class="modal-body"></div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <a id="link" ><button class="btn btn-primary">Plus d'info</button></a>
              </div>
          </div>
      </div>
    </div>
</div>
    <!-- Fin calendrier -->  
<?php
$this->stop('main_content');
$this->start('script');
?>

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
        var picture = '/Alliance_Sociale/public/';
        var lien = '/Alliance-Sociale/public/events/viewBack/';

      $('#calendar').fullCalendar({
            events: "<?= $this->url('listAllEvent'); ?>",
            header: {
                left: '',
                center: 'prev title next',
                right: ''
            },
            eventClick:  function(event, jsEvent, view) {
                $('#modalTitle').html(event.title);
                // $('#modalTitle').html(event.title);
                //$('#picture').attr('src',picture+event.picture);
                $('#modalBody').html(event.content);
                $('#link').attr('href',lien+event.id);
                $('#fullCalModal').modal();
            }
        });

    });
  </script>
<?php
$this->stop('script');
?>