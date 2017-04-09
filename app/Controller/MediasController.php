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

		$uploadDirImg = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/'; // Répertoire d'upload
		$uploadDirVid = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/vid/'; // Répertoire d'upload

		$maxSize = (1024 * 1000) * 50; // Taille maximum du fichier


			// Vérification image

        if(isset($_FILES['picture']) && $_FILES['picture']['error'] === 0)
        {

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
                    if(!is_dir($uploadDirImg))
                    {
                        mkdir($uploadDirImg, 0755);
                    }

                    if(!$img->save($uploadDirImg.$newName))
                    {
                        
                        $errors[] = 'Erreur lors de l\'envoi de l\'image';
                    }
                    else
                    {
                        #ligne pour que mon image soit envoyée dans la base !!!!!!
                        $post['picture'] = $uploadDirImg.$newName;
                    }
                }
            }
        }

			    // Vérification Vidéo 
			    
		if(isset($_FILES['video']) && $_FILES['video']['error'] === 0){

			$mimeTypeAvailable = ['video/mp4', 'video/avi', 'video/move', 'video/mpeg4']; 
			$maxSize = (1024 * 1000) * 50; // Taille maximum du fichier

			$finfo = new \finfo();
			$mimeType = $finfo->file($_FILES['video']['tmp_name'], FILEINFO_MIME_TYPE);

			$extension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);

			if(in_array($mimeType, $mimeTypeAvailable)){

				if($_FILES['video']['size'] <= $maxSize){

					if(!is_dir($uploadDirVid)){
						mkdir($uploadDirVid, 0755);
					}

					$newVideoName = uniqid('video').'.'.$extension;

					if(!move_uploaded_file($_FILES['video']['tmp_name'], $uploadDirVid.$newPictureName)){
						$errors[] = 'Erreur lors de l\'upload de la vidéo';
					}
				}
				else {
					$errors[] = 'La taille du fichier excède 50 Mo';
				}
			}
			else {
				$errors[] = 'Le fichier n\'est pas une Vidéo valide';
			}
		}
		else {
			$errors[] = 'Aucune Vidéo sélectionnée';
		}

			if(count($errors) === 0){
			        
			    $datas = [
			        'url' => $post['picture'],
			        'url' => $post['video'],
			        ];
			        
			        if($medias->insert($datas)){
			        	$success = true;
			        }
			    }	

			$params = [
			'success' => $success,
			'errors'  => $errors,
			];

	$this->show('medias/add_medias',$params);
	}

	public function listMedias()
	{
		// On instancie le model qui permet d'effectuer un findAll() 
		$medias = new MediasModel();
		$images = $medias->findAll();

		$params = [
			'images' => $images
		];
		$this->show('medias/list_medias', $params);
	}

}