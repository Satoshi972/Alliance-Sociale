<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		#gestion_medias#
		['GET|POST', '/medias', 'Medias#addMedias', 'addmedias'], // Ajouts médias
		['GET|POST', '/medias/list/[i:page]', 'Medias#listMedias', 'listMedias'], // Listes Médias
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

	);