<?php

namespace Controller;

use \W\Controller\Controller;
use Model\MediaModel as Media;
use Model\SiteInfoModel as Site;
use Model\AboutModel as About;
use Respect\Validation\Validator as v;
use Intervention\Image\ImageManagerStatic as i;
use Controller\MasterController as master;

class ManagementController extends MasterController
{
	public function home()
	{
		$roles = ['admin'];
        $this->allowTo($roles);

		$site = new Site();

		$infos = $site->infoSite();

		$this->show('site/viewSite', ['infos'=>$infos]);
	}

	public function siteInfos()
	{
		$roles = ['admin'];
        $this->allowTo($roles);
		
		$site = new Site();
		$infos = $site->SiteInfos();
		$this->showJson($infos);
	}

	public function aboutInfos()
	{
		$roles = ['admin'];
        $this->allowTo($roles);
		
		$about = new About();
		$infos = $about->Aboutinfos();
		$this->showJson($infos);
	}

	public function updateSiteInfos()
	{
		$roles = ['admin'];
        $this->allowTo($roles);
		
		// $site = new Site();
		// $infos = $site->infoAbout();

		if(!empty($_POST))
		{
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(!v::notEmpty()->alpha('-?!\'".')->length(2,50)->validate($post['address']))
			{
				$errors[] = 'Votre titre doit faire entre 2 et 50 caractères';
			}

			if(!v::notEmpty()->alnum('#-_*<\'">?!.')->length(2,600)->validate($post['shedule']))
			{
				$errors[] = 'Votre post doit faire entre 2 et 600 caractères';
			}
			
			if(!empty($_FILES))
			{
				$tabMedias = master::checkMedia($_FILES);
				die(var_dump($tabMedias));
			}

			if(count($errors)>0)
			{
				$textError = implode('<br>',$errors);
				$result = '<p class="alert alert-danger">'.$textError.'</p>';
			}
			else
			{	
				if($site->update($post, $id))
				{
					$datas = [
						'logo'   => $logo,
						'header' => $header,
						'address'=> $post['address'],
						'phone'	 => $post['phone'],
					];
					var_dump($site->insert($post));
					$result = 'succes';
				}
				else
				{
					var_dump($site->insert($post)->errorInfo());
				}
			}

			echo $result;
		}
		else
		{
			// $params = [
			// 	'infos'=> $infos,
			// ];
			$this->show('site/updateSite');
		}
	}

	public function updateAboutInfos()
	{
		$roles = ['admin'];
        $this->allowTo($roles);
		
		$about = new About();
		$errors = [];
		$post = [];
		$result = null;
		$mimeTypeAvailable = ['video/mp4', 'video/ogg', 'video/webm'];
		$uploadDir = 'assets/vid/description/';
		$maxSize = (1024 * 1000) * 20;
		
		if(!empty($_POST))
		{
			$post = array_map('trim', array_map('strip_tags', $_POST));
			$err=[
				(!v::notEmpty()->alnum('-?!\'+*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 1000)->validate($post['history'])) ? 'L\'histoire doit contenir entre 2 et 1000 caractères' : null,

				(!v::notEmpty()->alnum('-?!\'+*%"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ,._')->length(2, 1000)->validate($post['word'])) ? 'Le mot de la présidente doit contenir entre 2 et 1000 caractères' : null,
			];
			$errors = array_filter($err);

			if(isset($_FILES['description']) && $_FILES['description']['error'] === 0){

                $finfo = new \finfo();
                $mimeType = $finfo->file($_FILES['description']['tmp_name'], FILEINFO_MIME_TYPE);

                $extension = pathinfo($_FILES['description']['name'], PATHINFO_EXTENSION);

                if(in_array($mimeType, $mimeTypeAvailable)){

                    if($_FILES['description']['size'] <= $maxSize){

                        if(!is_dir($uploadDir)){
                            mkdir($uploadDir, 0755);
                        }

                        $newName = 'centre_social'.$extension;

                        if(!move_uploaded_file($_FILES['description']['tmp_name'], $uploadDir.$newName)){
                            $errors[] = 'Erreur lors de l\'upload de la vidéo';
                        }
                        else
                        {
                            $description = $uploadDir.$newName;
                        }
                    }
                    else {
                        $errors[] = 'La taille du fichier excède 20 Mo';
                    }

                }
                else {
                    $errors[] = 'Le fichier n\'est pas une vidéo valide';
                }
            }
            else {
            	$info = $about->Aboutinfos();
                $description = $info['description'];
            }

			if(count($errors)>0)
			{
				$result = '<p class="alert-dismissable alert-danger">'.implode('<br>', $errors).'</p>';
			}
			else
			{
				$datas = [
					'description' => $description,
					'history'	  => $post['history'],
					'word'	  	  => $post['word']
				];

				if($about->update($datas,1))
				{
					$result = "success";
				}
			}
		}
		else
		{
			$this->show('site/updateAbout');
		}

		echo $result;
	}
}