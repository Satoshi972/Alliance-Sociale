<?php $this->layout('layout_front', ['title' => 'Liste past event']) ?>


<?php $this->start('main_content') ?>




      <div class="table-responsive col-md-12 big-past">
          
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
            
            <div class="table-responsive col-md-12 middle-past">
          
      <h1 style='text-align:center'>Liste des évènements passés</h1>

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
                        <td><img src="http://localhost/Alliance-Sociale/public/<?=$infopas['picture'] ?>" alt="<?= $infopas['title']?>" class="thumbnail img-home"  data-toggle="modal" data-target="#lightbox" height="200px" width="200px"></td>
                        <td><?= $infopas['title']?></td>
                        <td><a href="http://localhost/Alliance-Sociale/public/events/view/<?=$infopas['id'] ?>">Voir</a></td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>    
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
                                    <td><img src="http://localhost/Alliance-Sociale/public/<?=$infopas['picture'] ?>" alt="<?= $infopas['title']?>" class="thumbnail img-home"  data-toggle="modal" data-target="#lightbox" height="200px" width="200px"></td>
                                    <td><a href="http://localhost/Alliance-Sociale/public/events/view/<?=$infopas['id'] ?>">Voir</a></td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>

                    </table>
            </div>
    
<?php $this->stop('main_content'); 

?>