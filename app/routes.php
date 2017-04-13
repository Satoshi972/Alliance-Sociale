<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		# Gestions des utilisateurs			
		['GET|POST', '/users', 'Users#addUsers', 'add_users'], //Ajout
		['GET|POST', '/users/list', 'Users#listUsers', 'list_users'], //List users
		['GET|POST', '/users/details/[i:id]', 'Users#detailsUsers', 'details_users'], //Détails users
		['GET|POST', '/users/details/update/[i:id]', 'Users#updateUsers', 'update_users'], //Update users
		['GET|POST', '/users/details/delete/[i:id]', 'Users#delUsers', 'del_users'], //Del users

		#gestion_medias		
		['GET|POST', '/medias', 'Medias#addMedias', 'addmedias'], // Ajouts médias
		['GET|POST', '/medias/list', 'Medias#listMedias', 'listmedias'], // Listes Médias

        
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

	);