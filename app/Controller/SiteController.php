<?php

namespace Controller;

use \W\Controller\Controller;
use Model\MediaModel as Media;
use Model\SiteInfoModel as Site;
use Respect\Validation\Validator as v;
use Intervention\Image\ImageManagerStatic as i;

class SiteController extends MasterController
{
	public function home()
	{
		$infos = new Site();

		$infos->infoSite();
		var_dump($infos);
		$this->show('site/viewInfo', ['infos'=>$infos]);
	}

	public function updateInfo($id)
	{

	}
}