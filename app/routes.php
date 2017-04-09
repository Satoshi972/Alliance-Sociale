<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		#Gestion dess information du site
		['GET|POST', '/management', 'Site#home', 'update_site'],
	);