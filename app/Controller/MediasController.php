<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\MediasModel;
use Respect\Validation\Validator as v;
use Intervention\Image\ImageManagerStatic as i;

class MediasController extends MasterController
{
	public function addMedias()
	{
		$medias 	= new MediasModel();
		$post 		= []; // Contiendra les données épurées
		$errors 	= [];
		$success 	= false;

		$uploadDir = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/'; // Répertoire d'upload

		$maxSize = (1024 * 1000) * 50; // Taille maximum du fichier


			// Vérification image

        if(isset($_FILES['picture']) && $_FILES['picture']['error'] === 0)
        {
        	var_dump($_FILES['picture']['name']);

        $img = i::make($_FILES['picture']['tmp_name']);
        $size = $img->filesize();
        $mimetype = $img->mime();
        $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
        $newName = uniqid('img_').'.'.$ext;
    
            if($maxSize<$size)
            {
                $errors[] = 'fichier trop gros, il doit faire 2 mo max';
            }
            else
            {
                if(!v::image()->validate($_FILES['picture']['tmp_name']))
                {
                    $errors[] = 'Le fichier n\'est pas une image valide';
                }
                else
                {
                    if(!is_dir($uploadDir))
                    {
                        mkdir($uploadDir, 0755);
                    }

                    if(!$img->save($uploadDir.$newName))
                    {
                        
                        $errors[] = 'Erreur lors de l\'envoi de l\'image';
                    }
                    else
                    {
                        #ligne pour que mon image soit envoyée dans la base !!!!!!
                        $post['picture'] = $uploadDir.$newName;
                    }
                }
            }
        }

      //  return (!empty($errors)) ?  $result = implode('<br>', $errors) : $result = $post;


			    // Vérification Vidéo 
/*			    
				if(isset($_FILES['video']) && $_FILES['video']['error'] == 0){

				        //Déclaration de la variable $vid
				        $vid = Image::make($_FILES['video']['tmp_name']);

				        //Comparaison de la taille de l'image avec le maxsize. Si l'image dépasse 2 Mo alors message d'erreur
				        if($vid->filesize() > $maxSize){
				            $errors[] = 'Image trop lourde, 50 Mo maximum';
				        }

				        //Vérification du mimiType de l'image'
				        if(!v::image()->validate($_FILES['video']['tmp_name'])){
				            $errors[] = 'L\'image est invalide';
				        }

				        else {
				        	
				            switch ($vid->mime()) {
	  
				                case 'image/mp4':
				                    $ext = '.mp4';
				                break;
				                
				                case 'image/avi':
				                    $ext = '.avi';
				                break;        
				            }
				            $vid->save($upload_dir.$newName);
				        }
				    }*/

			    if(count($errors) === 0){
			    	var_dump($post);
			        
			        $datas = [
			        'url' => $post['picture'],
			        ];
			        
			        if($medias->insert($datas)){
			        	$success = true;
			        }
			    }
		

			$params = [
			'success' => $success,
			'errors'  => $errors,
		];
	$this->show('medias/add_medias');
	}
}