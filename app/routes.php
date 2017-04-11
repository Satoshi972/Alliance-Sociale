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
		['GET|POST', '/partners', 'Partners#partners', 'partners'],
			//Ajout de partenaires
		['GET|POST', '/partners/add', 'Partners#addPartners, add_partners'],

	);