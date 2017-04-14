<?php $this->layout('layout_back', ['title' => 'Se connecter']) ?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
        <h1>Entrez vos identifiants !</h1>
        
       

    <div id="result"></div>

	<form method="post" id="checkform">

		<label for="ident">E-mail :</label>
		<input type="email" name="ident" id="ident">


		<br>
		<label for="password">Mot de passe :</label>
		<input type="password" name="password" id="password"> 


		<br>
		<button type="submit" id="submitForm">Se connecter</button>
	</form>
    
     
 <?php  
    
$this->stop('main_content');

$this->start('script');

?>


<script>
        $(function(){
            
         
            
            $.getJSON("<?= $this->url('ajaxLoadContact') ?>", function(result){
			console.log(result); // équivalent à un var_dump()

			var resHTML = '';

			$.each(result, function(key, value){
				resHTML+= '<tr>';
				
                    if (value.staut == 0){resHTML+='<td>Non Lu</td>';} else {resHTML+='<td>Lu</td>';} 
                    
                    
				resHTML+= '<td>'+value.title+'</td>';
				resHTML+= '<td>'+value.mail+'</td>';
				resHTML+= '<td>'+value.date+'</td>';
                resHTML+= '<td><a href="#" class="viewContact" data-id="'+value.id+'">Voir</td>';
				resHTML+= '<td><a href="#" class="deleteContact" data-id="'+value.id+'">Supprimer</td>';
				resHTML+= '</tr>';
                
			});

			$('#contactsAjax').html(resHTML);
		});	
            
            // Suppression utilisateur avec DOM modifié à la volé
	$('body').on('click', 'a.deleteContact', function(element){
		element.preventDefault(); // Bloque l'action par défaut de l'élement

		$.ajax({
			method: 'post',
			url: '<?= $this->url('ajaxDeleteContact') ?>',
			data: {id_user: $(this).data('id')}, 
			success: function(resultat){
				$('#mon_resultat').html(resultat); 
                
				$.getJSON("<?= $this->url('ajaxLoadContact') ?>", function(result){
			console.log(result); // équivalent à un var_dump()

			var resHTML = '';

			$.each(result, function(key, value){
				resHTML+= '<tr>';
				resHTML+= '<td>'+
                    
                    
                    
                    value.staut+'</td>';
				resHTML+= '<td>'+value.title+'</td>';
				resHTML+= '<td>'+value.mail+'</td>';
				resHTML+= '<td>'+value.date+'</td>';
                resHTML+= '<td><a href="#" class="viewContact" data-id="'+value.id+'">Voir</td>';
				resHTML+= '<td><a href="#" class="deleteContact" data-id="'+value.id+'">Supprimer</td>';
				resHTML+= '</tr>';
                
			});

			$('#contactsAjax').html(resHTML);
		});	
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

