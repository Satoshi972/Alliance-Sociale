<?php

namespace Controller;

use \W\Controller\Controller;
use Model\MediaModel as Media;
use Model\SiteOfModel as Site;

class SiteController extends MasterController
{
	public function home()
	{
		$post = [];
		$errors = [];

		$maxSize = (1024 * 1000) * 2; // Taille maximum du fichier
		$uploadDir = 'uploads/'; // Répertoire d'upload
		$mimeTypeAvailable = ['image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'];

		$infos = new Media();
		$infos->findAll();
		$this->show('site/updateInfo', ['infos'=>$infos]);
	}
}