<?php $this->layout('layout_back', ['title' => 'Listes des Partenaires']) ?>
<?php $this->start('head') ?>
<link rel="stylesheet" href="<?= $this->assetUrl('css/sweetalert.css') ?>">
<?php $this->stop('head') ?>
  <?php $this->start('main_content') ?>

  <div class="container">

    <div class="col-md-12">

      <div class="col-md-12 jumbotron text-center">
        <h1>Listes des Partenaires</h1>
      </div>
        <?php foreach($partners as $partner): ?>
          
 
          <div class="col-md-3">
            <?=$partner['name'];?>
            
            <img src="<?=$this->assetUrl($partner['url']);?>" class="img-responsive thumbnail" style="width: 70%; height: 50%;" alt="medias" frameborder="0" scrolling="no"></th>

            <a href="<?= $this->url('update_partners', ['id' => $partner['id']])?>" class="btn btn-info">Modifier</a></button>
             |
            <a href="<?= $this->url('del_partners', ['id' => $partner['id']]) ?>" class='delete btn btn-danger' data-id="<?=$partner['id'] ?>">Supprimer</a>

          </div>
          <?php endforeach; ?>
      </div>
  </div>
    <?php $this->stop('main_content') ?>

       <?php $this->start('script') ?>
 <script src="<?= $this->assetUrl('js/sweetalert.min.js')?>"></script>

 <script>

 $(function(){

  $('.delete').on('click', function(e)
  {
      e.preventDefault();
      var $this = $(this);
      var id = $(this).data('id');
      var myTr = $(this).parent().parent();
      //var url = '/Alliance-Sociale/public/users/delete/'+id;

      swal({
            title: 'Attention',
            text: 'Vous allez supprimer ce partenaire',
            type: 'warning',
            showCancelButton: true,
            closeOnConfirm: false,
            disableButtonsOnConfirm: true,
            confirmLoadingButtonColor: '#DD6B55'
          }, function(){
              swal('Suppression effectuée');

                  $.ajax({
                      type: 'POST',
                      url: $this.attr('href'),
                      data: {id : id},
                      success: function(s)
                      {
                          if(s)
                          {
                              myTr.remove();
                              location.reload();
                              // $('#result').html(res);
                          }
                      }
                  });
          });
      });

  });
 </script>

    <?php $this->stop('script') ?>
