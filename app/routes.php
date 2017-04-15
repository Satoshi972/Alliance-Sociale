<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		#Gestion dess information du site
		['GET|POST', '/management/site', 		  	  'Site#home', 		 'view_site'],
		['GET|POST', '/management/updateSite/[i:id]', 'Site#updateInfo', 'update_site'],

		#Gestion dess information du a propos
		['GET|POST', '/management/aboutUs', 	  	  	 'AboutUs#home', 		'view_about'],
		['GET|POST', '/management/updateAboutUs/[i:id]', 'AboutUs#updateAbout', 'update_about'],
	);