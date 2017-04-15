// On place dans une fonction qu'on peut appeler autant de fois qu'on le souhaite
	function loadContacts(){
		// Permet de récupérer des données au format JSON
		$.getJSON("<?= $this->url('ajaxLoadContact') ?>", function(result){
			console.log(result); // équivalent à un var_dump()


			var resHTML = '';

			$.each(result, function(key, value){
				resHTML+= '<tr>';
				resHTML+= '<td>'+value.staut+'</td>';
				resHTML+= '<td>'+value.title+'</td>';
				resHTML+= '<td>'+value.mail+'</td>';
				resHTML+= '<td>'+value.date+'</td>';
                resHTML+= '<td><a href="#" class="viewContact" data-id="'+value.id+'">Voir</td>';
				resHTML+= '</tr>';
				resHTML+= '<td><a href="#" class="deleteContact" data-id="'+value.id+'">Supprimer</td>';
				resHTML+= '</tr>';
                
			});

			$('#contactsAjax').html(resHTML);
		});		
	}

$(function(){ // équivalent $(document).ready(function(){


	// Suppression utilisateur classique
	$('a.deleteUser').click(function(element){
		element.preventDefault(); // Bloque l'action par défaut de l'élement

		$.ajax({
			method: 'post',
			url: 'inc/ajax_del_user.php',
			// id_user => deviendra la clé de la superglobale en php : $_POST['id_user']
			// $(this).data('id') => récupère la valeur de l'attribut data-id du lien
			data: {id_user: $(this).data('id')}, 
			success: function(resultat){
				// 'resultat' provient de la page php.. Soit un message d'erreur, soit de réussite.. en fonction de nos éventuels "echo"
				$('#mon_resultat').html(resultat);
			}
		});
	});

	// Suppression utilisateur avec DOM modifié à la volé
	$('body').on('click', 'a.deleteUser', function(element){
		element.preventDefault(); // Bloque l'action par défaut de l'élement

		$.ajax({
			method: 'post',
			url: 'inc/ajax_del_user.php',
			data: {id_user: $(this).data('id')}, 
			success: function(resultat){
				$('#mon_resultat').html(resultat);
				loadUsers();
			}
		});
	});


});