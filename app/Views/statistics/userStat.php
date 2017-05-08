<?php 
$this->layout('layout_back',['title'=>'Statistique adhérent']);
$this->start('main_content');
?>
<section id="users"></section>
<?php 
$this->stop('main_content');
$this->start('script');
?>
<script src="<?= $this->assetUrl('js/statistic.js')?>"></script>
<script>
$(function()
{
	nbrPoeplesByActivity()

});
</script>
<?php 
$this->stop('script');
?>