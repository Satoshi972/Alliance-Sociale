<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		// Gestions des utilisateurs
			//Ajout users
		['GET|POST', '/users', 'Users#addUsers', 'add_users'],
			//List users
		['GET|POST', '/users/list', 'Users#listUsers', 'list_users'],
			//Détails users
		['GET|POST', '/users/details/[i:id]', 'Users#detailsUsers', 'details_users'],
			//Update users
		['GET|POST', '/users/details/update/[i:id]', 'Users#updateUsers', 'update_users'],
			//Del users
		['GET|POST', '/users/details/delete/[i:id]', 'Users#delUsers', 'del_users'],

		 //Gestion_medias
		['GET|POST', '/medias', 'Medias#addMedias', 'default_medias'],

		//Gestion des Partenaires
			//Vue du slide
		['GET|POST', '/partners/list', 'Partners#partners', 'partners'],
			//Ajout des Partenaires
		['GET|POST', '/partners/add', 'Partners#addPartners', 'add_partners'],
			//Modification des Partenaires
		['GET|POST', '/partners/update/[i:id]', 'Partners#updatePartners', 'update_partners'],
			//Suppression des Partenaires
		['GET|POST', '/partners/del', 'Partners#delPartners', 'del_partners'],
	);