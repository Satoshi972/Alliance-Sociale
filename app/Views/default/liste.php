<?php $this->layout('layout', ['title' => '']) ?>

<?php $this->start('main_content') ?>

        <meta charset="utf-8">
        <title>Liste des activités</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--        <link rel="stylesheet" href="assets/css/style.css">-->
    </head>

    <body>

            <br>

            <div class="container2">
                <h2>Les Activités Existantes</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Categorie</th>
                            <th>Visualiser</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- foreach permettant d'avoir une ligne <tr> par ligne SQL -->
                        <?php foreach($toto as $activity): ?>
                            <tr>
                                <td>
                                    <?=$activity['id']; ?>
                                </td>
                                <td>
                                    <img class="vignette" src="<?= $this->assetUrl($activity['picture']); ?>" alt="Aperçu"/>
                                </td>
                                <td>
                                    <?=$activity['name']; ?>
                                </td>

                                <td>
                                    <a href="<?= $this->url('default_viewActivity', ['id' => $activity['id']]) ?>"class="btn btn-default">Détails de l'activité</a>
                                </td>
                                <td>
                                    <a href="delete_activity.php?id=<?=$activity['id']; ?>"class="btn btn-default">Supprimer</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
    </body>

    </html>
<?php $this->stop('main_content') ?>