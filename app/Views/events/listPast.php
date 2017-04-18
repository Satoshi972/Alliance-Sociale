<?php $this->layout('layout_front', ['title' => 'Liste past event']) ?>

<?php $this->start('sliderCss') ?>

<link rel="stylesheet" href="<?= $this->assetUrl('css/sliderCss.css') ?>">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">-->
    <!--<link rel="stylesheet" href="//d2d3qesrx8xj6s.cloudfront.net/dist/bootsnipp.min.css?ver=7d23ff901039aef6293954d33d23c066"> -->
<?php $this->stop('sliderCss') ?>

<?php $this->start('main_content') ?>




<div class ="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-8 text-center well jumbo">
          
<h1 style='text-align:center'>Liste des évènements passés</h1>

<table class="table table-hover">
		<thead>
			<tr class="success">
                <th>Evènement</th>
                <th>Titre</th>
                <th>Détails</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Voir l'évènement</th>
			</tr>
		</thead>
       
        <tbody>
           <?php foreach($infospas as $infopas): ?>
            <tr class="warning">
                <td><img src="http://localhost/Alliance-Sociale/public/<?=$infopas['picture'] ?>" alt="<?= $infopas['title']?>" class="thumbnail img-home"  data-toggle="modal" data-target="#lightbox" height="200px" width="200px"></td>
                <td><?= $infopas['title']?></td>
                <td><?= $infopas['content']?></td>
                <td><?= $infopas['start']?></td>
                <td><?= $infopas['end']?></td>
                <td><a href="http://localhost/Alliance-Sociale/public/events/view/<?=$infopas['id'] ?>">Voir</a></td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
                
           
        
       	</table>    
          
          
      </div>
      </div>
    </div>
</div>
   <?php $this->stop('main_content'); 

    ?>