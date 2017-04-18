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
      <?php if(isset($infos)){
?>
    <div id='hide'>
		<?php echo $infos['firstname'].' '.$infos['lastname']; ?>, voulez vous vous déconnecter ? Vraiment ?

		
        <form id=checkform3 method=post>
            
            <input type=hidden value="lol">
            <button type=submit id="submitform2" class="btn btn-primary">Oui je veux me déconnecter</button>
            
        
       </form>
</div>

<?php 



}else{ ?>
	<p style="color:red">
		Tu n'es pas connecté !!!

		
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
            
         
            
           
            
            // Suppression utilisateur avec DOM modifié à la volé
	$('body').on('click', 'a.deleteContact', function(element){
		element.preventDefault(); // Bloque l'action par défaut de l'élement

		$.ajax({
			method: 'post',
			url: '<?= $this->url('ajaxDeleteContact') ?>',
			data: {id_user: $(this).data('id')}, 
			success: function(resultat){
				$('#mon_resultat').html(resultat); 
                
			
			 }
		});
	}); 
            
            $('#submitForm').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("ajax_login") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
                    }
                });
            });
            
            $('#ask_token').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform2'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("ajax_ask_token") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
                    }
                });
            });
        
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
                    }
                });
            });
            
            /*$('#submitform3').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform4'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("updateCheck") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
                    }
                });
            }); */
            
            $('#new_mdp').click(function(el){
                el.preventDefault(); // On bloque l'action par défaut

                var form_user = $('#checkform4'); // On récupère le formulaire
                $.ajax({
                    method: 'post',
                    url: '<?= $this->url("ajax_resetpsw") ?>',
                    data: form_user.serialize(), // On récupère les données à envoyer
                    success: function(resultat){
                        $('#result').html(resultat);
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
                    }
                });
            });
            
            
            
        });
</script> 


<?php
    $this->stop('script');
?>