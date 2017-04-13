<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/activity/', 'Activity#activity', 'default_activity'],




		#gestion_medias#
		
		// Ajouts médias
		['GET|POST', '/medias', 'Medias#addMedias', 'addmedias'],
		// Listes Médias
		['GET|POST', '/medias/list/[i:page]', 'Medias#listMedias', 'listmedias'],

        
        #Routes login-logout
        ['GET|POST','/login', 'User#login', 'login'],
        ['GET|POST','/ajax_login', 'User#ajax_login', 'ajax_login'],
        ['GET|POST','/logout', 'User#logout', 'logout'],
        ['GET|POST','/ajax_logout', 'User#ajax_logout', 'ajax_logout'],
        
        #Routes du token et du resetpsw
        ['GET|POST','/token', 'token#ask_token', 'ask_token'],
        ['GET|POST','/token/', 'token#ajax_ask_token', 'ajax_ask_token'],
        ['GET|POST','/resetpsw', 'token#resetpsw', 'resetpsw'],
        ['GET|POST','/resetpsw/', 'token#ajax_resetpsw', 'ajax_resetpsw'],

        #Contact front
        ['GET|POST', '/contact_front', 'ContactFront#addContact', 'contactfront'],

	);