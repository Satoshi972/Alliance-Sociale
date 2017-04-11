<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],


		#gestion_medias#
		
		// Ajouts médias
		['GET|POST', '/medias', 'Medias#addMedias', 'addmedias'],
		// Listes Médias
		['GET|POST', '/medias/list/[i:pages]', 'Medias#listMedias', 'listmedias'],

	);