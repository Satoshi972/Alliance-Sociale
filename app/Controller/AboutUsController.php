<?php

namespace Controller;

use \W\Controller\Controller;
use Model\MediaModel as Media;
use Model\AboutUsModel as about;
use Respect\Validation\Validator as v;
use Intervention\Image\ImageManagerStatic as i;
use Controller\MasterController as master;

class AboutUsController extends MasterController
{
	public function home()
	{
		$site = new Site();

		$infos = $site->infoSite();

		$this->show('AboutUs/viewAbout', ['infos'=>$infos]);
	}

	public function updateAbout($id)
	{
		$about = new about();
		$infos = $about->infoAbout();


		if(!empty($_POST))
		{
			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(!v::notEmpty()->alpha('-?!\'".')->length(2,600)->validate($post['history']))
			{
				$errors[] = 'Votre titre doit faire entre 2 et 50 caractères';
			}

			if(!v::notEmpty()->alnum('#-_*<\'">?!.')->length(2,600)->validate($post['word']))
			{
				$errors[] = 'Votre post doit faire entre 2 et 600 caractères';
			}
			
			if(count($errors)>0)
			{
				$textError = implode('<br>',$errors);
				$result = '<p class="alert alert-danger">'.$textError.'</p>';
			}
			else
			{	
				if($about->update($post, $id))
				{
					$datas = [
						'history'=> $post['history'],
						'word'	 => $post['word'],
					];
					var_dump($site->insert($post));
					$result = '<p class="alert alert-success">Le formulaire a été correctement envoyé !</p>';
				}
				else
				{
					var_dump($about->insert($post)->errorInfo());
				}
			}

			echo $result;
		}
		$params = [
			'infos'=> $infos,
		];
		$this->show('AboutUs/updateAbout', $params );
	}
}