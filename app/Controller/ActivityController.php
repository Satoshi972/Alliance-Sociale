<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\ActivityModel;


use Respect\Validation\Validator as v;


class ActivityController extends Controller
{
    public function activity()
    {
        $errors = [];
        $post = [];
        $maxSize = (1024 * 1000) * 2; // Taille maximum du fichier
        $uploadDir = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/'; // Répertoire d'upload
        $mimeTypeAvailable = ['image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'];
        //debug($_SERVER);
        
        
        
        if(!empty($_POST))
        { 
        
        $post = array_map('trim', array_map('strip_tags', $_POST)); 
        
        if(strlen($post['name']) < 2) {
        $errors[] = "Le champ Nom doit avoir au minimum 2 caractères";

        }    
        if(strlen($post['category']) < 2) {
        $errors[] = "Le champ Categorie doit avoir au minimum 2 caractères";

        }   
        
        if(isset($_FILES['picture']) && $_FILES['picture']['error'] === 0) {

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
        if(count($errors) === 0){

            $datafile = [
                'name' => $post['name'],
                'category' => $post['category'],
                'picture'=>'img/'.$newPictureName,
            ];
            $enter = new ActivityModel();
            $enter->insert($datafile);
        }
        else
        {
        $textErrors = implode('<br>', $errors);
        }        
    }
        $this->show('default/activity');
    }
    

  public function liste()
    {
        $activitiess = new ActivityModel();
        $vue = $activitiess->findAll();
        $this->show('default/liste',['toto'=>$vue]);
    }
    

    public function viewActivity($id)
    {
        // On instancie la class permettant de récupérer toutes les méthodes de BlogModel ou de \W\Model\Model
        $view = new ActivityModel(); 
        
        $rod = $view->find($id);
            
        
		$post = [];
		$errors = [];
		$success = false;
		// vérifications du formulaire
		if(!empty($_POST)){
    
			$post = array_map('trim', array_map('strip_tags', $_POST)); 

			if(!v::notEmpty()->length(5, null)->validate($post['name'])){
				$errors[] = 'Le titre doit comporter au moins 5 caractères';
			}
			if(!v::notEmpty()->length(20, null)->validate($post['body'])){
				$errors[] = 'Le contenu doit comporter au moins 20 caractères';
			}
            
var_dump($errors);
			if(count($errors) === 0){

				$datas = [
					// colonne sql => valeur à insérer
                    'name'		=> $post['name'],

                    'email'		=> $post['email'],
					'body'	    => $post['body'],
                    'page_id'	=> $id,
                    
				];
                
                				
				if($com->insert($datas)){ // On passe le tableau $data
					$success = true;
				}

			}
		}

		// Les variables que l'on transmet à la vue. Les clés du tableau ci-dessous deviendront les variables qu'on utilisera dans la vue.
		// Ligne 1, pour afficher "bonjour prénom", il faudra faire, dans la vue, un "echo $hello"
		$params = [
			'hello'	  => 'bonjour prénom',
			'success' => $success,
			'errors'  => $errors,
		];
        
        $this->show('default/viewActivity',[
                                'toto' => $rod,
                                'tato' => $params,            
            
                                ]);  
    }
    

}