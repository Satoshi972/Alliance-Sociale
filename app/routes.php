<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		// Gestions des utilisateurs
		['GET|POST', '/users', 'Users#addUsers', 'default_add_users'],
	);