<?php

namespace Controller;

use \W\Controller\Controller;
use Model\MediaModel as Media;
use Model\SiteInfoModel as Site;
use Respect\Validation\Validator as v;
use Intervention\Image\ImageManagerStatic as i;
use Controller\MasterController as master;

class SiteController extends MasterController
{
	public function home()
	{
		$infos = new Site();

		$datas = $infos->infoSite();

		$this->show('site/viewInfo', ['infos'=>$datas]);
	}

	public function updateInfo($id)
	{
		$infos = new Site();

		$datas = $infos->infoSite();

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
				if($a->insert($post))
				{
					var_dump($a->insert($post));
					$result = '<p class="alert alert-success">Le formulaire a été correctement envoyé !</p>';
				}
				else
				{
					var_dump($a->insert($post)->errorInfo());
				}
			}

			echo $result;
		}
		$this->show('site/updateInfo');
	}
}