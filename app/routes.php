<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		#gestion_medias
		['GET'| 'POST', '/medias', 'Medias#add', 'default_home'],
	);