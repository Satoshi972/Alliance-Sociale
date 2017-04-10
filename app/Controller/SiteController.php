<?php

namespace Controller;

use \W\Controller\Controller;
use Model\MediaModel as Media;
use Model\SiteOfModel as Site;
use Respect\Validation\Validator as v;
use Intervention\Image\ImageManagerStatic as i;

class SiteController extends MasterController
{
	public function home()
	{
		$post = [];
		$errors = [];

		$maxSize = (1024 * 1000) * 2; // Taille maximum du fichier
		$uploadDir = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/';
		

		$infos = new Site();
		$infos->findAll();
		$this->show('site/updateInfo', ['infos'=>$infos]);
	}
}