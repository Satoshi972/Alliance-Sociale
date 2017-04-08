<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/activities/', 'Activities#activities', 'default_activities'],


		#gestion_medias
		['GET'| 'POST', '/medias', 'Medias#add', 'media_home'],
	);