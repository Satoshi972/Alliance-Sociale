<?php
$w_routes = array(

	#pages d'accueil
	['GET', '/', 	  'Default#home',  'default_home'],
	['GET', '/admin', 'Default#admin', 'admin'],

	#gestion des activites
    ['GET|POST', '/activite', 'Activity#addActivity', 'add_activite'], //Ajout
    ['GET|POST', '/activite/list', 'Activity#listActivity', 'list_activite'], 
    ['GET|POST', '/activite/details/[i:id]', 'Activity#detailsActivity', 'details_activite'], 
    ['GET|POST', '/activite/detail/update/[i:id]', 'Activity#updateActivity', 'update_activite'], 
    ['GET|POST', '/activite/detail/delete/[i:id]', 'Activity#delActivity', 'del_activite'],
	
	# Gestions des utilisateurs			
	['GET|POST', '/users', 'Users#addUsers', 'add_users'], //Ajout
	['GET|POST', '/users/list', 'Users#listUsers', 'list_users'], //List users
	['GET|POST', '/users/details/[i:id]', 'Users#detailsUsers', 'details_users'], //Détails users
	['GET|POST', '/users/details/update/[i:id]', 'Users#updateUsers', 'update_users'], //Update users
	['GET|POST', '/users/details/delete/[i:id]', 'Users#delUsers', 'del_users'], //Del users

	#gestion_medias
	['GET|POST', '/medias', 'Medias#addMedias', 'addmedias'], // Ajouts médias
    ['GET|POST', '/medias/list/[i:page]',      'Medias#listMedias', 'listMedias'], // Listes Médias
	['GET|POST', '/medias/listBack/[i:page]',  'Medias#listMediasBack', 'listMediasBack'], // Listes Médias
	['GET|POST', '/medias/listGuest/[i:page]', 'Medias#listMediasGuest', 'listMediasGuest'], // Listes Médias pour invité
    ['GET|POST', '/medias/album', 'Medias#listAlbum',       'album'], // Listes Albums
	['GET|POST', '/medias/delete/[i:id]', 'Medias#deleteMedias', 	'deleteMedias'], // Listes Albums
	//['GET|POST', '/medias/album/[s:idE]', 'Medias#listMediasByCats', 'album_cat'], // Listes Médias


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
    ['GET|POST','/updatecheck', 'Contact#updateCheck', 'updateCheck'],

	#Gestion des Partenaires
	['GET|POST', '/partners/list', 'Partners#partners', 'partners'],//Vue du slide
	['GET|POST', '/partners/add', 'Partners#addPartners', 'add_partners'],//Ajout des Partenaires
	['GET|POST', '/partners/update/[i:id]', 'Partners#updatePartners', 'update_partners'],//Modification des Partenaires
	['GET|POST', '/partners/del/[i:id]', 'Partners#delPartners', 'del_partners'],//Suppression des Partenaires

    #Contact front
    ['GET|POST', '/contact_front', 'ContactFront#addContact', 'contactfront'],

    #Qui sommes nous
    ['GET|POST','/about', 'AboutFront#views', 'about'],

    #Adhesion
    ['GET|POST', '/accession', 'Front#accession', 'accession'], 

    #Gestion des évenements
    // ['GET|POST','/events',               'Events#home',        'chooseEvent'],
    ['GET|POST','/events',                   'Events#listEvents',       'listEvent'],
    ['GET|POST','/events/listAll',           'Events#jsonEvent',        'listAllEvent'],
    ['GET|POST','/events/add',               'Events#addEvent',         'addEvent'],
    ['GET|POST','/events/viewBack/[i:id]',   'Events#viewEvent',        'viewEvent'],
    ['GET|POST','/events/view/[i:id]',       'Events#viewEventFront',   'viewEventFront'],
    ['GET|POST','/events/update/[i:id]',     'Events#updateEvent',      'updateEvent'],
    ['GET|POST','/events/delete/[i:id]',     'Events#deleteEvent',      'deleteEvent'],
    ['GET|POST','/events/listPresent',       'Events#listPresent',      'listPresentEvent'],
    ['GET|POST','/events/listPast',          'Events#listPast',         'listPastEvent'],

	);