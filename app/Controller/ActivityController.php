<?php

namespace Controller;

use \W\Controller\Controller;

class ActivityController extends MasterController
{

	/**
	 * Page d'accueil par défaut
	 */
	public function activity()
	{
		$this->show('default/activity');
	}

}