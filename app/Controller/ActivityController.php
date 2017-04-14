<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ActivityModel;
use Respect\Validation\Validator as v;
use Model\categoryModel;

class ActivityController extends MasterController
{

	public function addActivity()
	{	
		$errors = [];
        $post = [];
        $success = false;
         $maxSize = (1024 * 1000) * 2;

        $uploadDir = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/'; // Répertoire d'upload
        $mimeTypeAvailable = ['image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'];

		$categoryModel = new categoryModel();
		$category = $categoryModel->findAll();

		$params = [
		'category' => $category
		];

		$this->show('activite/add_activity', $params);


		if(!empty($_POST)) {
            
            $post = array_map('trim', array_map('strip_tags', $_POST));
            
            $err = [
            //On vérifie que lastname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alpha('-.')->length(2, 30)->validate($post['name'])) ? 'L\'Activité est invalide' : null,
            
            //On vérifie que firstname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alpha('-.')->length(2, 30)->validate($post['content'])) ? 'Le prénom est invalide' : null,
            
            ];
            
            $errors = array_filter($err);

			if(isset($_FILES['picture']) && $_FILES['picture']['error'] === 0){

				$finfo = new \finfo();
				$mimeType = $finfo->file($_FILES['picture']['tmp_name'], FILEINFO_MIME_TYPE);

				$extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

				if(in_array($mimeType, $mimeTypeAvailable)){

					if($_FILES['picture']['size'] <= $maxSize){

						if(!is_dir($uploadDir)){
							mkdir($uploadDir, 0755);
						}

						$newPictureName = uniqid('picture_').'.'.$extension;

						if(!move_uploaded_file($_FILES['picture']['tmp_name'], $uploadDir.$newPictureName)){
							$errors[] = 'Erreur lors de l\'upload de la photo';
						}
					}
					else {
						$errors[] = 'La taille du fichier excède 2 Mo';
					}

				}
				else {
					$errors[] = 'Le fichier n\'est pas une image valide';
				}
			}
			else {
				$errors[] = 'Aucune photo sélectionnée';
			}

            
            if(count($errors) === 0){
                
                $datas = [
                // colonne sql => valeur à insérer
                'name'=> $post['name'],
                'category' => $post['category'],
                'content'    => $post['content'],
                'picture'    => $post['picture'],
                ];
                
                //Intègre les donnés dans la base
                $enter = new PartnersModel();
                $enter->insert($datas);
                
                $success = true;
            }
            else
            {
                $textErrors = implode('<br>', $errors);
            }
            
        }
        // Les variables que l'on transmet à la vue. Les clés du tableau ci-dessous deviendront les variables qu'on utilisera dans la vue.
        
        $params = [
        'success' => $success,
        'errors'  => $errors,
        ];
        
        $this->show('users/add_users', $params);


	}

/*   public function addUsers(){
        
        $enter = new UsersModel();
        $errors = [];
        $post = [];
        $success = false;
        
        if(!empty($_POST)) {
            
            $post = array_map('trim', array_map('strip_tags', $_POST));
            
            $err = [
            //On vérifie que lastname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alpha('-.')->length(2, 30)->validate($post['lastname'])) ? 'Le nom de famille est invalide' : null,
            
            //On vérifie que firstname ne soit pas vide et qu'il soit alphanumérique accceptant les tirets et les points, avec une taille comprise entre 2 et 30 caractères
            (!v::notEmpty()->alpha('-.')->length(2, 30)->validate($post['firstname'])) ? 'Le prénom est invalide' : null,
            
            //On vérifie que le champ email soit non vide et qu'il soit valide
            (!v::notEmpty()->email()->validate($post['email'])) ? 'L\'adresse email est invalide' : null,
            
            //On vérifie que la taille du mot de passe soit comprise entre 8 et 30 caractères
            (!v::notEmpty()->length(8, 30)->validate($post['password'])) ? 'Le mot de passe est invalide' : null,
            ];
            
            $errors = array_filter($err);
            
            if(count($errors) === 0){
                
                $datas = [
                // colonne sql => valeur à insérer
                'firstname'=> $post['firstname'],
                'lastname' => $post['lastname'],
                'email'    => $post['email'],
                'phone'    => $post['phone'],
                'role'     => $post['role'],
                'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                ];
                
                //Intègre les donnés dans la base
                $enter->insert($datas);
                
                $success = true;
            }
            else
            {
                $textErrors = implode('<br>', $errors);
            }
            
        }
        // Les variables que l'on transmet à la vue. Les clés du tableau ci-dessous deviendront les variables qu'on utilisera dans la vue.
        
        $params = [
        'success' => $success,
        'errors'  => $errors,
        ];
        
        $this->show('users/add_users', $params);

}*/

}