<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/activities/', 'Activities#activities', 'default_activities'],


		#gestion_medias#
		
		// Ajouts médias
		['GET|POST', '/medias', 'Medias#addMedias', 'addmedias'],
		// Listes Médias
		['GET|POST', '/medias/list', 'Medias#listMedias', 'listmedias'],

	);