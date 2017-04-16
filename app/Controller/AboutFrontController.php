<?php

namespace Controller;

use \W\Controller\Controller;
use Model\AboutModel;



class AboutFrontController extends MasterController
{
	public function views()
	{
		$views = new AboutModel();
        $views = $views->findAll();
        $params = [
        'views' => $views
        ];
        $this->show('aboutFront/aboutUs', $params);
	}
}