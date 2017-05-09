<?php 
$this->layout('layout_back',['title'=>'Statistique adhérent']);
$this->start('head');
?>
<style>
figure
{
	position : relative;
}
.name
{
	/*position : absolute;*/
	top: 0;
	background : rgba(0,0,0,0.5);
	color: white;
	position: center !important;
}
.number
{
	/*position : absolute;*/
	bottom: 0;
	background : rgba(0,0,0,0.5);
	color: white;
	position: center !important;
}
</style>
<?php
$this->stop('head');
$this->start('main_content');
?>
<section class="col-xs-12 jumbotron">
	<legend class="text-center">Statistiques sur les utilisateurs</legend>
	<p id="total"></p>
	<p id="totalA"></p>
</section>
<section id="users" class="col-xs-12"></section>
<?php 
$this->stop('main_content');
$this->start('script');
?>
<script src="<?= $this->assetUrl('js/statistic.js')?>"></script>
<script>
$(function()
{
	nbrPoeplesByActivity();
	nbrTotal();
	nbrTotalA();
});
</script>
<?php 
$this->stop('script');
?>