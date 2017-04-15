<?php 
$this->layout('layout_back', ['title'=>'Liste des posts']);
$this->start('main_content');
?>
<table class="table table-striped">
<thead>
    <tr>
        <th>Sujet</th>
        <th>Date</th>
    </tr>
</thead>
<tbody>
<?php 
foreach ($list as $key => $value):
?>
    <tr>

    <td><?php echo $value['subject'] ?></td>
    <td><?php echo $value['date'] ?></td>

    <td><a class="detail" data-id="<?php echo $value['id']; ?>" href="<?php echo $this->url('detail_activity', ['id' => $value['id']]); ?>"><button class="btn btn-info" data-toggle="modal" data-target="detail_activity">Voir plus</button></a></td>


    <td><a class="delete" data-id="<?php echo $value['id']; ?>" href="<?php echo $this->url('delete_activity', ['id' => $value['id']]); ?>"><button class="btn btn-danger">Supprimer</button></a></td>

    </tr>
<?php 
endforeach;
?>
</tbody>
    
</table>

<?php 
$this->stop('main_content');
?>