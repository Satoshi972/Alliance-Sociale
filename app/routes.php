<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		#Gestion des information du site
		['GET|POST', '/management', 			  'Site#home', 		 'view_site'],
		['GET|POST', '/management/update/[i:id]', 'Site#updateInfo', 'update_site'],

		#Gestion d "A propos"
		['GET|POST', '/about', 			  	 'About#home', 		 'view_about'],
		['GET|POST', '/about/update/[i:id]', 'About#updateInfo', 'update_about'],
	);