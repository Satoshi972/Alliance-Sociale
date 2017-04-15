<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/activity/', 'Activity#activity', 'default_activity'],


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
        
         #Routes contacts
        ['GET|POST','/contactlist', 'Contact#contactList', 'contactList'],
        ['GET|POST','/deletecontact', 'Contact#ajaxDeleteContact', 'ajaxDeleteContact'],
        ['GET|POST','/loadcontact', 'Contact#ajaxLoadContact', 'ajaxLoadContact'],
        ['GET|POST','/updatecheck', 'Contact#updateCheck', 'updateCheck'],


        #Activités
        ['GET|POST', '/activite', 'Activity#addActivity', 'add_activite'], //Ajout
        ['GET|POST', '/activite/list', 'Activity#listActivity', 'list_activite'], 
        ['GET|POST', '/activite/details/[i:id]', 'Activity#detailsActivity', 'details_activite'], 
        ['GET|POST', '/activite/detail/update/[i:id]', 'Activity#updateActivity', 'update_activite'], 
        ['GET|POST', '/activite/detail/delete/[i:id]', 'Activity#delActivity', 'del_activite'],

	);