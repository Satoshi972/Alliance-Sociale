<?php

namespace Controller;

use \W\Controller\Contrßoller;
use \Model\MediasModel;
use Intervention\Image\ImageManagerStatic as Image;

class MediasController extends MasterController
{
	public function addMedias()
	{
		$post 		= []; // Contiendra les données épurées
		$errors 	= [];

		$maxSize = (1024 * 1000) * 50; // Taille maximum du fichier
		$uploadDir = 'uploads/'; // Répertoire d'upload

		if(!empty($_POST)){

			if(isset($_FILES['url']) && $_FILES['url']['error'] == 0){

			        if(!is_dir($upload_dir)){
			            mkdir($upload_dir, 0755);
			        }

			        $img = Image::make($_FILES['url']['tmp_name']);

			        if($img->filesize() > $maxSize){
			            $errors[] = 'Image trop lourde, 50 Mo maximum';
			        }

			        if(!v::image()->validate($_FILES['url']['tmp_name'])){
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
			    if(count($errors) === 0){
			        
			        $datas = [
			        'url' => $post['url']
			        ];

			        $mediasModel = new MediasController();
			        if($mediasModel->insert($datas)){
			        	$success = true;
			        }
			    }
		}

	$this->show('medias/add_medias');
	}
}