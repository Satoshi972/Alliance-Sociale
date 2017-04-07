<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		// Gestions des utilisateurs
			//Ajout
		['GET|POST', '/users', 'Users#addUsers', 'default_add_users'],
			//List
		['GET|POST', '/users/list', 'Users#listUsers', 'list_users'],
			//Détails
		['GET|POST', '/users/details/[i:id]', 'Users#detailsUsers', 'details_users'],
	);