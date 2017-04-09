<?php $this->layout('layout', ['title' => 'Les utilisateurs']) ?>

  <?php $this->start('main_content') ?>

    <table>
      <thead>
        <tr>

          <th>Id</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($users as $user): ?>
          <tr>
            <th>
              <?=$user['id'];?>
            </th>
            <th>
              <?=$user['lastname'];?>
            </th>
            <th>
              <?=$user['firstname'];?>
            </th>

			<th>
			<a href="<?= $this->url('details_users', ['id' => $user['id']]) ?>" rel="modal:open">Détails</a>
			</th>


            <!--Détails users-->
            <th>
              <button id="myBtn">Détails</button>

              <!-- The Modal -->
              <div id="myModal" class="modal">
              <!-- <div id="<?php //echo $this->url('details_users', ['id' => $user['id']]) ?>" style="display: none"> -->

                <!-- Modal content -->
                <div class="modal-content">
                  <!-- <span class="close">&times;</span> -->

				  <h2>Détails</h2>
                  <p>
                    <?=$user['firstname']; ?>
                  </p>

                  <p>
                    <?=$user['lastname']; ?>
                  </p>

                  <p>
                    <?=$user['email']; ?>
                  </p>

                  <p>
                    <?=$user['phone']; ?>
                  </p>

                  <p>
                    <?=$user['role']; ?>
                  </p>

                  <a href="<?= $this->url('update_users', ['id' => $user['id']]) ?>">Modifier</a> |
                  <a href="<?= $this->url('del_users', ['id' => $user['id']]) ?>">Supprimer</a>
                </div>

              </div>
            </th>
          </tr>
          <?php endforeach; ?>

      </tbody>
    </table>

    <?php $this->stop('main_content') ?>