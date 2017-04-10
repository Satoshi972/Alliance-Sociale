<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		// Gestions des utilisateurs
			//Ajout
		['GET|POST', '/users', 'Users#addUsers', 'default_add_users'],
			//List users
		['GET|POST', '/users/list', 'Users#listUsers', 'list_users'],
			//Détails users
		['GET|POST', '/users/details/[i:id]', 'Users#detailsUsers', 'details_users'],
			//Update users
		['GET|POST', '/users/details/update/[i:id]', 'Users#updateUsers', 'update_users'],
			//Del users
		['GET|POST', '/users/details/delete/[i:id]', 'Users#delUsers', 'del_users'],

		#gestion_medias
		['GET|POST', '/medias', 'Medias#addMedias', 'default_medias'],

	);