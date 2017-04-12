<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		#Gestion dess information du site
		['GET|POST', '/management', 			  	  'Site#home', 	 'view_site'],
		['GET|POST', '/management/updateInfo/[i:id]', 'Site#update', 'update_site'],

		#Gestion du "a propos"
		['GET|POST', '/about', 				 	 'About#home', 	 	 'view_about'],
		['GET|POST', '/about/updateInfo/[i:id]', 'About#update',     'update_about'],
	);