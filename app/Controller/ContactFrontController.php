<?php

namespace Controller;

use \W\Controller\Controller;
use Respect\Validation\Validator as v;

class ContactFrontController extends MasterController
{

    $enter = new ContactsModel();
    $errors = [];
    $post = [];
    $success = false;

	if(!empty($_POST)) {
    $post = array_map('trim', array_map('strip_tags', $_POST));
    $err = [
        //On vérifie que titre ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
        (!v::notEmpty()->alpha('-.')->length(2, 30)->validate($post['title'])) ? 'Le nom de famille est invalide' : null,
        
        //On vérifie que le champ email soit non vide et qu'il soit valide
        (!v::notEmpty()->email()->validate($post['email'])) ? 'L\'adresse email est invalide' : null,
        
        //On vérifie que lastname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
        (!v::notEmpty()->alpha('-.')->length(2, 30)->validate($post['content'])) ? 'Le nom de famille est invalide' : null,
    ];

    $errors = array_filter($err);

    if(count($errors) === 0){

        $datas = [
        'title'   => $post['title'],
        'email'   => $post['email'],
        'content' => $post['content'],
        ];
    	
        $enter->insert($datas);
               
            $success = true;
    }
    else {
        $textErrors = implode('<br>', $errors);
    }
    
	}

        $params = [
       'success' => $success,
       'errors'  => $errors,
       ];

       $this->show('medias/add_medias',$params);
}