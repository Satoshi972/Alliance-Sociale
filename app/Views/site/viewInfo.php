<?php 
$this->layout('layout', ['title' => 'Information du site']);

$this->start('main-content');
?>

	<legend class="text-center">Information du site</legend>
	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Logo</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $this->assetUrl($info['logo']);  ?>" alt="logo"></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Header</h4>
	<p class="list-group-item-text"><img class="img-responsive img-rounded" src="/Alliance-Sociale/public/<?= $this->assetUrl($info['header']);  ?>" alt="header"></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Addresse</h4>
	<p class="list-group-item-text"><?= $infos['address'];?></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Horaire</h4>
	<p class="list-group-item-text"><?=$infos['schedule'];?></p>
	</div>

	<div class="list-group-item text-center">
	<h4 class="list-group-item-heading">Telephone</h4>
	<p class="list-group-item-text"><?=$infos['phone'];?></p>
	</div>
		<div class="container">
  <h2>Small Modal</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
	<div class="text-center">
		<a href="<?=$this->url('update_site',['id'=>$infos['id']]) ?>">
			<button class="btn btn-info">Modification</button>
		</a>
	</div>

<?php
$this->stop('main-content');
?>