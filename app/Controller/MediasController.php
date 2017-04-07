<?php

namespace Controller;

use \W\Controller\Contrßoller;
use \Model\MediasModel;
use vendor\Intervention\Image\ImageManagerStatic as Image;

class MediasController extends MasterController
{
	public function addMedias()
	{
		$mediasModel = new MediasController();
		$post 		= []; // Contiendra les données épurées
		$errors 	= [];

		$maxSize = (1024 * 1000) * 50; // Taille maximum du fichier
		$uploadDir = 'uploads/'; // Répertoire d'upload

		if(!empty($_POST)){

			// Vérification image
			if(isset($_FILES['picture']) && $_FILES['picture']['error'] == 0){

					//Si le répertoire d'upload n'existe pas on le crée
			        if(!is_dir($upload_dir)){
			            mkdir($upload_dir, 0755);
			        }

			        //Déclaration de la variable $img
			        $img = Image::make($_FILES['picture']['tmp_name']);

			        //Comparaison de la taille de l'image avec le maxsize. Si l'image dépasse 2 Mo alors message d'erreur
			        if($img->filesize() > $maxSize){
			            $errors[] = 'Image trop lourde, 50 Mo maximum';
			        }

			        //Vérification du mimiType de l'image'
			        if(!v::image()->validate($_FILES['picture']['tmp_name'])){
			            $errors[] = 'L\'image est invalide';
			        }

			        else {
			        	
			            switch ($img->mime()) {
			                case 'image/jpg':
			                case 'image/jpeg':
			                case 'image/pjpeg':
			                    $ext = '.jpg';
			                break;
			                
			                case 'image/png':
			                    $ext = '.png';
			                break;
			                
			                case 'image/gif':
			                    $ext = '.gif';
			                break;
			            }
			            $save_name = Transliterator::transliterate(time().'-'. preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES['url']['name']));
			            $img->save($upload_dir.$save_name.$ext);
			        }
			    }

			    // Vérification Vidéo 
			    
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
				            $save_name = Transliterator::transliterate(time().'-'. preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES['url']['name']));
				            $vid->save($upload_dir.$save_name.$ext);
				        }
				    }

			    if(count($errors) === 0){
			        
			        $datas = [
			        'url' => $post['picture']
			        ];

			        
			        if($mediasModel->insert($datas)){
			        	$success = true;
			        }
			    }
		}

	$this->show('medias/add_medias');
	}
}