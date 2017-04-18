<?php $this->layout('layout_front', ['title' => 'Se connecter']) ?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
        
        

  <div class="row">
     <div class="col-md-6 col-md-offset-3">
    <div class="col-md-12">
     <!--    <div class="col-md-12 jumbotron">    -->

   <h1>Entrez vos identifiants !</h1>
    <div id="result"></div>

	<form method="post" id="checkform">
        <div class="form-group">
		<label for="ident">E-mail :</label>
		<input type="email" name="ident" id="ident" class="form-control">
        </div>

		<div class="form-group">
		<label for="password">Mot de passe :</label>
		<input type="password" name="password" id="password" class="form-control"> 
        </div>

		<br>
		<button type="submit" id="submitForm" class="btn btn-primary">Se connecter</button>
	</form>
    <a href="<?= $this->url('ask_token') ?>">Mot de passe oublié ?</a> 
<!--           </div> -->
        </div>
      </div>
    </div>

 
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
                        form_user.find('input').val(''); // Permet de vider les champs du formulaire.. 
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

