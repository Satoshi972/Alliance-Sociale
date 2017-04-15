<?php $this->layout('layout_back', ['title' => '']) ?>

<?php $this->start('main_content') ?>


         
                <h2>Les Catégories Existantes</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Visualiser</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        foreach permettant d'avoir une ligne <tr> par ligne SQL
                        <?php foreach($toto as $category): ?>
                            <tr>
                                <td>
                                    <?=$category['id']; ?>
                                </td>
                                <td>
                                    <img class="vignette" src="<?= $this->assetUrl($category['picture']); ?>" alt="Aperçu"/>
                                </td>
                                <td>
                                    <?=$category['name']; ?>
                                </td>

                                <td>
                                    <a href="<?= $this->url('default_viewCategory', ['id' => $category['id']]) ?>"class="btn btn-default">Détails de la catégorie</a>
                                </td>
                                <td>
                                    <a href="delete_category.php?id=<?=$category['id']; ?>"class="btn btn-default">Supprimer</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>


<?php $this->stop('main_content') ?>