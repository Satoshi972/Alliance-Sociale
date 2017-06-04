<?php $this->layout('layout_front', ['title' => 'Se déconnecter']) ?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="col-md-12">
        <!--   <div class="col-md-12 jumbotron">  -->  
        <h1>Déconnexion</h1>
        
        <div id="result"></div>
        <?php if(isset($infos)){ ?>
        <div id='hide'>
            <?php echo $infos['firstname'].' '.$infos['lastname']; ?>, voulez vous vous déconnecter ? Vraiment ?

            <form id=checkform3 method=post>

                <input type=hidden value="lol">
                <button type=submit id="submitform2" class="btn btn-primary">Oui je veux me déconnecter</button>


           </form>
        </div>

        <?php }else{ ?>
        <p style="color:red;">
            Vous n'êtes pas connecté !!!


        </p>
        <?php } ?>
        </div>
    </div>

</div>
 <!--  </div>
      </div> -->     
     
 <?php    
$this->stop('main_content'); 

$this->start('script');

?>


<script>
        $(function(){

             $('#submitform2').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform3'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("ajax_logout") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        $('#hide').hide(); // Permet de vider les champs du formulaire.. 
                        // location.reload();
                        document.location.href="<?= $this->url('default_home') ?>";
                    }
                });
            });

        });
</script> 


<?php
    $this->stop('script');
?>