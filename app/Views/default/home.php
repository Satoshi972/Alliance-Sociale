<?php $this->layout('layout_back', ['title' => 'Accueil']) ?>


<?php $this->start('sliderCss') ?>

<link rel="stylesheet" href="<?= $this->assetUrl('css/sliderCss.css') ?>">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="//d2d3qesrx8xj6s.cloudfront.net/dist/bootsnipp.min.css?ver=7d23ff901039aef6293954d33d23c066">
<?php $this->stop('sliderCss') ?>


<?php $this->start('main_content') ?>
                    <?php //var_dump($infosfut[0]['title']); ?>
                    <?php //var_dump($infosfut[0]['content']); ?>
                    <?php //var_dump($infosfut[0]['picture']); ?>
                        
                <h1>Accueil :</h1>
               <div class="container">
               
    
    <div class="row">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                   <?php for ($i = 0 ; $i < count($infosfut); $i++) { ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>" <?php if ($i== 0) {
          echo
          'class="active"'; } ?>
          ></li>
                    <?php } ?>
                    <!--<li data-target="#carousel-example-generic" data-slide-to="1"></li>
                   <!-- <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
                </ol>
                
               
                <div class="carousel-inner">
                   <?php for ($i = 0 ; $i < count($infosfut); $i++) {
   
      ?> 
                    <div class="<?php if ($i== 0) {
          echo
          'item active'; }
          else {
              echo 'item';
          }
    ?>
    ">
                        <a href="http://ton lien"><img src="http://localhost/Alliance-Sociale/public/<?=$infosfut[$i]['picture'] ?>" alt="<?php if ($i== 0) {
          echo
          'First'; }
          elseif ($i== 1){
              echo 'Second';
            }
          elseif ($i== 2){
              echo 'Third';
          } ?> slide" class="img-responsive"></a>
                        <div class="carousel-caption">
                            <h3>
                                <a href="http://ton lien"><?=$infosfut[$i]['title'] ?> le <?= $infosfut[$i]['start'] ?></a></h3>
                            <p>
                                <?=$infosfut[$i]['content'] ?></p>
                        </div>
                    </div>
                    
                    <?php } ?> 
                    <!--<div class="item">
                        <img src="http://localhost/Alliance-Sociale/public/assets/medias/media58f14bcc952da.jpg" alt="Second slide" height="200" width= "100%">
                        <div class="carousel-caption">
                            <h3>
                                Second slide</h3>
                            <p>
                                Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                    </div>
                   <!-- <div class="item">
                        <img src="http://placehold.it/1200x500/34495e/2c3e50" alt="Third slide">
                        <div class="carousel-caption">
                            <h3>
                                Third slide</h3>
                            <p>
                                Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                    </div>-->
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control"
                        href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
                        </span></a>
            </div>
            <div class="main-text hidden-xs">
                <div class="col-md-12 text-center">
                    <h1>
                        Evènement à venir :</h1>
                    
                </div>
            </div>
        </div>
    </div>
</div>

    <h2>Liste des Evènements présents :</h2>
    
<table class="1">
		<thead>
			<tr>
                <th>Event</th>
                <th>Titre</th>
                <th>Détails</th>
                <th>Depuis</th>
                <th>Jusqu'à</th>
                <th>Voir l'évènement</th>
			</tr>
		</thead>
       <?php foreach($infospres as $infopres): ?>
        <tbody>
            <tr>
                <td><img src="http://localhost/Alliance-Sociale/public/<?=$infopres['picture'] ?>" alt="<?= $infopres['title']?>" height="200px" width="200px"></td>
                <td><?= $infopres['title']?></td>
                <td><?= $infopres['content']?></td>
                <td><?= $infopres['start']?></td>
                <td><?= $infopres['end']?></td>
                <td><a href="www.google.fr">Voir</a></td>
                
            </tr>
            
        </tbody>
                
        <?php endforeach; ?> 
          
    </table>
<a href="www.google.fr">Voir tous les évènements présents</a>
<h3>Liste des Evènements passés :</h3>
<table class="2">
		<thead>
			<tr>
                <th>Event</th>
                <th>Titre</th>
                <th>Détails</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Voir l'évènement</th>
			</tr>
		</thead>
       <?php foreach($infospas as $infopas): ?>
        <tbody>
            <tr>
                <td><img src="http://localhost/Alliance-Sociale/public/<?=$infopas['picture'] ?>" alt="<?= $infopas['title']?>" height="200px" width="200px"></td>
                <td><?= $infopas['title']?></td>
                <td><?= $infopas['content']?></td>
                <td><?= $infopas['start']?></td>
                <td><?= $infopas['end']?></td>
                <td><a href="www.google.fr">Voir</a></td>
                
            </tr>
            
        </tbody>
                
        <?php endforeach; ?>   
        
       	</table>       
<a href="www.google.fr">Voir tous les évènements passés</a>               

<?php $this->stop('main_content') 



?>

