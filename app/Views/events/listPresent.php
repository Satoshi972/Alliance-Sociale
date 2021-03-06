<?php $this->layout('layout_front', ['title' => 'Liste present event']) ?>


<?php $this->start('main_content') ?>


      <div class="table-responsive col-md-12 big-pres">
     
      <h1 style='text-align:center'>Liste des évènements présents</h1>


        <table class="table table-hover">
                <thead>
                    <tr class="success">
                        <th>Evènement</th>
                        <th>Titre</th>
                        <th>Détails</th>
                        <th>Depuis</th>
                        <th>Jusqu'à</th>
                        <th>Voir l'évènement</th>
                    </tr>
                </thead>

                <tbody>
                   <?php foreach($infospres as $infopres): ?>
                    <tr class="info">
                        <td>

                        <img src="/Alliance-Sociale/public/<?=$infopres['picture'] ?>" alt="<?= $infopres['title']?>" class="thumbnail img-home" data-toggle="modal" data-target="#lightbox"height="200px" width="200px">

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
        </div>
        
        <div class="table-responsive col-md-12 middle-pres">
     
      <h1 style='text-align:center'>Liste des évènements présents</h1>


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

                        <img src="/Alliance-Sociale/public/<?=$infopres['picture'] ?>" alt="<?= $infopres['title']?>" class="thumbnail img-home" data-toggle="modal" data-target="#lightbox"height="200px" width="200px">

                        </td>
                        <td><?= $infopres['title']?></td>
                        <td><a href="/Alliance-Sociale/public/events/view/<?=$infopres['id'] ?>">Voir</a></td>

                    </tr>
                    <?php endforeach; ?> 
                </tbody>
        </table>
        </div>
        
        <div class="table-responsive col-md-12 little-pres">
     
      <h1 style='text-align:center'>Liste des évènements présents</h1>


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

                        <img src="/Alliance-Sociale/public/<?=$infopres['picture'] ?>" alt="<?= $infopres['title']?>" class="thumbnail img-home" data-toggle="modal" data-target="#lightbox"height="200px" width="200px">

                        </td>
                        <td><a href="/Alliance-Sociale/public/events/view/<?=$infopres['id'] ?>">Voir</a></td>

                    </tr>
                    <?php endforeach; ?> 
                </tbody>
        </table>
        </div>
        
  
<?php $this->stop('main_content'); 

?>