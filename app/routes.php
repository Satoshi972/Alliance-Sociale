<?php
	
	$w_routes = array(
		#gestion des activites
		['GET', '/activities', 'Activities#activities', 'default_activities'],

		['GET', '/home', 'Default#home', 'default_home'],
		// ['GET', '/activity/', 'Activity#activity', 'default_activity'],
		
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
		//Gestion des Partenaires
			//Vue du slide
		['GET|POST', '/partners/list', 'Partners#partners', 'partners'],
			//Ajout des Partenaires
		['GET|POST', '/partners/add', 'Partners#addPartners', 'add_partners'],
			//Modification des Partenaires
		['GET|POST', '/partners/update/[i:id]', 'Partners#updatePartners', 'update_partners'],
			//Suppression des Partenaires
		['GET|POST', '/partners/del/[i:id]', 'Partners#delPartners', 'del_partners'],

		#Gestion des évenements
        // ['GET|POST','/events',               'Events#home',        'chooseEvent'],
        ['GET|POST','/events',               'Events#listEvents',  'listEvent'],
        ['GET|POST','/events/listAll',       'Events#jsonEvent',   'listAllEvent'],
        ['GET|POST','/events/add',           'Events#addEvent',    'addEvent'],
        ['GET|POST','/events/view/[i:id]',   'Events#viewEvent',   'viewEvent'],
        ['GET|POST','/events/update/[i:id]', 'Events#updateEvent', 'updateEvent'],
        ['GET|POST','/events/delete/[i:id]', 'Events#deleteEvent', 'deleteEvent'],
	);