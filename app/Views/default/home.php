<?php $this->layout('layout_front', ['title' => 'Accueil']) ?>


<?php $this->start('main_content') ?>
    <?php //var_dump($infosfut[0]['title']); ?>
    <?php //var_dump($infosfut[0]['content']); ?>
    <?php //var_dump($infosfut[0]['picture']); ?>


    
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-12 text-center">
                <h1>Accueil</h1>                       
            </div>
                       
            <div class="row">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                           <?php for ($i = 0 ; $i < count($infosfut); $i++) { ?>
                            <li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>" <?php if ($i== 0) {
                            echo 'class="active"'; } ?>></li>
                            <?php } ?>
                            <!--<li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
                           <!-- <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
                        </ol>
                        
                       
                        <div class="carousel-inner">
                           <?php for ($i = 0 ; $i < count($infosfut); $i++) { ?> 
                           <div class="<?php if ($i== 0) {
                                echo 'item active'; } else {
                                echo 'item';} ?>
                                ">
                                
                                <a href="/Alliance-Sociale/public/events/view/<?=$infosfut[$i]['id'] ?>"><img src="/Alliance-Sociale/public/<?=$infosfut[$i]['picture'] ?>" alt="<?php if ($i== 0) {
                                echo 'First'; } elseif ($i== 1){
                                echo 'Second'; } elseif ($i== 2){
                                echo 'Third'; } elseif ($i== 3){
                                echo 'Fourth';} elseif ($i== 4){
                                echo 'fifth'; }?> slide" class="img-responsive img-slide"></a>
                                <div class="carousel-caption">
                                    <h3>
                                        <a  class="link-home" href ="/Alliance-Sociale/public/events/view/<?=$infosfut[$i]['id'] ?>"><?=$infosfut[$i]['title'] ?> le <?= $infosfut[$i]['start'] ?></a></h3>
                                    <p class="text-slider">
                                        <?=$infosfut[$i]['content'] ?>
                                    </p>
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
                            </div>-->
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
                                </span>
                            </a>
                    </div>

                    <div class="main-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h1 style="border-radius: 30px !important; background:white !important;">Evènement à venir :</h1>
                            
                        </div>

                    </div>
                </div>
            </div>

    
            <div class="table-responsive col-md-12 big-pres">
            <h2>Liste des Evènements en cours :</h2>
            
                <table class="table table-hover">

                    <thead>
                        <tr class="success">
                            <th>Evènement</th>
                            <th>Titre</th>
                            <th>Détails</th>
                            <th>Depuis</th>
                            <th>Fin</th>
                            <th>Voir l'évènement</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($infospres as $infopres): ?>
                        <tr class="info">
                            <td>

                            <img src="/Alliance-Sociale/public/<?=$infopres['picture'] ?>" alt="<?= $infopres['title']?>" class="thumbnail img-home" data-toggle="modal" data-target="#lightbox" height="200px" width="200px">

                            </td>
                            <td><?= $infopres['title']?></td>
                            <td><?= $infopres['content']?></td>
                            <td><?= $infopres['start']?></td>
                            <td><?= $infopres['end']?></td>
                            <td><a href="/Alliance-Sociale/public/events/view/<?=$infopres['id'] ?>">Voir</a></td>

                        </tr>
                        <?php endforeach; ?> 
                    </tbody>



                </table>
            <a href="<?= $this->url('listPresentEvent') ?>">Voir tous les évènements présents</a>
            </div>

           <div class="table-responsive col-md-12 middle-pres">
            <h2>Liste des Evènements en cours :</h2>
            
                <table class="table table-hover">

                    <thead>
                        <tr class="success">
                            <th>Evènement</th>
                            <th>Titre</th>
                            <th>Voir l'évènement</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($infospres as $infopres): ?>
                        <tr class="info">
                            <td>

                            <img src="/Alliance-Sociale/public/<?=$infopres['picture'] ?>" alt="<?= $infopres['title']?>" class="thumbnail img-home" data-toggle="modal" data-target="#lightbox" height="200px" width="200px">

                            </td>
                            <td><?= $infopres['title']?></td>
                            <td><a href="/Alliance-Sociale/public/events/view/<?=$infopres['id'] ?>">Voir</a></td>

                        </tr>
                        <?php endforeach; ?> 
                    </tbody>



                </table>
            <a href="<?= $this->url('listPresentEvent') ?>">Voir tous les évènements présents</a>
            </div>
           
            <div class="table-responsive col-md-12 little-pres">
            <h2>Liste des Evènements en cours :</h2>
            
                <table class="table table-hover">

                    <thead>
                        <tr class="success">
                            <th>Evènement</th>
                            <th>Voir</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($infospres as $infopres): ?>
                        <tr class="info">
                            <td>

                            <img src="/Alliance-Sociale/public/<?=$infopres['picture'] ?>" alt="<?= $infopres['title']?>" class="thumbnail img-home" data-toggle="modal" data-target="#lightbox" height="200px" width="200px">

                            </td>
                            <td><a href="/Alliance-Sociale/public/events/view/<?=$infopres['id'] ?>">Voir</a></td>

                        </tr>
                        <?php endforeach; ?> 
                    </tbody>



                </table>
            <a href="<?= $this->url('listPresentEvent') ?>">Voir tous les évènements présents</a>
            </div>

            <div class="table-responsive col-md-12 big-past">
                <h2>Liste des Evènements passés :</h2>
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
                                    <td><img src="/Alliance-Sociale/public/<?=$infopas['picture'] ?>" alt="<?= $infopas['title']?>" class="thumbnail img-home"  data-toggle="modal" data-target="#lightbox" height="200px" width="200px"></td>
                                    <td><?= $infopas['title']?></td>
                                    <td><?= $infopas['content']?></td>
                                    <td><?= $infopas['start']?></td>
                                    <td><?= $infopas['end']?></td>
                                    <td><a href="/Alliance-Sociale/public/events/view/<?=$infopas['id'] ?>">Voir</a></td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>

                    </table> 

                    <a href="<?= $this->url('listPastEvent') ?>">Voir tous les évènements passés</a>  

                    </div>
                    
                    <div class="table-responsive col-md-12 middle-past">
                <h2>Liste des Evènements passés :</h2>
                    <table class="table table-hover">
                            <thead>
                                <tr class="success">
                                    <th>Evènement</th>
                                    <th>Titre</th>
                                    <th>Voir l'évènement</th>
                                </tr>
                            </thead>

                            <tbody>
                               <?php foreach($infospas as $infopas): ?>
                                <tr class="warning">
                                    <td><img src="/Alliance-Sociale/public/<?=$infopas['picture'] ?>" alt="<?= $infopas['title']?>" class="thumbnail img-home"  data-toggle="modal" data-target="#lightbox" height="200px" width="200px"></td>
                                    <td><?= $infopas['title']?></td>
                                    <td><a href="/Alliance-Sociale/public/events/view/<?=$infopas['id'] ?>">Voir</a></td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>

                    </table> 

                    <a href="<?= $this->url('listPastEvent') ?>">Voir tous les évènements passés</a>  

                    </div>
                    
                    <div class="table-responsive col-md-12 little-past">
                        <h2>Liste des Evènements passés :</h2>
                    <table class="table table-hover">
                            <thead>
                                <tr class="success">
                                    <th>Evènement</th>
                                    <th>Voir</th>
                                </tr>
                            </thead>

                            <tbody>
                               <?php foreach($infospas as $infopas): ?>
                                <tr class="warning">
                                    <td><img src="/Alliance-Sociale/public/<?=$infopas['picture'] ?>" alt="<?= $infopas['title']?>" class="thumbnail img-home"  data-toggle="modal" data-target="#lightbox" height="200px" width="200px"></td>
                                    <td><a href="/Alliance-Sociale/public/events/view/<?=$infopas['id'] ?>">Voir</a></td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>

                    </table> 

                    <a href="<?= $this->url('listPastEvent') ?>">Voir tous les évènements passés</a>  

                    </div>            

       </div>
    </div>

<?php $this->stop('main_content'); 

?>