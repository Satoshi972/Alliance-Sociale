<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		//Gestion dess information du site
		['GET|POST', '/management', 'Site#home', 'view_site'],
		['GET|POST', '/management/update/[i:id]', 'Site#updateInfo', 'update_site'],
	);