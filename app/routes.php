<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/activity/', 'Activity#activity', 'default_activity'],


		#gestion_medias
		['GET'| 'POST', '/medias', 'Medias#add', 'media_home'],
	);