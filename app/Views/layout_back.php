<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $this->e($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">        
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?= $this->assetUrl('css/simple-sidebar.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/styles.css') ?>">

   
   <style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
    <!-- Permet des inclusions dans mon head depuis la vue -->
    
    <?php echo $this->section("head") ?>
</head>
<body>




<!-- <div class="nav-side-menu">
    <div class="brand">Espace Administration</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <!-- <li>
                  <a href="#">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li> -->

                <!--<li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a href="#"><i class="fa fa-users fa-lg"></i> Gestion des utilisateurs <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="#">Création</a></li>
                    <li><a href="#">Suppression</a></li>
                    <li><a href="#">Modification</a></li>
                    <li><a href="#">Détails de l'utilisateur</a></li>
                    <li><a href="#">Contact Direct</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Gestion des Activités <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <li>Création des Activités</li>
                  <li>Suppression des Activités</li>
                  <li>Modification des Activités</li>
                  <li>Détails de l'activité</li>
                  <li>Association Médias</li>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"><i class="fa fa-car fa-lg"></i> Gestion fiche de contact <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li>Liste des fiches</li>
                  <li><a href="#">Détails de de la fiche</a>
                        <ul>
                            <li><a href="#">Marquer comme lu</a></li>
                            <li><a href="#">Suppression</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Recherche mot clé</a></li>
                    </ul>


                    <li data-toggle="collapse" data-target="#events" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Gestion des Evènements <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="events">
                  <li>Création Evènements</li>
                  <li>Suppression Evènements</li>
                  <li>Modification Evènements</li>
                  <li>Détails Evènements</li>
                  <li>Association Médias</li>
                </ul>


            </ul>
     </div>
</div> -->

        <div>
            <?= $this->section('main_content') ?>
        </div>
          

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="<?= $this->assetUrl('js/jquery.min.js') ?>"></script>
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script>
        $(function(){
            
            $.getJSON("<?= $this->url('ajaxLoadContact') ?>", function(result){
			console.log(result); // équivalent à un var_dump()

			var resHTML = '';

			$.each(result, function(key, value){
				resHTML+= '<tr>';
				resHTML+= '<td>'+
                    /*<?php if (value === 0){ echo 'Non Lu';} else {echo 'Lu';} ?> */
                    
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

<!-- Permet des inclusions de scripts depuis la vue -->
    <?php echo $this->section("script") ?>
</body>
</html>