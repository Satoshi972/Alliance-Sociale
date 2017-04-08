<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		#gestion_medias
		// Ajouts médias
		['GET|POST', '/medias', 'Medias#addMedias', 'default_medias'],
		// Listes Médias
		['GET|POST', '/medias', 'Medias#listMedias', 'default_listmedias'],
	);