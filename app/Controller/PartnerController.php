<?php

namespace Controller;

use \W\Controller\Controller;

class PartnerController extends MasterController
{

	/**
	 * Page d'accueil par défaut
	 */
	public function partner()
	{
		$this->show('partner');
	}

}